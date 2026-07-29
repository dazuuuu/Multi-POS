# Architecture Overview

## System Type

Multi-tenant SaaS Point of Sale (POS) platform with industry-specific modules.

Each **Tenant** represents one business organization. Tenants are fully isolated — Tenant A can never access Tenant B data.

## Technology Stack

| Layer | Technology |
|-------|------------|
| Framework | Laravel 13 |
| Language | PHP 8.3+ |
| Database | MySQL 8+ |
| Cache / Queue | Redis |
| Authentication | Laravel Sanctum |
| API | REST, versioned `/api/v1/` |

## Architectural Layers

```
┌─────────────────────────────────────────────────────────┐
│                    API Layer (v1)                        │
│  Controllers → Form Requests → API Resources             │
├─────────────────────────────────────────────────────────┤
│                  Authorization Layer                     │
│  Middleware → Policies → Gates → RBAC (Phase 5)          │
├─────────────────────────────────────────────────────────┤
│                   Service Layer                          │
│  Business logic, transactions, domain rules              │
├─────────────────────────────────────────────────────────┤
│                 Repository Layer                         │
│  Data access abstraction (where complexity warrants)     │
├─────────────────────────────────────────────────────────┤
│                   Model Layer                            │
│  Eloquent models, tenant scopes, relationships           │
├─────────────────────────────────────────────────────────┤
│                    MySQL 8+                              │
└─────────────────────────────────────────────────────────┘
```

## Multi-Tenancy

### Tenant Identification

Tenants are resolved per request via configurable drivers:

- **Header** (default): `X-Tenant-ID` header
- **Subdomain** (Phase 3): `{tenant}.platform.com`
- **Path** (optional): `/api/v1/tenants/{id}/...`

### Data Isolation

Every tenant-scoped model uses:

1. `BelongsToTenant` trait — auto-sets `tenant_id` on create
2. `TenantScope` global scope — auto-filters queries by `tenant_id`
3. `InitializeTenancy` middleware — resolves and validates tenant before route execution

### Branch Context

Optional `X-Branch-ID` header scopes operations to a specific branch within a tenant.

## Modular Architecture

Industry features are delivered as **modules**. Tenants subscribe to modules; only enabled modules are accessible.

```
app/Modules/
├── Core/                    # Always available
├── RestaurantHotel/         # Phase 13
├── Healthcare/              # Phase 13
└── ...
```

Each module implements `ModuleInterface` and registers via a `ServiceProvider`.

## API Response Format

### Success

```json
{
  "success": true,
  "message": "API is operational.",
  "data": { ... },
  "meta": { "pagination": { ... } }
}
```

### Error

```json
{
  "success": false,
  "message": "Validation failed.",
  "code": "VALIDATION_ERROR",
  "errors": { "email": ["The email field is required."] }
}
```

## Security (Foundation)

- Password hashing (bcrypt via Laravel)
- Sanctum token authentication
- Rate limiting on API routes
- Secure HTTP headers (X-Frame-Options, CSP-ready, HSTS in production)
- JSON-only API responses
- Tenant isolation at query level
- OWASP-aligned input validation (Form Requests, Phase 4+)

## Queues & Notifications

Redis-backed queues configured for:

- Email notifications
- SMS (ready)
- WhatsApp (ready)
- Audit log writes
- Report generation

## Audit System (Phase 7+)

All sensitive actions logged with:

- User, tenant, branch
- IP, user agent, OS
- Action type, affected model
- Old/new values (JSON diff)

## Scalability Considerations

- Stateless API (horizontal scaling)
- Tenant-scoped indexes on all business tables
- Redis for cache, sessions, queues
- Database read replicas (deployment concern)
- Module lazy-loading via service providers

## Legacy Code

The previous plain-PHP scaffold is archived in `/legacy/` for reference only. All new development uses Laravel.
