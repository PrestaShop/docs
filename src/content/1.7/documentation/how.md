---
title: How to contribute
weight: 2
---

# How to contribute to PrestaShop's documentation

**TL;DR** – Contributing is super easy! Edit any page by clicking on the "Improve this page" link at the top right corner of your screen.

## Getting started

There are two ways to contribute to this documentation:

#### Edit on GitHub
    
You can pretty much everything directly on GitHub! Click on the "Improve this page" at the top right of the page you want to edit.

#### Standard git workflow
   
Fork the project on GitHub, work on a separate branch, push to your fork and submit a Pull Request.

{{% notice tip %}}
**Git workflow is recommended** if you already know your way around the git, or if you want to work on the site itself. It will also allow you to build the site locally and check out exactly how your changes will look.
{{% /notice %}}

**The documentation source code is located in the following GitHub URL:**

[{{% siteparam ghRepoURL %}}]({{% siteparam ghRepoURL %}})

> Note that we are currently using the `hugo` branch instead of `master`. This will change after the legacy documentation is fully migrated, and the old site phased out.

## Writing Markdown

This site was created using the wonderful [Hugo static site generator](https://gohugo.io/), but the content itself is written using **Markdown**.

Don't worry, you don't need to know anything about Hugo or the Go language to write documentation. The Markdown syntax is basically plain text with some simple added syntax for styling.

If you don't know Markdown yet, have a look at this [quick Markdown guide from GitHub](https://guides.github.com/features/mastering-markdown/).

### Extended features: Shortcodes

Hugo uses special short codes for many things. [Read about them here]({{< ref "1.7/documentation/shortcodes/_index.md" >}}).
