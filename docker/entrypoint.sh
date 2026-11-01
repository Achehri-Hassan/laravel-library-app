#!/bin/sh
set -eu

if [ ! -f /var/www/state/.env ]; then
    cp .env.example /var/www/state/.env
fi

ln -sf /var/www/state/.env .env

chown -R www-data:www-data /var/www/state /var/www/html/database /var/www/html/storage /var/www/html/bootstrap/cache

if ! grep -q '^APP_KEY=base64:' /var/www/state/.env; then
    su -s /bin/sh www-data -c 'php artisan key:generate --force'
fi

su -s /bin/sh www-data -c 'php artisan migrate --force'

exec "$@"
