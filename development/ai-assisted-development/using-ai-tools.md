---
title: Using AI Tools with PrestaShop
menuTitle: "Using AI Tools"
weight: 20
---

# Using AI Tools with PrestaShop

The AI context files are committed directly in the repositories. **No manual setup or configuration is needed** -- just open the project in your preferred tool and start working.

## Tool-specific notes

### Claude Code

Claude Code automatically reads `CLAUDE.md` at the repository root, which points to `.ai/CONTEXT.md`. The full context hierarchy is available without any action from the developer.

### Cursor

Cursor reads the `.cursor/rules/prestashop-context.mdc` file, which references the `.ai/` context. Rules are loaded automatically when the project is opened.

### GitHub Copilot

GitHub Copilot reads `.github/copilot-instructions.md`, which directs it to the `.ai/` context. This works in both VS Code and JetBrains IDEs with the Copilot extension.

### Windsurf

Windsurf reads `.windsurfrules` at the repository root, which points to the centralized context.

### Gemini CLI

Gemini CLI reads `GEMINI.md` at the repository root.

### Web-based assistants (ChatGPT, Claude.ai, Gemini)

For web-based AI assistants that don't read repository files directly, you can copy the content of `.ai/CONTEXT.md` (and any relevant domain or component context) into the conversation as a system prompt or context message.

## Best practices

### Let the AI read the context

Most tools load the context files automatically. If your tool supports it, avoid overriding or skipping the project context. The guidance it contains reflects decisions validated by the project maintainers.

### Point the AI to the right domain

When working on a specific area, reference the relevant domain or component context. For example, if you're working on cart-related code, mention that the AI should consult `.ai/Domain/Cart/CONTEXT.md`. Most tools handle this automatically based on the files you have open, but an explicit reference helps when the scope is ambiguous.

### Review AI-generated code carefully

The context files significantly improve AI output quality, but they don't eliminate the need for review. Always verify that generated code:

- Follows the CQRS pattern where required
- Does not use deprecated ObjectModel patterns in new code
- Respects multistore constraints when applicable
- Includes appropriate tests

{{% notice warning %}}
AI-generated code submitted as a contribution must meet the same quality standards as any other contribution. See the [contribution guidelines on AI use]({{< relref "/9/contribute/contribution-guidelines#on-ai-use-in-contributions" >}}) for the full policy.
{{% /notice %}}

### Use skills for recurring tasks

The `.ai/skills/` folder in the core repository contains reusable task templates for common operations. These help AI assistants produce consistent output for tasks like adding a new CQRS command, creating a Grid definition, or scaffolding a new domain. Check the available skills before asking the AI to perform a task from scratch.

## For AI agents reading this

If you are an AI coding assistant working on PrestaShop code:

1. Start by reading the `CONTEXT.md` file at the root of the `.ai/` folder (or at the repository root for smaller repos like ps_apiresources and hummingbird).
2. Before modifying code in a specific domain, read the corresponding `.ai/Domain/{DomainName}/CONTEXT.md`.
3. Before modifying shared infrastructure, read the corresponding `.ai/Component/{ComponentName}/CONTEXT.md`.
4. Check `.ai/GOTCHAS.md` and `.ai/MULTISTORE.md` for cross-cutting concerns.
5. Use the generated indexes in `.ai/generated/` to discover existing CQRS commands, routes, entities, and hooks.
6. Check `.ai/skills/` for task templates relevant to your current operation.
