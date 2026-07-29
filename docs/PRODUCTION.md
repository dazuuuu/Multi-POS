# Production Readiness

## Checklist

- [x] Versioned API (`/api/v1`)
- [x] Multi-tenant isolation
- [x] Sanctum authentication
- [x] RBAC permissions middleware
- [x] Audit log table
- [x] Queued notifications scaffolding
- [x] Rate limiting (`api`, `auth`)
- [x] Secure headers
- [x] Soft deletes on business tables
- [ ] Redis in production (required)
- [ ] HTTPS / TLS termination
- [ ] Database backups
- [ ] Monitoring (Horizon, Telescope optional)
- [ ] Object storage for uploads (S3)

## Recommended production `.env`

```env
APP_ENV=production
APP_DEBUG=false
APP_URL=https://api.yourdomain.com

DB_CONNECTION=mysql
QUEUE_CONNECTION=redis
CACHE_STORE=redis
SESSION_DRIVER=redis

LOG_CHANNEL=stack
LOG_LEVEL=warning
```

## Deployment (AMPPS or VPS)

1. `composer install --no-dev --optimize-autoloader`
2. `php artisan key:generate`
3. `php artisan migrate --force --seed`
4. `php artisan config:cache && php artisan route:cache && php artisan event:cache`
5. Point web server document root to `public/`
6. Run queue worker: `php artisan queue:work redis --sleep=1 --tries=3`
7. Scheduler cron: `* * * * * php /path/to/artisan schedule:run`

## Performance

- Tenant composite indexes already on core tables
- Permission results cached 5 minutes per user
- Use Redis for cache/queues in production
- Consider read replicas for reporting endpoints

## Security

- Never commit `.env`
- Rotate Sanctum tokens on password change
- Enforce `force_password_change` for invited staff
- Keep `APP_DEBUG=false` in production
