---
title: AI-Assisted Development
menuTitle: "AI-Assisted Development"
weight: 80
chapter: true
---

# AI-Assisted Development

PrestaShop provides built-in context files that help AI coding assistants understand the project's architecture, conventions, and domain rules. These files are committed directly in the repositories and require no manual configuration.

{{% notice info %}}
The full `.ai/` context structure in the core repository is available **starting from PrestaShop 9.2**. The [ps_apiresources](https://github.com/PrestaShop/ps_apiresources) and [hummingbird](https://github.com/PrestaShop/hummingbird) repositories already include their own context files.
{{% /notice %}}

## Why built-in AI context?

PrestaShop is a large, mature codebase with strict architectural rules, legacy boundaries, and domain-specific patterns that AI tools cannot infer on their own. Without explicit guidance, AI assistants tend to:

- Generate code using deprecated ObjectModel patterns instead of CQRS
- Ignore multistore constraints
- Mix architectural layers (e.g., calling the database from a controller)
- Miss project-specific naming conventions

The AI context files solve this by providing a **single source of truth** that all AI tools can consume.

## Agnostic by design

Rather than maintaining separate configuration for each AI tool, PrestaShop uses a centralized approach:

1. **`CONTEXT.md` files** contain all the actual guidance (architecture rules, coding standards, do/don't lists, domain knowledge). They are written in plain Markdown, readable by both humans and AI.

2. **Pointer files** at the repository root redirect each tool to the central context:

| File | Tool |
|------|------|
| `CLAUDE.md` | Claude Code |
| `AGENTS.md` | Generic AI agents |
| `.cursor/rules/prestashop-context.mdc` | Cursor |
| `.github/copilot-instructions.md` | GitHub Copilot |
| `.windsurfrules` | Windsurf |
| `GEMINI.md` | Gemini CLI |

This means context is maintained in one place and all tools automatically stay up to date.

## Supported repositories

| Repository | Context structure | Since |
|-----------|-------------------|-------|
| [PrestaShop/PrestaShop](https://github.com/PrestaShop/PrestaShop) | Full `.ai/` hierarchy with domain and component contexts | 9.2 |
| [PrestaShop/ps_apiresources](https://github.com/PrestaShop/ps_apiresources) | Single `CONTEXT.md` at root with pointer files | Available now |
| [PrestaShop/hummingbird](https://github.com/PrestaShop/hummingbird) | Single `CONTEXT.md` at root with pointer files | Available now |

## Read more

{{% children /%}}
