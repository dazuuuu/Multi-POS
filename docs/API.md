# Multi-POS API OpenAPI Overview

Base URL: `/api/v1`

Authentication: Bearer token via Laravel Sanctum (`Authorization: Bearer {token}`)

Tenant context: `X-Tenant-ID: {id|uuid|slug}` and optional `X-Branch-ID: {id}`

## Public

| Method | Path | Description |
|--------|------|-------------|
| GET | /health | Health check |
| GET | /modules | Module registry |
| POST | /tenants/register | Register tenant + owner |
| POST | /auth/login | Login |
| POST | /auth/forgot-password | Send reset link |
| POST | /auth/reset-password | Reset password |

## Auth (Bearer)

| Method | Path | Description |
|--------|------|-------------|
| POST | /auth/logout | Logout |
| GET | /auth/me | Current user |
| PUT | /auth/profile | Update profile |
| PUT | /auth/password | Change password |
| POST | /auth/2fa/enable | Start TOTP setup |
| POST | /auth/2fa/confirm | Confirm TOTP |
| POST | /auth/2fa/disable | Disable TOTP |
| POST | /auth/2fa/verify | Verify 2FA during login |
| GET | /auth/devices | List devices |
| GET | /auth/login-history | Login history |
| GET | /auth/tokens | API tokens |

## Tenant (Bearer + X-Tenant-ID)

| Method | Path | Description |
|--------|------|-------------|
| GET | /tenant | Current tenant |
| GET | /tenant/branches | Branches |
| CRUD | /users | Staff management |
| CRUD | /roles | Roles |
| GET | /permissions | Permission catalog |
| GET | /reports/sales | Sales report |
| GET | /reports/inventory | Inventory report |
| GET | /reports/financials | P&L style summary |
| GET | /reports/customers | Customer stats |
| CRUD | /core/products | Products |
| CRUD | /core/customers | Customers |
| CRUD | /core/suppliers | Suppliers |
| CRUD | /core/sales | POS sales |
| CRUD | /core/branches | Branches |
| CRUD | /core/warehouses | Warehouses |
| CRUD | /core/expenses | Expenses |
| CRUD | /core/invoices | Invoices |
| CRUD | /core/purchase-orders | Purchase orders |

## Industry modules (Bearer + X-Tenant-ID)

All industry resources follow:

`/api/v1/industry/{module}/{resource}`

Modules: `restaurant-hotel`, `bar-liquor`, `wholesale-retail`, `supermarket`, `salon-spa`, `agrovet-hardware`, `healthcare`

Example: `GET /api/v1/industry/healthcare/patients`

## Response envelope

```json
{
  "success": true,
  "message": "...",
  "data": {},
  "meta": {}
}
```

Full machine-readable OpenAPI YAML can be published with `php artisan openapi:generate` once `darkaonline/l5-swagger` is added in production hardening.
