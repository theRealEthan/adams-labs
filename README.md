# Dockerized Laravel + MySQL (no local PHP/Composer)

This repository provides a full Docker setup for Laravel with MySQL using volumes so you can edit code without rebuilding images. No local PHP or Composer required — everything runs in containers.

## Prerequisites

- Docker
- Docker Compose plugin (`docker compose`)

## What’s inside

- `app` (PHP-FPM 8.3) with required extensions
- `web` (Nginx) serving `public/` via PHP-FPM
- `db` (MySQL 8)
- `composer` service for running Composer inside a container
- Volumes for live code reload and persistent MySQL data

## Quick start

1) Bootstrap the app automatically (recommended):

```bash
# from repo root
bash scripts/bootstrap.sh
```

This will: pull images (if needed), scaffold Laravel into `src/`, configure `src/.env` for the MySQL service, start containers, wait for MySQL readiness, generate the app key, run migrations, and create the storage symlink.

Alternatively, do it manually:

```bash
mkdir -p src
docker compose run --rm -u "$(id -u):$(id -g)" composer create-project --prefer-dist --no-interaction --ignore-platform-reqs laravel/laravel .
```

2) Configure the app to use the bundled MySQL database. Update `src/.env` with (the script above does this for you):

```
DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=laravel
DB_PASSWORD=laravel
```

3) Start the stack:

```bash
docker compose up -d --build
```

4) Generate the app key and run migrations:

```bash
docker compose exec app php artisan key:generate
docker compose exec app php artisan migrate
```

5) Open the app: http://localhost:8080

## Common commands

- Composer (inside container):
  - `docker compose run --rm -u "$(id -u):$(id -g)" composer install`
  - `docker compose run --rm -u "$(id -u):$(id -g)" composer require vendor/package`

- Artisan:
  - `docker compose exec app php artisan <command>`

- Logs:
  - Nginx: `docker compose logs -f web`
  - PHP-FPM: `docker compose logs -f app`
  - MySQL: `docker compose logs -f db`

- MySQL shell:
  - `docker compose exec db mysql -u root -p` (password: `root`)

- Stop / remove containers:
  - Stop: `docker compose down`
  - Stop + wipe DB volume: `docker compose down -v`

## Notes

- Edits to files in `src/` are live; no rebuild is needed.
- Rebuild only when you change Dockerfiles or service configs: `docker compose build --no-cache app`
- Default ports: app `8080`, MySQL `3306`.

### Permissions
If you encounter permission errors like file_put_contents(...): Permission denied, grant write access to storage and cache (dev-only relaxed permissions):

```bash
docker compose exec app sh -lc 'chmod -R 777 storage bootstrap/cache'
```

Alternatively, change ownership to the PHP user (may change file owners on host):

```bash
docker compose exec app sh -lc 'chown -R www-data:www-data storage bootstrap/cache && chmod -R g+rwX storage bootstrap/cache'
```

## Structure

```
docker-compose.yml
docker/
  nginx/default.conf
  php/Dockerfile
  php/local.ini
scripts/
  bootstrap.sh
src/              # Laravel app lives here (created by composer)
```