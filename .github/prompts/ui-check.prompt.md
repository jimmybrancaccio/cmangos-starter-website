---
name: UI Template Check
description: "Audit template changes for layout integrity, modal wiring, asset references, and route correctness."
argument-hint: "Optional: paste changed files or ask to review current workspace templates"
agent: agent
---
Review UI/template-related changes in this workspace and report findings.

Focus files:
- [index.php](../../index.php)
- [header.php](../../header.php)
- [footer.php](../../footer.php)
- [ui template instruction](../instructions/ui-template.instructions.md)

Checklist:
- Include flow is preserved: `index.php` includes `header.php` first and `footer.php` last.
- Document structure remains valid: opening tags in `header.php`, closing tags in `footer.php`.
- Modal wiring is intact:
  - Login modal posts to `/login`.
  - Register modal posts to `/register`.
  - Trigger/target ids still match.
- Auth field names expected by handlers are unchanged (`username`, `password`, `email`, `login`, `register`).
- Static assets still resolve (`assets/css/bootstrap.min.css`, `assets/css/custom.css`, `assets/js/bootstrap.bundle.min.js`).
- Changes stay in first-party files only; no edits to `vendor/`.

Output format:
1. Findings first, ordered by severity, each with file reference and fix recommendation.
2. Open questions/assumptions.
3. Brief change summary.
4. Manual validation steps to run locally (`php -l index.php`, `php -l header.php`, `php -l footer.php`, then a browser modal smoke test).

If no issues are found, explicitly say so and list any residual risks (for example, untested browser/device combinations).