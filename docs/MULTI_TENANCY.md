# Phase 3: Multi-Tenancy

## How Tenancy Works

1. Client sends `X-Tenant-ID` header (numeric ID, UUID, or slug)
2. `InitializeTenancy` middleware resolves the tenant
3. `TenantContext` stores the current tenant for the request
4. Eloquent models using `BelongsToTenant` auto-filter by `tenant_id`
5. Context is cleared after the response (finally block)

## Headers

| Header | Required | Example |
|--------|----------|---------|
| `X-Tenant-ID` | Yes on tenant routes | `1` or `uuid` or `demo-shop` |
| `X-Branch-ID` | Optional | `1` |
| `Authorization` | On protected routes (Phase 4) | `Bearer {token}` |

## Endpoints

### Public

```http
POST /api/v1/tenants/register
Content-Type: application/json

{
  "owner_name": "Jane Owner",
  "owner_email": "jane@acme.test",
  "password": "Password1!",
  "password_confirmation": "Password1!",
  "business_name": "Acme Retail",
  "currency": "USD",
  "plan": "starter"
}
```

Response includes `tenant`, `branch`, `user`, and Sanctum `token`.

### Tenant-scoped

```http
GET /api/v1/tenant
X-Tenant-ID: demo-shop

GET /api/v1/tenant/branches
X-Tenant-ID: demo-shop
```

## Isolation Guarantee

Models using `BelongsToTenant` apply a global scope:

```php
WHERE tenant_id = {current_tenant_id}
```

Tenant A queries never return Tenant B rows.

## Middleware Aliases

| Alias | Class |
|-------|-------|
| `tenant` | `InitializeTenancy` (required) |
| `tenant.optional` | `OptionalTenancy` |
| `tenant.user` | `EnsureUserBelongsToTenant` |
