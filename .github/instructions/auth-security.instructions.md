---
applyTo: "**/{login.php,register.php}"
description: "Use when editing authentication handlers; enforce prepared statements, input validation, and explicit success/failure responses."
---
# Auth Handler Safety Rules

## Scope
- Applies only to login and registration handlers.
- Keep procedural PHP style consistent with current project patterns.

## Required Practices
- Validate and normalize all incoming POST fields before use.
- Use prepared statements for all SQL that includes user input.
- Handle missing accounts, duplicate usernames, query failures, and invalid credentials explicitly.
- Always produce a user-visible outcome after processing:
  - Redirect with status in query/session flash, or
  - Render a clear success/failure message.
- Keep `configuration.php` constants as the source of auth defaults.

## Registration-Specific Rules
- Read and validate `email` when persisting account data.
- Reject invalid email format and empty required fields.
- Do not insert partially validated account records.

## Login-Specific Rules
- Fail safely when account lookup returns no row.
- Guard against null/empty salt or verifier values before SRP comparison.

## Constraints
- Do not edit files in `vendor/`.
- Do not change SRP library behavior; only improve surrounding handler safety and flow.

## Validation Checklist
- Run `php -l login.php` and `php -l register.php` after changes.
- Manually test both success and failure paths for login and registration.
