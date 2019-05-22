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

## License

Unless specified otherwise, PrestaShop modules are ars released under the [Academic Free License 3.0][AFL-3.0]. All contributions made to those modules are automatically licensed under the same terms.

### File headers

All files within a module must include the following license header:

```
/**
 * 2007-2019 PrestaShop SA and Contributors
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Academic Free License (AFL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * https://opensource.org/licenses/AFL-3.0
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@prestashop.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade PrestaShop to newer
 * versions in the future. If you wish to customize PrestaShop for your
 * needs please refer to https://www.prestashop.com for more information.
 *
 * @author    PrestaShop SA <contact@prestashop.com>
 * @copyright 2007-2019 PrestaShop SA and Contributors
 * @license   https://opensource.org/licenses/AFL-3.0  Academic Free License (AFL 3.0)
 * International Registered Trademark & Property of PrestaShop SA
 */
``` 
 

[report-issue]: https://github.com/PrestaShop/PrestaShop/issues/new/choose
[1]: {{< ref "1.7/development/coding-standards/_index.md" >}}
[2]: {{< ref "1.7/contribute/contribution-guidelines" >}}
[3]: https://help.github.com/articles/using-pull-requests
[AFL-3.0]: https://opensource.org/licenses/AFL-3.0


