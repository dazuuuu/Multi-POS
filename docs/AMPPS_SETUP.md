# AMPPS Setup Guide

This project is designed to run on [AMPPS](https://www.ampps.com/) (Apache + MySQL + PHP).

## Requirements

- AMPPS with **PHP 8.3+** (8.4 recommended when available)
- **MySQL 8+**
- Composer (install globally or use the one in the project)

## Step 1: Clone and Install Dependencies

> **Important:** The `vendor/` folder is not in Git. You **must** run `composer install`
> before any `php artisan` command, or you will get:
> `Failed opening required '.../vendor/autoload.php'`

```powershell
# PowerShell — from your project folder (example path)
cd "C:\Program Files\Ampps\www\Multi-POS"

# Install PHP dependencies (creates the vendor/ folder)
composer install

# If composer is not in PATH, use the full AMPPS PHP + Composer:
# & "C:\Program Files\Ampps\php\php.exe" composer.phar install
```

Or with Git clone:

```bash
git clone https://github.com/dazuuuu/Multi-POS.git
cd Multi-POS
git checkout cursor/laravel-pos-phase1-37dd
composer install
```

### Folder name tip

Avoid typos like `Muilti-POS`. Prefer a short path without spaces if possible, e.g.:

`C:\Ampps\www\multi-pos`

Spaces in `Program Files` work, but a simpler path avoids many Windows path issues.

### Verify vendor exists

```powershell
dir vendor\autoload.php
```

If that file is missing, `composer install` did not succeed — fix Composer/PHP first.

## Step 2: Create Database in phpMyAdmin

1. Open AMPPS → **phpMyAdmin** (usually `http://localhost/phpMyAdmin`)
2. Create a new database: `multi_pos`
3. Collation: `utf8mb4_unicode_ci`

## Step 3: Configure Environment

```bash
cp .env.example .env
php artisan key:generate
```

Edit `.env` with your AMPPS MySQL credentials:

```env
APP_NAME="Multi-POS"
APP_URL=http://localhost/multi-pos/public

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=multi_pos
DB_USERNAME=root
DB_PASSWORD=mysql
```

> **AMPPS default MySQL password** is usually `mysql`. If you left it empty, use `DB_PASSWORD=`.

## Step 4: Point Apache Document Root

### Option A — Symlink into AMPPS `www` (recommended)

```bash
# Linux/Mac AMPPS
ln -s /path/to/Multi-POS/public /Applications/AMPPS/www/multi-pos

# Windows (run as Administrator)
mklink /D "C:\Program Files\Ampps\www\multi-pos" "C:\path\to\Multi-POS\public"
```

Access: `http://localhost/multi-pos/api/v1/health`

### Option B — Virtual Host

In AMPPS → **Apache Settings** → add a virtual host:

```
DocumentRoot "/path/to/Multi-POS/public"
ServerName multi-pos.local
```

Add to `C:\Windows\System32\drivers\etc\hosts` (Windows) or `/etc/hosts` (Mac/Linux):

```
127.0.0.1 multi-pos.local
```

Access: `http://multi-pos.local/api/v1/health`

## Step 5: Run Migrations & Seeders

From the project root (not `public/`):

```bash
php artisan migrate --seed
```

This creates all tables and seeds:
- **Demo tenant:** `demo-shop`
- **Owner login:** `owner@demo-shop.local` / `password`
- **Subscription plans:** Starter, Professional, Enterprise
- **Roles & permissions:** Business Owner, Cashier, Doctor, etc.

## Step 6: Verify API

```bash
curl http://localhost/multi-pos/api/v1/health
```

Expected response:

```json
{
  "success": true,
  "message": "API is operational.",
  "data": {
    "status": "healthy",
    "api_version": "v1"
  }
}
```

## Running Artisan Commands

Always run from the **project root** (where `artisan` lives), not from `public/`:

```bash
cd /path/to/Multi-POS
php artisan migrate
php artisan db:seed
php artisan test
php artisan route:list
```

## Redis (Optional for AMPPS)

AMPPS does not include Redis by default. For local development without Redis, use in `.env`:

```env
CACHE_STORE=database
QUEUE_CONNECTION=database
SESSION_DRIVER=database
```

For production, install Redis separately and set:

```env
CACHE_STORE=redis
QUEUE_CONNECTION=redis
SESSION_DRIVER=redis
REDIS_HOST=127.0.0.1
REDIS_PORT=6379
```

## Troubleshooting

| Issue | Fix |
|-------|-----|
| `Failed opening required '.../vendor/autoload.php'` | Run `composer install` in the project root. `vendor/` is never committed to Git. |
| 500 error | Check `storage/logs/laravel.log`, run `chmod -R 775 storage bootstrap/cache` (Linux/Mac) or give IIS_IUSRS write access (Windows) |
| Database connection refused | Verify MySQL is running in AMPPS control panel; check `DB_PASSWORD` (often `mysql`) |
| `Class not found` | Run `composer dump-autoload` |
| Routes 404 | Ensure document root points to `public/`, enable `mod_rewrite` / `AllowOverride All` |
| Permission denied on storage | Grant write access to `storage` and `bootstrap/cache` |
| Composer not found | Install from https://getcomposer.org or use `php composer.phar install` |

## Tenant API Header

When tenant-scoped endpoints are enabled (Phase 3+), include:

```
X-Tenant-ID: 1
X-Branch-ID: 1
```

Use the demo tenant ID from `php artisan tinker` → `Tenant::first()->id`.
