---
title: Requirements
weight: 1
aliases:
  - /9/themes/getting-started/tools-for-theme-designers
---

# Requirements

The tools listed below are **recommended** for theme development. A PrestaShop theme is ultimately a set of template, CSS, and JavaScript files. You can create one with just a text editor. However, working with Hummingbird's source code and modern tooling requires the following.

## Tools

| Tool | Status | Purpose |
|------|--------|---------|
| **Node.js 20.x + npm 8+** | Recommended | Dependency management, asset compilation, task running, and linting |
| **Git** | Recommended | Version control, cloning Hummingbird |
| **Docker + Docker Compose** | Optional | Run a full PrestaShop environment without a local PHP/MySQL stack |

{{% notice info %}}
**Node.js** and **npm** are needed to compile Hummingbird's SCSS and JavaScript / TypeScript source files. If you are building a simple theme without a build pipeline, they are not strictly required.
{{% /notice %}}

### Node.js

Install from [nodejs.org](https://nodejs.org/). To manage multiple Node.js versions, use [nvm](https://github.com/nvm-sh/nvm), [fnm](https://github.com/Schniz/fnm) or [mise](https://github.com/jdx/mise).

{{% notice tip %}}
Hummingbird includes a **.nvmrc** file. If you use nvm, run `nvm use` in the theme directory to automatically switch to the correct Node.js version.
{{% /notice %}}

**Verify your installation:**

```bash
node -v   # Should output v20.x
```

### Git

Install from [git-scm.com](https://git-scm.com/).

**Verify your installation:**

```bash
git --version
```

### Docker

Install from [docker.com](https://www.docker.com/). Docker is the easiest way to get a running PrestaShop instance if you don't already have a local PHP and MySQL setup. Hummingbird includes ready-to-use Docker Compose configurations.

**Verify your installation:**

```bash
docker --version
docker compose version
```

## Next step

Once your tools are installed, follow the [Quick start]({{< relref "/9/themes/getting-started/quick-start" >}}) to get a working theme in minutes, or see [Environment setup]({{< relref "/9/themes/getting-started/environment-setup" >}}) for detailed configuration options.
