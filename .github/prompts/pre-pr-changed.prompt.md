---
name: Pre-PR Changed Files Check
description: "Fast pre-PR review focused only on changed files with a single overall risk rating."
argument-hint: "Optional: provide file list or ask to detect changed files from git"
agent: agent
---
Run a quick pre-PR risk review using changed files only.

Scope rules:
- Detect changed first-party files from git status or provided file list.
- Review only changed files plus directly related guidance files.
- Ignore unchanged areas unless needed to confirm compatibility.

Guidance files:
- [auth security instruction](../instructions/auth-security.instructions.md)
- [ui template instruction](../instructions/ui-template.instructions.md)

Checks to apply when relevant files are changed:
- Auth files changed:
  - Validate required POST fields before use.
  - Use prepared statements for SQL with user-controlled input.
  - Ensure explicit success/failure behavior.
- UI/template files changed:
  - Preserve include order and document structure ownership.
  - Preserve modal routes and auth field names.
  - Keep required static assets intact.
- Always:
  - No edits to vendor files.
  - Keep configuration defaults sourced from [configuration.php](../../configuration.php).

Output format:
1. Findings first, ordered by severity, each with file reference and exact fix.
2. Overall risk status: high risk, medium risk, or low risk.
3. Open questions or assumptions.
4. Brief summary.
5. Minimal validation plan for only the changed PHP files plus relevant manual smoke tests.

If no issues are found, explicitly say so, return low risk, and include residual risks.
