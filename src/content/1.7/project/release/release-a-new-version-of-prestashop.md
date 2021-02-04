---
title: Release a new PrestaShop version
weight: 4
---

# Release a new PrestaShop version

## Overview

What does it mean, "to release a new version of "PrestaShop"? Actually many different answers are eligible.

You could say that "a new version of PrestaShop is released when there is a new release on the [GitHub repository][github-repository]". Or you could say "a new version of PrestaShop is released when I can download a new version on prestashop.com". You could also say "a new version of PrestaShop is released when the auto-upgrade module allows to upgrade to this new version".

So let's first put some words on all of these statements, to avoid any confusion.

### Steps to release a new version of PrestaShop:

1. Checks some manual procedures. They ensure the codebase is in an eligible state for release.
2. Create a new Build of PrestaShop, which is a ZIP archive which contains the software, the compiled assets (JavaScript and CSS) and the JavaScript and PHP third party dependencies. It does not contain the development sources, the libraries, the tests... that are useful only for development.
3. Make it available on GitHub as a GitHub release, and tag the commit used as basis for the build. This way, it's possible to identify the exact point in git history where release was built.
4. Make the ZIP archive available to download on prestashop.com
5. Activate multiple settings in PrestaShop Addons system so the PrestaShop API allows the new version of PrestaShop to download modules adapted to it
6. Activate multiple settings in PrestaShop Internationalization API so it allows the new version of PrestaShop to download localization packs
7. Update the XML stream being used by auto-upgrade module to monitor what versions of PrestaShop are available
8. Create new Docker images for the new version

## 1. Checks some manual procedures

Please check that:
* All license headers are correct
  * `php bin/console prestashop:licenses:update`
* All controllers are secured by annotations, and legacy link are provided for Symfony routes
  * `php bin/console prestashop:linter:security-annotation`
  * `php bin/console prestashop:linter:legacy-link`
* There are no known vulnerabilities in composer dependencies
  * `php bin/console security:check`
* For minor and major releases, check we have not forgotten important `@todo` annotations in modern code
* All new hooks are [registered][register-new-hook]
* Check that generated [FOS JSON routing][fos-js-routing] file is up-to-date
  * `php bin/console fos:js-routing:dump --format=json --target=admin-dev/themes/new-theme/js/fos_js_routes.json`
* New native modules are integrated into `composer.json` and `composer.lock`
  * `composer outdated -D "prestashop/*"`
