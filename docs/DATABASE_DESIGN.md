# Database Design — Phase 2 Preview

This document outlines the planned schema for Phase 2 implementation. **Migrations are not yet created** — this is the design specification.

## Design Principles

- Every business table includes `tenant_id` (NOT NULL, indexed)
- Branch-scoped tables include `branch_id` (nullable or required per entity)
- UUIDs on public-facing identifiers (`tenants.uuid`, `users.uuid`)
- Soft deletes on all business entities
- Audit columns: `created_at`, `updated_at`, `created_by`, `updated_by`
- Composite indexes: `(tenant_id, ...)`, `(tenant_id, branch_id, ...)`

---

## Platform Tables

### tenants

| Column | Type | Notes |
|--------|------|-------|
| id | BIGINT PK | |
| uuid | CHAR(36) UNIQUE | Public identifier |
| name | VARCHAR(255) | Business name |
| slug | VARCHAR(255) UNIQUE | URL-safe identifier |
| email | VARCHAR(255) | Owner email |
| phone | VARCHAR(50) | |
| timezone | VARCHAR(50) | Default UTC |
| currency | CHAR(3) | ISO 4217 |
| is_active | BOOLEAN | Suspension flag |
| settings | JSON | Tenant configuration |
| deleted_at | TIMESTAMP | Soft delete |
| timestamps | | |

### branches

| Column | Type | Notes |
|--------|------|-------|
| id | BIGINT PK | |
| tenant_id | FK → tenants | |
| name | VARCHAR(255) | |
| code | VARCHAR(50) | Unique per tenant |
| address | TEXT | |
| phone | VARCHAR(50) | |
| is_main | BOOLEAN | One main per tenant |
| is_active | BOOLEAN | |
| deleted_at | TIMESTAMP | |
| timestamps | | |

**Index:** `UNIQUE(tenant_id, code)`

---

## Authentication Tables

### users

| Column | Type | Notes |
|--------|------|-------|
| id | BIGINT PK | |
| uuid | CHAR(36) UNIQUE | |
| tenant_id | FK → tenants | Owner's tenant |
| name | VARCHAR(255) | |
| email | VARCHAR(255) | Unique per tenant |
| password | VARCHAR(255) | Hashed |
| email_verified_at | TIMESTAMP | |
| phone | VARCHAR(50) | |
| is_active | BOOLEAN | |
| is_owner | BOOLEAN | Tenant owner flag |
| password_changed_at | TIMESTAMP | |
| force_password_change | BOOLEAN | |
| two_factor_secret | TEXT | Encrypted |
| two_factor_confirmed_at | TIMESTAMP | |
| failed_login_attempts | INT | Lockout counter |
| locked_until | TIMESTAMP | |
| last_login_at | TIMESTAMP | |
| last_login_ip | VARCHAR(45) | |
| deleted_at | TIMESTAMP | |
| timestamps | | |

**Index:** `UNIQUE(tenant_id, email)`

### personal_access_tokens (Sanctum)

Standard Sanctum schema + `device_name`, `last_used_at`.

### login_histories

| Column | Type |
|--------|------|
| id | BIGINT PK |
| user_id | FK |
| tenant_id | FK |
| ip_address | VARCHAR(45) |
| user_agent | TEXT |
| device_name | VARCHAR(255) |
| success | BOOLEAN |
| failure_reason | VARCHAR(255) |
| timestamps | |

### user_devices

| Column | Type |
|--------|------|
| id | BIGINT PK |
| user_id | FK |
| device_id | VARCHAR(255) |
| device_name | VARCHAR(255) |
| platform | VARCHAR(50) |
| last_active_at | TIMESTAMP |
| is_trusted | BOOLEAN |
| timestamps | |

---

## RBAC Tables

### roles

| Column | Type |
|--------|------|
| id | BIGINT PK |
| tenant_id | FK (nullable for system roles) |
| name | VARCHAR(255) |
| slug | VARCHAR(255) |
| category | ENUM(platform, core, industry) |
| module_key | VARCHAR(100) nullable |
| is_system | BOOLEAN |
| timestamps | |

### permissions

| Column | Type |
|--------|------|
| id | BIGINT PK |
| name | VARCHAR(255) |
| slug | VARCHAR(255) UNIQUE |
| module_key | VARCHAR(100) nullable |
| group | VARCHAR(100) |
| timestamps | |

### role_permission (pivot)

### user_role (pivot)

Includes `branch_id` for branch-scoped roles.

### user_permission (pivot)

Direct permission overrides.

---

## Core POS Tables

### products

`tenant_id`, `branch_id` (nullable), `category_id`, `brand_id`, `sku`, `barcode`, `name`, `cost_price`, `selling_price`, `tax_rate`, `track_stock`, `track_batch`, `track_serial`, soft deletes.

### product_categories, brands, units

Tenant-scoped hierarchies.

### sales

`tenant_id`, `branch_id`, `customer_id`, `user_id`, `sale_number`, `status`, `subtotal`, `tax_amount`, `discount_amount`, `total_amount`, `amount_paid`, `amount_due`, `sale_type`.

### sale_items, sale_payments, sale_returns

Child tables linked to sales.

### customers

`tenant_id`, `name`, `email`, `phone`, `credit_limit`, `loyalty_points`, `customer_group_id`.

### suppliers

`tenant_id`, `name`, `email`, `balance`.

### purchase_orders, purchase_order_items

### goods_received_notes

### warehouses, stock_levels, stock_transfers, stock_adjustments

### invoices, invoice_items, receipts

### expenses, expense_categories

### audit_logs

`tenant_id`, `branch_id`, `user_id`, `action`, `auditable_type`, `auditable_id`, `old_values` JSON, `new_values` JSON, `ip_address`, `user_agent`.

---

## Industry Module Tables (Phase 13)

### Healthcare

`patients`, `appointments`, `emr_records`, `consultations`, `prescriptions`, `lab_requests`, `lab_results`, `radiology_requests`, `pharmacy_dispensings`, `insurance_claims`, `admissions`, `beds`, `surgeries`.

### Restaurant

`restaurant_tables`, `reservations`, `kitchen_orders`, `menu_items`, `recipes`, `recipe_ingredients`.

### Hotel

`hotel_rooms`, `room_bookings`, `housekeeping_tasks`, `guest_profiles`.

(Additional industry tables documented per module in Phase 13.)

---

## Subscription Tables

### subscription_plans

`name`, `slug`, `price_monthly`, `price_yearly`, `modules` JSON, `limits` JSON.

### tenant_subscriptions

`tenant_id`, `plan_id`, `status`, `starts_at`, `ends_at`, `trial_ends_at`.

### tenant_modules

`tenant_id`, `module_key`, `is_enabled`, `settings` JSON.

---

## Index Strategy

```sql
-- Every tenant-scoped table
INDEX idx_{table}_tenant_id (tenant_id)
INDEX idx_{table}_tenant_branch (tenant_id, branch_id)

-- Common lookups
INDEX idx_products_tenant_sku (tenant_id, sku)
INDEX idx_sales_tenant_number (tenant_id, sale_number)
INDEX idx_customers_tenant_email (tenant_id, email)
```

---

## Next Steps (Phase 2)

1. Create migrations in dependency order
2. Add factories for all models
3. Add seeders (roles, permissions, demo tenant)
4. Write migration tests
5. Document relationships in ERD diagram

**Awaiting confirmation to proceed with Phase 2 implementation.**
