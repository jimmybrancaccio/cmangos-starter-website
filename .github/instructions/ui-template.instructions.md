---
applyTo: "**/{index.php,header.php,footer.php}"
description: "Use when editing page layout and UI templates; preserve Bootstrap structure, include patterns, and modal form wiring."
---
# UI and Template Editing Rules

## Scope
- Applies only to the main page and shared template files.
- Keep edits compatible with existing Bootstrap 5 markup and classes.

## Required Practices
- Preserve the include flow:
  - `index.php` includes `header.php` first and `footer.php` last.
- Keep page structure valid:
  - `header.php` owns opening document tags and container start.
  - `footer.php` owns closing container/body/html tags.
- Maintain existing modal wiring and form actions:
  - Login modal posts to `/login`.
  - Register modal posts to `/register`.
- Keep static asset references stable unless the task explicitly requires changes:
  - `assets/css/bootstrap.min.css`
  - `assets/css/custom.css`
  - `assets/js/bootstrap.bundle.min.js`

## UX and Content Guidelines
- Keep markup straightforward and readable; avoid introducing framework-specific abstractions.
- Preserve accessibility basics already present (labels, button roles, modal attributes).
- For copy or visual updates, avoid changing authentication field names used by handlers.

## Constraints
- Do not move authentication logic into template files.
- Do not edit files in `vendor/`.

## Validation Checklist
- Run `php -l index.php`, `php -l header.php`, and `php -l footer.php` after template changes.
- Manually verify:
  - Homepage renders without broken layout.
  - Login and Register modals open and submit to correct routes.
  - Bootstrap styling and icons load correctly.
