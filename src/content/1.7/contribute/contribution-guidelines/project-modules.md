---
title: Contribution guidelines for modules
menuTitle: Project Modules
---

# Contribution guidelines for modules

This document describes general guidelines for contributing to PrestaShop modules hosted on GitHub.

## How to contribute 

Contributors wishing to edit a module's files should follow the following process:

1. Create your GitHub account, if you do not have one already.
2. Fork the project to your GitHub account.
3. Clone your fork to your local machine in the ```/modules``` directory of your PrestaShop installation.
4. Create a branch in your local clone of the module for your changes.
5. Change the files in your branch.

  - Be sure to follow the [coding standards][1].
  - Do not update the module's version number.

6. Push your changed branch to your fork in your GitHub account.
7. Create a pull request for your changes on the `dev` branch of the module's project. Make sure to describe your change as best as you can: a good description can help a lot on making your contribution accepted.  
  If you need help to make a pull request, read the [GitHub help page about creating pull requests][3].
8. Wait for one of the module maintainers either to include your change in the codebase, or to comment on possible improvements you should make to your code.

## Requirements

### License

Unless specified otherwise, PrestaShop modules are released under the [Academic Free License 3.0][AFL-3.0]. All contributions made to those modules are automatically licensed under the same terms.

A license file must be stored inside the module (usually it's a LICENSE.md file). Its content is the terms of the AFL-3.0 license.

### File headers

All files within a module must include the AFL license header, as provided in the [coding standards chapter]({{< ref "1.7/development/coding-standards/_index.md#module-files" >}}).

They can easily be applied by using the `header-stamp` binary from [PrestaShop modules developer tools][php-dev-tools].

### Contributors file

A list of the project contributors must be stored inside the module. Usually it's a file named CONTRIBUTORS.md . It must be up-to-date when a new version is released.

[report-issue]: https://github.com/PrestaShop/PrestaShop/issues/new/choose
[1]: {{< ref "1.7/development/coding-standards/_index.md" >}}
[2]: {{< ref "1.7/contribute/contribution-guidelines" >}}
[3]: https://help.github.com/articles/using-pull-requests
[AFL-3.0]: https://opensource.org/licenses/AFL-3.0
[php-dev-tools]: https://github.com/PrestaShop/php-dev-tools

