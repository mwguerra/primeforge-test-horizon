#!/bin/sh
set -e

# Ensure storage directories
chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache /var/www/html/database 2>/dev/null || true

# Create SQLite database if not exists
DB_PATH="/var/www/html/database/database.sqlite"
if [ ! -f "$DB_PATH" ]; then
    touch "$DB_PATH"
    chown www-data:www-data "$DB_PATH"
fi

# Run migrations
php artisan migrate --force

# Cache config
php artisan config:cache
php artisan route:cache

# Fix ownership
chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache /var/www/html/database

exec /usr/bin/supervisord -n -c /etc/supervisor/conf.d/app.conf
