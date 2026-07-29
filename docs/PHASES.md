# Development Phases

Each phase must be **fully completed, tested, and documented** before the next begins.

## Phase 1: Project Setup & Architecture ✅

- [x] Laravel 13 installation
- [x] Sanctum scaffolding
- [x] API versioning (`/api/v1/`)
- [x] Multi-tenant foundation (context, scope, middleware)
- [x] Module plugin architecture
- [x] Service / Repository base layers
- [x] Standardized API responses
- [x] Secure headers & rate limiting
- [x] Exception handling for API
- [x] Health check endpoint
- [x] Feature tests
- [x] Architecture documentation

## Phase 2: Database Design ⏳ NEXT

- [ ] Complete ERD for all modules
- [ ] Tenant, branch, user tables
- [ ] RBAC tables (roles, permissions, pivots)
- [ ] Core POS tables (products, sales, inventory)
- [ ] Industry module table designs
- [ ] Indexes, foreign keys, soft deletes
- [ ] Migration files
- [ ] Seeders & factories
- [ ] Database documentation

## Phase 3: Multi-Tenancy

- [ ] Tenant registration
- [ ] Tenant migrations
- [ ] Tenant middleware on all scoped routes
- [ ] Tenant isolation tests
- [ ] Subdomain resolution (optional)
- [ ] Tenant settings

## Phase 4: Authentication

- [ ] Registration, login, logout
- [ ] Forgot/reset password
- [ ] Email verification
- [ ] Refresh tokens
- [ ] 2FA (TOTP + email OTP)
- [ ] Device & session management
- [ ] Login history & lockout
- [ ] Password policies

## Phase 5: RBAC & Permissions

- [ ] Roles & permissions tables
- [ ] Owner super-admin role
- [ ] Branch-specific permissions
- [ ] Module-specific permissions
- [ ] Policies & gates
- [ ] Permission caching

## Phase 6: Branch Management

- [ ] CRUD branches
- [ ] Main branch assignment
- [ ] Branch suspension
- [ ] Branch-scoped data

## Phase 7: User Management

- [ ] Owner invites staff
- [ ] User CRUD, suspend, deactivate
- [ ] Role/permission assignment
- [ ] Branch assignment
- [ ] Activity tracking

## Phase 8: Core POS

- [ ] Sales (cash, card, mobile money)
- [ ] Split/partial payments
- [ ] Discounts, coupons
- [ ] Returns & refunds

## Phase 9: Inventory

- [ ] Products, categories, brands
- [ ] Warehouses, stock transfers
- [ ] Batch/serial/expiry tracking
- [ ] FIFO / average cost

## Phase 10: Purchases

- [ ] Suppliers, purchase orders
- [ ] Goods received
- [ ] Supplier returns

## Phase 11: Customers & Suppliers

- [ ] Customer profiles, credit limits
- [ ] Loyalty, groups
- [ ] Supplier management

## Phase 12: Reporting

- [ ] Sales, inventory, financial reports
- [ ] Branch comparison
- [ ] Export (PDF, Excel)

## Phase 13: Industry Modules

- [ ] Restaurant & Hotel
- [ ] Bar & Liquor
- [ ] Wholesale & Retail
- [ ] Supermarket
- [ ] Salon & Spa
- [ ] Agrovet & Hardware
- [ ] Healthcare (HIS)

## Phase 14: Notifications

- [ ] Email, in-app
- [ ] SMS/WhatsApp ready
- [ ] Queued delivery

## Phase 15: API Documentation

- [ ] OpenAPI/Swagger spec
- [ ] Postman collection

## Phase 16: Automated Tests

- [ ] Full test suite coverage
- [ ] Tenant isolation tests
- [ ] Permission tests

## Phase 17: Performance Optimization

- [ ] Query optimization
- [ ] Caching strategy
- [ ] Index tuning

## Phase 18: Production Readiness

- [ ] Deployment guide
- [ ] Monitoring & logging
- [ ] Backup strategy
- [ ] Security audit

---

**Current status:** Phase 1 complete. Awaiting confirmation to begin Phase 2.
