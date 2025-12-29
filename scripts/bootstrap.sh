#!/usr/bin/env bash
set -euo pipefail

root_dir="$(cd "$(dirname "${BASH_SOURCE[0]}")"/.. && pwd)"
cd "$root_dir"

if ! command -v docker >/dev/null 2>&1; then
  echo "Docker is required but not found in PATH." >&2
  exit 1
fi

mkdir -p src

# Ensure src is empty (or only contains .gitkeep) to avoid overwriting
shopt -s nullglob dotglob
files=(src/*)
if (( ${#files[@]} > 0 )); then
  if ! [[ ${#files[@]} -eq 1 && ${files[0]} == "src/.gitkeep" ]]; then
    echo "Directory src/ is not empty. Aborting to avoid overwriting existing files." >&2
    exit 1
  fi
fi
rm -f src/.gitkeep || true

echo "Pulling images (if needed)..."
docker compose pull --quiet || true

echo "Scaffolding Laravel via composer container..."
docker compose run --rm -u "$(id -u):$(id -g)" composer \
  create-project --prefer-dist --no-interaction --ignore-platform-reqs laravel/laravel .

# cross-platform sed (GNU/BSD)
sedi() { sed -i.bak -E "$1" "$2" && rm -f "$2.bak"; }

if [[ -f src/.env ]]; then
  echo "Configuring .env for MySQL service..."
  sedi 's/^DB_CONNECTION=.*/DB_CONNECTION=mysql/' src/.env
  sedi 's/^DB_HOST=.*/DB_HOST=db/' src/.env
  sedi 's/^DB_PORT=.*/DB_PORT=3306/' src/.env
  sedi 's/^DB_DATABASE=.*/DB_DATABASE=laravel/' src/.env
  sedi 's/^DB_USERNAME=.*/DB_USERNAME=laravel/' src/.env
  sedi 's/^DB_PASSWORD=.*/DB_PASSWORD=laravel/' src/.env
  sedi 's#^APP_URL=.*#APP_URL=http://localhost:8080#' src/.env || true
fi

echo "Starting containers..."
docker compose up -d --build

echo "Waiting for MySQL (db) to become ready..."
until docker compose exec -T db sh -c 'mysqladmin ping -h 127.0.0.1 -uroot -proot --silent'; do
  sleep 1
done

echo "Generating app key and running migrations..."
docker compose exec app php artisan key:generate
docker compose exec app php artisan migrate --force || true
docker compose exec app php artisan storage:link || true

# Relax permissions for dev so PHP-FPM can write
docker compose exec app sh -lc 'chmod -R 777 storage bootstrap/cache' || true

echo "\nLaravel is up at: http://localhost:8080\n"
