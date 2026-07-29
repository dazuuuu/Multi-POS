# Phase 2: Database Design — Complete

All migrations, models, factories, and seeders have been implemented.

## Tables Created (35+)

### Platform
- `tenants`, `branches`, `users` (extended)

### Authentication
- `login_histories`, `user_devices`, `personal_access_tokens`

### RBAC
- `roles`, `permissions`, `permission_role`, `role_user`, `permission_user`

### Subscriptions
- `subscription_plans`, `tenant_subscriptions`, `tenant_modules`

### Audit
- `audit_logs`

### Catalog
- `units`, `product_categories`, `brands`, `products`

### CRM
- `customer_groups`, `customers`, `suppliers`

### Sales
- `sales`, `sale_items`, `sale_payments`, `sale_returns`

### Inventory
- `warehouses`, `stock_levels`, `stock_transfers`, `stock_transfer_items`, `stock_adjustments`

### Purchases
- `purchase_orders`, `purchase_order_items`, `goods_received_notes`

### Financial
- `expense_categories`, `expenses`, `invoices`, `invoice_items`

## Seeders

| Seeder | Purpose |
|--------|---------|
| `PermissionSeeder` | 20 granular permissions |
| `RoleSeeder` | System roles (Owner, Manager, Cashier, Accountant, Doctor) |
| `SubscriptionPlanSeeder` | Starter, Professional, Enterprise plans |
| `DemoTenantSeeder` | Demo shop with owner account |

## Demo Credentials

| Field | Value |
|-------|-------|
| Email | `owner@demo-shop.local` |
| Password | `password` |
| Tenant slug | `demo-shop` |

## Run on AMPPS

See [AMPPS_SETUP.md](AMPPS_SETUP.md) for full instructions.

```bash
php artisan migrate --seed
```

## Next: Phase 3 — Multi-Tenancy

- Wire `InitializeTenancy` middleware on tenant-scoped routes
- Tenant registration API
- Tenant isolation tests
- Subdomain resolution (optional)
