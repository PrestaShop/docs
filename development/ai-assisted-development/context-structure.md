---
title: Context Structure
weight: 10
---

# Context Structure

This page describes the `.ai/` folder structure used in the PrestaShop core repository and the simpler context approach used in smaller repositories.

## Core repository: the `.ai/` folder

The [PrestaShop/PrestaShop](https://github.com/PrestaShop/PrestaShop) repository uses a hierarchical `.ai/` folder as the centralized source of truth for all AI-assisted development context.

### Folder layout

```
.ai/
├── CONTEXT.md              # Root context: project-wide architecture and rules
├── STRUCTURE.md            # Documents the .ai/ folder conventions
├── GOTCHAS.md              # Common pitfalls and tricky patterns
├── MULTISTORE.md           # Multistore-specific guidance
├── Domain/
│   ├── Cart/
│   │   └── CONTEXT.md      # Cart domain rules and patterns
│   ├── Order/
│   │   └── CONTEXT.md
│   ├── Product/
│   │   └── CONTEXT.md
│   └── ...                  # 57 domain contexts total
├── Component/
│   ├── CQRS/
│   │   └── CONTEXT.md      # CQRS component rules
│   ├── Grid/
│   │   └── CONTEXT.md
│   ├── Form/
│   │   └── CONTEXT.md
│   └── ...                  # 22 component contexts total
├── skills/                  # Reusable AI task templates
│   └── ...
└── generated/               # Pre-generated indexes
    ├── cqrs.md              # CQRS commands and queries index
    ├── routes.md            # Routes index
    ├── entities.md          # Entities index
    └── hooks.md             # Hooks index
```

### Root CONTEXT.md

The [root `.ai/CONTEXT.md`](https://github.com/PrestaShop/PrestaShop/blob/develop/.ai/CONTEXT.md) is the entry point. It provides:

- Project-wide architecture overview (Core Domain, Adapter, PrestaShopBundle, Legacy layers)
- CQRS pattern conventions
- Global coding standards (strict types, `final` classes by default, no ObjectModel in new code)
- An index of all domain and component contexts
- References to generated index files

### Domain contexts

Each domain context (e.g., [`.ai/Domain/Cart/CONTEXT.md`](https://github.com/PrestaShop/PrestaShop/blob/develop/.ai/Domain/Cart/CONTEXT.md)) provides rules specific to that business domain. They follow a standard template defined in [`.ai/STRUCTURE.md`](https://github.com/PrestaShop/PrestaShop/blob/develop/.ai/STRUCTURE.md):

- **Purpose** -- what this domain covers
- **Architecture overview** -- key classes, services, and their relationships
- **Coding standards** -- domain-specific conventions
- **Do / Don't** -- explicit rules for this domain
- **Testing expectations** -- what tests are required
- **Canonical examples** -- reference files to follow
- **Related skills** -- links to reusable task templates

### Component contexts

Component contexts (e.g., `.ai/Component/CQRS/CONTEXT.md`) follow the same template but describe cross-cutting shared infrastructure like Grid, Forms, Hooks, or CQRS. These are especially important because mistakes in shared components propagate across the entire codebase.

### How pointer files work

Pointer files at the repository root contain no context themselves. They simply redirect the AI tool to the `.ai/` folder. For example, `CLAUDE.md` points to `.ai/CONTEXT.md`, which then references the relevant domain and component contexts.

The navigation flow:

```
AI tool reads pointer file (e.g., CLAUDE.md)
  → Follows reference to .ai/CONTEXT.md
    → Discovers domain context (e.g., .ai/Domain/Cart/CONTEXT.md)
    → Discovers component context (e.g., .ai/Component/CQRS/CONTEXT.md)
```

This means that when a developer works on cart-related code with an AI assistant, the assistant can follow this chain to load the Cart domain rules, CQRS component rules, and any cross-cutting guidance it needs.

## Smaller repositories

The [ps_apiresources](https://github.com/PrestaShop/ps_apiresources) and [hummingbird](https://github.com/PrestaShop/hummingbird) repositories use a simpler flat structure with a single `CONTEXT.md` at the root.

### ps_apiresources

The [`CONTEXT.md`](https://github.com/PrestaShop/ps_apiresources/blob/develop/CONTEXT.md) covers:

- Module purpose (declarative API endpoints using CQRS)
- The 8 operation attributes (CQRSGet, CQRSCreate, CQRSPartialUpdate, CQRSDelete, etc.)
- URI and OAuth2 scope naming conventions
- Property naming rules and field mapping strategies
- Testing expectations with `ApiTestCase`

### hummingbird

The [`CONTEXT.md`](https://github.com/PrestaShop/hummingbird/blob/develop/CONTEXT.md) covers:

- Theme architecture (Smarty, SCSS with BEM, vanilla JS/TypeScript, Vite)
- Strict boundaries (no business logic in themes)
- `data-ps-*` attribute system for DOM bindings
- SCSS layer architecture
- Accessibility baseline
- "Vibe coding rules" (no jQuery, strict TypeScript, TDD, Storybook, BEM)

These repositories also include pointer files (`CLAUDE.md`, `.github/copilot-instructions.md`) that reference the root `CONTEXT.md`.

## Canonical template reference

The canonical template for writing `CONTEXT.md` files is documented in [`.ai/STRUCTURE.md`](https://github.com/PrestaShop/PrestaShop/blob/develop/.ai/STRUCTURE.md) in the core repository. Refer to it when creating new context files for domains, components, or external modules.
