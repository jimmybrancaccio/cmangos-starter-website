---
name: Auth Handler Check
description: "Audit login/register changes for validation, SQL safety, SRP handling, and explicit success/failure flows."
argument-hint: "Optional: paste changed auth files or ask to review current workspace handlers"
agent: agent
---
Review authentication-related changes in this workspace and report findings.

Focus files:
- [login.php](../../login.php)
- [register.php](../../register.php)
- [configuration.php](../../configuration.php)
- [auth security instruction](../instructions/auth-security.instructions.md)

Checklist:
- Input validation is present for all required POST fields before use.
- SQL with user input uses prepared statements (no raw interpolation for username, password-derived values, email, or IP).
- Registration path correctly reads and validates `email` before insert.
- Login path handles no-row account lookups safely.
- Login path guards against null/empty SRP salt or verifier values before comparison.
- Success and failure outcomes are explicit and user-visible (redirect/session flash/message), not silent blank responses.
- Changes keep SRP library usage intact and do not modify vendor files.
- Configuration defaults continue to come from [configuration.php](../../configuration.php), not hardcoded literals.

Output format:
1. Findings first, ordered by severity, each with file reference and exact fix recommendation.
2. Open questions/assumptions.
3. Brief change summary.
4. Validation steps to run locally:
   - `php -l login.php`
   - `php -l register.php`
   - Manual tests for login and registration success/failure paths.

If no issues are found, explicitly say so and list residual risks (for example, missing integration tests against a live CMaNGOS realmd schema).
