---
title: Maintaining Context Files
menuTitle: "Maintaining Context"
weight: 30
---

# Maintaining Context Files

This page is for contributors and maintainers who need to create or update AI context files in PrestaShop repositories.

## When to update context files

You should update a `CONTEXT.md` file when:

- **A new domain is created** -- add a new `.ai/Domain/{DomainName}/CONTEXT.md`
- **A new shared component is introduced** -- add a new `.ai/Component/{ComponentName}/CONTEXT.md`
- **Architectural rules change** -- update the relevant domain or component context
- **New patterns or conventions are established** -- reflect them in the appropriate context file
- **Significant refactoring occurs** -- ensure the context still accurately describes the current state

{{% notice tip %}}
The core repository includes a CI check that warns when code in a domain is modified but the corresponding `CONTEXT.md` was not updated in the same pull request. This serves as a reminder, not a blocker.
{{% /notice %}}

## Template

All `CONTEXT.md` files should follow the template defined in [`.ai/STRUCTURE.md`](https://github.com/PrestaShop/PrestaShop/blob/develop/.ai/STRUCTURE.md). The required sections are:

1. **Purpose** -- one or two sentences describing what this domain or component covers
2. **Architecture overview** -- key classes, services, their relationships, and the layer they belong to
3. **Coding standards** -- conventions specific to this area (beyond the global standards)
4. **Do / Don't** -- explicit rules as bullet lists, easy for both humans and AI to parse
5. **Testing expectations** -- what types of tests are required and what they should cover
6. **Canonical examples** -- paths to reference files that represent the expected patterns
7. **Related skills** -- links to reusable task templates in `.ai/skills/` if applicable

## Writing effective context

### Be specific and actionable

Good context gives clear instructions that an AI can follow without ambiguity:

```markdown
## Do
- Use `CartConstraintException` for validation errors in Cart handlers
- Always dispatch `ActionCartUpdated` hook after modifying cart contents

## Don't
- Do not call `Cart` ObjectModel directly from handlers -- use `CartRepository`
- Do not add business logic in `CartController` -- delegate to CQRS commands
```

### Reference real files

Point to actual files in the codebase as canonical examples. AI assistants can then read these files to understand the expected patterns:

```markdown
## Canonical examples
- Command: `src/Core/Domain/Cart/Command/AddCartRuleToCartCommand.php`
- Handler: `src/Adapter/Cart/CommandHandler/AddCartRuleToCartHandler.php`
- Test: `tests/Integration/Behaviour/Features/Scenario/Cart/add_cart_rule.feature`
```

### Keep context current

Context files that describe outdated patterns are worse than no context at all -- they actively mislead AI assistants into generating incorrect code. When reviewing PRs that change domain or component behavior, check whether the corresponding context file needs updating.

## Anti-patterns to avoid

| Anti-pattern | Why it's harmful |
|-------------|-----------------|
| Duplicating context across pointer files | Creates drift between tools; update one place, forget another |
| Writing tool-specific syntax in CONTEXT.md | Breaks the agnostic approach; CONTEXT.md should be plain Markdown |
| Describing what the code does instead of what the rules are | AI can read the code itself; it needs to know the constraints and conventions |
| Leaving placeholder contexts with no real content | Empty contexts waste the AI's attention budget without adding value |
| Copying the full CONTEXT.md into pointer files | Pointer files should only contain a reference, not the content |

## Adding context to modules and themes

External modules and themes can follow the same pattern. For a simple module or theme, a single `CONTEXT.md` at the root is sufficient (see [ps_apiresources](https://github.com/PrestaShop/ps_apiresources/blob/develop/CONTEXT.md) and [hummingbird](https://github.com/PrestaShop/hummingbird/blob/develop/CONTEXT.md) as examples). For larger modules, consider adopting the full `.ai/` folder structure from the core repository.

To support multiple AI tools, add pointer files at the repository root:

- `CLAUDE.md` -- for Claude Code
- `AGENTS.md` -- for generic AI agents
- `.github/copilot-instructions.md` -- for GitHub Copilot
- `.cursor/rules/{module-name}-context.mdc` -- for Cursor

Each pointer file should contain only a reference to the main `CONTEXT.md`:

```markdown
Read and follow the instructions in CONTEXT.md
```
