# Project Guidelines

## Stack and Scope
- This is a lightweight PHP website for CMaNGOS account login/registration.
- First-party code lives mainly in repository root PHP files and `assets/`.
- Dependencies are managed by Composer and loaded from `vendor/`; do not edit `vendor/` files directly.

## Architecture
- `index.php` is the landing page and includes shared layout from `header.php` and `footer.php`.
- `header.php` contains page head, navbar, and starts sessions.
- `footer.php` contains auth modals/forms and Bootstrap JS include.
- `login.php` handles POST login flow and SRP verifier comparison.
- `register.php` handles POST registration flow and account insertion.
- `configuration.php` defines DB and account defaults (`GM_LEVEL`, `EXPANSION_PACK`).
- URL routing relies on Apache rewrite rules in `.htaccess` (`/login` -> `login.php`, `/register` -> `register.php`).

## Build and Validation
- Install dependencies with `composer install`.
- There is no formal test suite in this repo; use focused manual validation for changed flows.
- Preferred lightweight validation after PHP changes:
  - `php -l login.php`
  - `php -l register.php`
  - `php -l header.php`
  - `php -l footer.php`

## Coding Conventions
- Keep existing procedural PHP style unless a task explicitly requests refactoring.
- Use `include __DIR__ . '/file.php'` and `require_once __DIR__ . '/vendor/autoload.php'` patterns for includes/autoloading.
- Keep Bootstrap-first markup patterns used in `header.php`, `footer.php`, and `index.php`.
- Preserve configuration constants in `configuration.php`; avoid hardcoding DB/auth defaults in handlers.
- Match current file style: concise comments, straightforward control flow, no framework assumptions.

## Critical Gotchas
- Current auth handlers intentionally have placeholder success/failure handling; avoid introducing silent blank-page outcomes in new changes.
- Registration currently posts an `email` field from the form; ensure handler logic reads and validates all posted fields it persists.
- Avoid raw SQL string interpolation for user input in new code; prefer prepared statements for any modified query paths.
- This project assumes a reachable CMaNGOS `realmd` database schema.

## Documentation
- For setup and project intent, refer to `README.md`.
- Keep workspace instructions brief; add deeper implementation notes to dedicated docs when needed instead of expanding this file.
