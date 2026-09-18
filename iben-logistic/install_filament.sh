#!/bin/bash
set -e

# Run inside the container
docker compose exec -T --user www-data -e HOME=/tmp app bash << 'INNER_EOF'
cd /var/www/html
composer require filament/filament:"^3.2" -W
php artisan filament:install --panels --no-interaction
php artisan make:filament-resource Service --generate --no-interaction
php artisan make:filament-resource Armada --generate --no-interaction
php artisan make:filament-resource Pengiriman --generate --no-interaction
php artisan make:filament-resource AnggotaTim --generate --no-interaction
INNER_EOF