* Nightly builds should be green for target branch
  * [https://nightly.prestashop.com/][nightly-build-board]
* Latest docker image runs
  * [https://github.com/PrestaShop/docker][docker-repository]
  * [https://hub.docker.com/r/prestashop/prestashop/][docker-hub-prestashop]
* Assets are [built and up-to-date][how-to-build-assets]
  * `./tools/assets/build.sh`

{{% notice tip %}}
**At the end of this step, if every check is successfull, we can assert the codebase is in an eligible state for release.**
{{% /notice %}}

## 2. (re)Make a build

First you can update the Release Tracker GitHub issue (there is one per version, see the [1.7.6.6 example][release-tracker-issue]): step "Development" is done.

### Preparing build files and translation catalog

Before starting the making of the build, some files must be prepared by a member of PrestaShop company.
- the Changelog file
- the Contributors file

The Translations catalog must also be updated.

### Building the ZIP archive

Here is the process to create a new version of PrestaShop 1.7.6 from its branch `1.7.6.x`. Building a new version for other `1.7.x.y` branches is very similar, same steps can be followed.

1. Clone the repository, checkout the branch
    * `git clone git@github.com:PrestaShop/PrestaShop.git`

2. Update the code to acknowledge the new version:
   - update version number in files `app/AppKernel.php` and `install-dev/install_version.php` (see the 1.7.6.6 [example][bump-core-version-pr-example])
   - update the Changelog file `docs/CHANGELOG.txt` and the `CONTRIBUTORS.md` files with new content and new contributors (see the 1.7.6.6 [example][update-author-pr-example])
3. Create a new branch, commit your changed files with the message "// Changelog [version]".

{{% notice warning %}}
Do not delete this branch! It will be merged (through a Pull Request) later in the project, if QA validates the build.<br/>Keep it on your computer. You can also push it on your fork.
{{% /notice %}}

4. Use the embedded CLI [PrestaShop Release Creator][release-creator-readme] to create the ZIP archive

Example of Release Creator usage: `php tools/build/CreateRelease.php --version="1.7.6.6"`

{{% notice warning %}}
The Release Creator will build the ZIP file and some prestashop_1.7.X.Y.xml XML files. Keep all of them!<br/>They are needed for later for the upgrade process.
{{% /notice %}}

This allows you to create a new ZIP archive which contains the software. It can be installed and run, however the installation process might be unable to download new language packs and download any modules from Addons if the Addons and Translation systems do not acknowledge this version.

If you want to remake the build of a release for comparison and repeatability purpose, make sure you checkout the very same git commit, as the Release Creator will use it to build the code. You can find it on [the repository GitHub tags list][core-github-tags].

The build will now be delivered to QA team for validation.

You can update the Release Tracker GitHub issue: step "Build" is done.

## 3. Make a new version on GitHub

When QA team has validated the build, this step can be performed.

First, you can update the Release Tracker GitHub issue: step "QA validation" is done.

Only maintainers of the project are granted rights to create new GitHub versions on the PrestaShop repository. However someone who forked the repository can create such a release on his own repository. This can be an opportunity to learn the process, or to reproduce the release for studying purposes.

### 3.1 Merge the build branch on GitHub

Open a Pull Request to merge the work you have carried out for the Build: updating the version number and modifying Changelog and Contributors files.

This is the branch you created at step 3 "Create a new branch, commit your changed files" when building the ZIP archive.

The Pull Request must target the `1.7.x.y` branch used for building the new release.

When it is merged, **[tag the last commit][git-create-tag] on this branch**. Not the merge commit that was created by GitHub, but rather the one before. The one that has commit message "// Changelog [version]".

### 3.2 Create GitHub release

Open GitHub and go to ["Releases" page][core-github-releases], click "Draft a new release".

- use the tag you created as a target
- use the Changelog as description
- attach the ZIP archive

And publish the new release!

You can update the Release Tracker GitHub issue: step "Release" is done.

## 4. Make a new version on prestashop.com

This information is currently private to PrestaShop company. It simply involves uploading the ZIP on the website for distribution.

## 5. Configure Addons API for the new version

This information is currently private to PrestaShop company.
It aims to allow the Addons API to serve modules for the new version.

## 6. Configure Internationalization API for the new version

This information is currently private to PrestaShop company.
It aims to allow the Internationalization API to serve localization packs for the new version.

## 7. Update XML stream to allow auto-upgrade module to perform upgrades to the new version

This information is currently private to PrestaShop company.

It aims to update the XML document used by PrestaShop API for the upgrade process. Once updated, the [auto-upgrade module][autoupgrade-repository] is able to parse it and acknowledge the new available version.

You can update the Release Tracker GitHub issue: step "Available for upgrade" is done.

## 8. Create Docker images for the new version

1. Checkout the [project][docker-repository] and create a new branch
2. Modify the following files (see [this PR as example][docker-release-pr-example]:
 - `versions.txt` - in which you add the new version
 - `versions<major version>.txt` - the new release must be added at the end of the file
 - `.travis.yml` - to test the image creation with the new release, you can update the test case corresponding to the same major version.
3. Commit these changes
4. Run `generate_all.sh`, all Dockerfile will (re)generated in the folder `images/`
5. Commit these changes
6. Create a PR to merge this branch into upstream
7. PR must be approved and merged.

Docker Hub is synchronized with the GitHub repository and will quickly provide the new images.

You can update the Release Tracker GitHub issue: step "Docker image" is done.

{{% notice tip %}}
The release is now complete, congratulations. You can close the Relese Tracker GitHub issue.
{{% /notice %}}

[github-repository]: https://github.com/prestashop/prestashop
[core-github-tags]: https://github.com/PrestaShop/PrestaShop/tags
[core-github-releases]: https://github.com/PrestaShop/PrestaShop/releases
[nightly-build-board]: https://nightly.prestashop.com/
[docker-repository]: https://github.com/PrestaShop/docker
[docker-hub-prestashop]: https://hub.docker.com/r/prestashop/prestashop/
[bump-core-version-pr-example]: https://github.com/PrestaShop/PrestaShop/pull/19980
[update-author-pr-example]: https://github.com/PrestaShop/PrestaShop/pull/20032
[release-creator-readme]: https://github.com/PrestaShop/PrestaShop/blob/develop/tools/build/README.md
[autoupgrade-repository]: https://github.com/PrestaShop/autoupgrade
[docker-release-pr-example]: https://github.com/PrestaShop/docker/pull/225
[register-new-hook]: {{< ref "/1.7/development/components/hook/register-new-hook.md" >}}
[fos-js-routing]: https://github.com/FriendsOfSymfony/FOSJsRoutingBundle
[how-to-build-assets]: {{< ref "/1.7/development/compile-assets.md" >}}
[git-create-tag]: https://git-scm.com/book/en/v2/Git-Basics-Tagging
[release-tracker-issue]: https://github.com/PrestaShop/PrestaShop/issues/19959
