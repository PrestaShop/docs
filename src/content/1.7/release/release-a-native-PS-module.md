---
title: Release a native PrestaShop module
weight: 3
---

# Release a new version of a native PrestaShop module

Some modules are embedded within PrestaShop ZIP archives and loaded through Composer package manager. They consequently are listed in the `composer.json` of the Core project.

This is what we call "native PrestaShop modules". The source code of these modules is hosted on GitHub.

This page explains what is needed to release these modules.

## Requirements

### Mandatory requirements

The module should be valid which means:

- it works as expected
- it complies with modules [contribution guidelines][contribution-guidelines]: license headers must be valid and necessary files (LICENSE, CONTRIBUTORS) must be embedded

### Recommended requirements

It is recommended:

- to have enabled [Release Drafter](https://github.com/release-drafter/release-drafter) on the module to automatize the process of creating a new GitHub release
- have enabled some Continous Integration tools such as phpstan or php-cs-fixer on the module

These tools will help releasing a clean module in a smooth manner but the release can happen without them.

## Release process


When multiple improvements (bug fixes, enhancements or new features) have been merged into the `dev` branch of a module, we can merge them into `master` to deliver a new release of the module.

### Choosing the new version number

We follow [SemVer](https://semver.org/) guidelines:

If the new version of the module is backward compatible, you can increase the version number either by a minor version or by a patch version.

However, if the new version of the module breaks backward compatibility, it must be a new major version.

### Update version number in the code

Create a Pull Request targeting `dev` branch. In this PR:

Update the module version in the following files:

- `config.xml`
- `<module_name>.php`

Commit the changes with git message:
```
// Version updated to v<new_version>
```
Get this PR approved and merge it into `dev`. See an [example](https://github.com/PrestaShop/ps_shoppingcart/pull/50/) of such PR. 

### Merge dev into master

Create a new PR to merge branch `dev` into branch `master`. See an [example](https://github.com/PrestaShop/ps_shoppingcart/pull/51) of such PR.

Kindly ask the QA team to perform a release test on this PR, warning them that this PR is a release PR and consequently they need to check the whole module behavior.

If QA validates the PR, it can be merged, which will update the `master` branch with the new code changes from `dev`.

### Create a GitHub Release

If you have enabled Release Drafter, it will create a draft release for you. You can review it and publish it.

Else, you need to do it manually:

Create a new tag with "v<new_version>" that targets the last commit on `master` and push it. This will publish the module version on https://packagist.org/ .

Create a release on Github based on the tag you just pushed.
In the content section, write a small changelog: list the PRs merged since the last version so that people can know what is included in the release (see this [example](https://github.com/PrestaShop/ps_shoppingcart/releases/tag/v2.0.3)).

(by the way, GitHub is able to create the release _and_ the tag at the same time from the "create a new release" page)

Attach to GitHub release a stand-alone ready-to-use ZIP archive of the module.

This archive must be a stand-alone running module, which means it musts embeds all necessary files for its correct behavior. This includes bundled frontend assets (JS, CSS), NPM dependencies or Composer dependencies.

### Addons API

PrestaShop instances are able to download new versions of modules through the Addons API. Addons API monitors the modules listed into the GitHub repository https://github.com/PrestaShop/PrestaShop-modules

When a `master` branch of one of these modules receives an update, Addons API will update the ZIP it delivers with the new content within 24 hours.


[contribution-guidelines]: {{< ref "/1.7/contribute/contribution-guidelines/project-modules" >}}