#!/usr/bin/env sh
set -e

if [ ! -f /var/www/html/vendor/autoload.php ] && [ -f /var/www/html/composer.json ]; then
  echo "vendor/autoload.php missing; running composer install..."
  composer install --no-interaction --prefer-dist --optimize-autoloader
fi

exec "$@"
