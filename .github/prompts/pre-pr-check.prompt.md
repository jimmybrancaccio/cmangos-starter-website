---
name: Pre-PR Risk Check
description: "Run a combined auth + UI review and produce a single risk summary before opening a PR."
argument-hint: "Optional: describe changed files or ask to scan the workspace for recent edits"
agent: agent
---
Review this workspace for pre-PR risks and produce one consolidated report.

Primary files:
- [login.php](../../login.php)
- [register.php](../../register.php)
- [configuration.php](../../configuration.php)
- [index.php](../../index.php)
- [header.php](../../header.php)
- [footer.php](../../footer.php)

Guidance files:
- [auth security instruction](../instructions/auth-security.instructions.md)
- [ui template instruction](../instructions/ui-template.instructions.md)

Review checklist:
- Auth safety:
  - Required POST fields are validated before use.
  - SQL with user-controlled input uses prepared statements.
  - Registration reads and validates `email` before insert.
  - Login safely handles no-row lookup and null/empty SRP values.
  - Success and failure paths are explicit and user-visible.
- UI/template integrity:
  - `index.php` include order remains header first, footer last.
  - Document structure ownership remains split correctly between `header.php` and `footer.php`.
  - Login/Register modal routes still post to `/login` and `/register`.
  - Auth form field names remain compatible with handlers (`username`, `password`, `email`, `login`, `register`).
  - Required static assets still resolve.
- Project constraints:
  - No edits to `vendor/`.
  - Config defaults continue to come from [configuration.php](../../configuration.php).

Output format:
1. Findings first, ordered by severity, each with file reference and exact fix recommendation.
2. Combined risk summary with one overall status:
   - `high risk`, `medium risk`, or `low risk`.
   - One-sentence rationale.
3. Open questions/assumptions.
4. Brief change summary.
5. Validation plan:
   - `php -l login.php`
   - `php -l register.php`
   - `php -l index.php`
   - `php -l header.php`
   - `php -l footer.php`
   - Manual smoke test for login/register success and failure flows.

If no issues are found, explicitly say so, return `low risk`, and list residual risks (for example, no automated integration tests against a live CMaNGOS realmd database).
