---
title: How the documentation is built
weight: 40
---

# How the documentation is built

## Insights

This site is built using the wonderful [Hugo static site generator](https://gohugo.io/).

- The **sources** of this site are hosted on devdocs-site, the [Sources repository](https://github.com/PrestaShop/devdocs-site/).
- The **Hugo theme** of this site is hosted on ps-docs-theme, the [Theme repository](https://github.com/PrestaShop/ps-docs-theme/).
- The **content** of this site is hosted on docs, the [Content Repository](https://github.com/PrestaShop/docs).

Every time a contribution is merged inside one of the docs branches, a first GitHub workflow will notify the Sources repository.

Upon being notified, a second GitHub workflow is triggered in devdocs-site, which updates its submodules and commits them.

This commit triggers a third GitHub workflow that will deploy the latest version to devdocs.prestashop.com .

{{% notice warning %}}
Theme updates do not trigger a deployment, consequently following a theme update, the docs website must be deployed manually.
{{% /notice %}}

## For users

For content contributions, such as adding a new page, updating or fixing some existing content, the only thing needed is to submit a Pull Request against the right branch on the [Content Repository](https://github.com/PrestaShop/docs).

If you want to update the 1.7 documentation, submit your Pull Request against the `1.7.x` branch.

If you want to update the 8.x documentation, submit your Pull Request against the `8.x` branch.
