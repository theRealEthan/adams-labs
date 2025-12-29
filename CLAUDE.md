# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project Overview

This is a **Dockerized Laravel 12 application** running on PHP 8.3 with MySQL 8. All development happens inside Docker containers—no local PHP or Composer installation is required.

**Tech Stack:**
- Laravel 12 (PHP 8.3)
- MySQL 8
- Nginx (web server)
- Vite + Tailwind CSS 4
- PHPUnit for testing

## Docker Architecture

The application uses Docker Compose with four services:
- **app**: PHP-FPM 8.3 container running Laravel
- **web**: Nginx serving the application on port 8080
- **db**: MySQL 8 database (port 3306)
- **composer**: Standalone container for running Composer commands

All Laravel code lives in `src/`. Changes to files in `src/` are live-mounted, so no rebuild is needed during development.

## Essential Commands

### Initial Setup

Bootstrap the entire application (recommended for first-time setup):
```bash
bash scripts/bootstrap.sh
```

### Docker Container Management

Start all services:
```bash
docker compose up -d --build
```

Stop containers:
```bash
docker compose down
```

Stop and wipe database:
```bash
docker compose down -v
```

View logs:
```bash
docker compose logs -f web    # Nginx logs
docker compose logs -f app    # PHP-FPM logs
docker compose logs -f db     # MySQL logs
```

### Composer

All Composer commands must run inside the `composer` container with proper user permissions:

```bash
# Install dependencies
docker compose run --rm -u "$(id -u):$(id -g)" composer install

# Add a package
docker compose run --rm -u "$(id -u):$(id -g)" composer require vendor/package

# Update dependencies
docker compose run --rm -u "$(id -u):$(id -g)" composer update
```

### Artisan Commands

Execute Artisan commands inside the `app` container:

```bash
# General syntax
docker compose exec app php artisan <command>

# Common examples
docker compose exec app php artisan migrate
docker compose exec app php artisan migrate:fresh --seed
docker compose exec app php artisan make:model ModelName -m
docker compose exec app php artisan make:controller ControllerName
docker compose exec app php artisan make:migration create_table_name
docker compose exec app php artisan key:generate
docker compose exec app php artisan config:clear
docker compose exec app php artisan cache:clear
docker compose exec app php artisan storage:link
```

### Testing

Run all tests:
```bash
docker compose exec app php artisan test
```

Run specific test suite:
```bash
docker compose exec app php artisan test --testsuite=Feature
docker compose exec app php artisan test --testsuite=Unit
```

Run a specific test file:
```bash
docker compose exec app php artisan test --filter TestClassName
```

Or use PHPUnit directly:
```bash
docker compose exec app vendor/bin/phpunit
docker compose exec app vendor/bin/phpunit tests/Feature/ExampleTest.php
```

### Code Quality

Format code with Laravel Pint:
```bash
docker compose exec app vendor/bin/pint
```

### Frontend (Vite)

Install npm dependencies (inside container or on host if Node.js is available):
```bash
npm install
```

Development server:
```bash
npm run dev
```

Build for production:
```bash
npm run build
```

### Database Access

MySQL shell:
```bash
docker compose exec db mysql -u root -p
# Password: root
```

Or connect as laravel user:
```bash
docker compose exec db mysql -u laravel -p
# Password: laravel
```

## Laravel Application Structure

The Laravel application follows standard Laravel 12 conventions:

### Directory Layout

```
src/
├── app/
│   ├── Http/
│   │   └── Controllers/     # Request handlers
│   ├── Models/              # Eloquent models
│   └── Providers/           # Service providers
├── bootstrap/               # Framework bootstrap
├── config/                  # Configuration files
├── database/
│   ├── factories/           # Model factories for testing
│   ├── migrations/          # Database migrations
│   └── seeders/             # Database seeders
├── public/                  # Web root (served by Nginx)
├── resources/
│   ├── css/                 # Stylesheets
│   ├── js/                  # JavaScript
│   └── views/               # Blade templates
├── routes/
│   ├── web.php             # Web routes
│   └── console.php         # Console commands
├── storage/                # Logs, cache, uploads
└── tests/
    ├── Feature/            # Feature tests
    └── Unit/               # Unit tests
```

### Configuration

Laravel 12 uses a streamlined bootstrap configuration in `bootstrap/app.php`:
- Routing configured via `withRouting()`
- Middleware via `withMiddleware()`
- Exception handling via `withExceptions()`

Traditional config files remain in `config/` directory for services like database, cache, mail, etc.

### Database Configuration

The `.env` file is configured for the Docker MySQL service:
- Host: `db` (Docker service name)
- Database: `laravel`
- Username: `laravel`
- Password: `laravel`

Testing uses SQLite in-memory database (configured in `phpunit.xml`).

### Frontend Build

Vite is configured with:
- Entry points: `resources/css/app.css`, `resources/js/app.js`
- Tailwind CSS 4 via `@tailwindcss/vite` plugin
- Hot module replacement enabled
- Framework views ignored to prevent unnecessary rebuilds

## Important Notes

### File Permissions

If you encounter permission errors (e.g., `file_put_contents(): Permission denied`), fix with:

```bash
docker compose exec app sh -lc 'chmod -R 777 storage bootstrap/cache'
```

### No Rebuild Required

Changes to PHP files, Blade templates, and other code are immediately available because `src/` is volume-mounted. Only rebuild when modifying:
- Docker configuration (`docker-compose.yml`)
- Dockerfiles (`docker/php/Dockerfile`)
- PHP configuration (`docker/php/local.ini`)

Rebuild with:
```bash
docker compose build --no-cache app
```

### Environment Variables

Application runs at `http://localhost:8080` (configured in `.env` as `APP_URL`).

### Health Check

Laravel provides a built-in health check endpoint at `/up`.
