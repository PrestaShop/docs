---
title: Release a new PrestaShop version
weight: 4
---

# Release a new PrestaShop version

## Overview

What does it mean, "to release a new version of "PrestaShop"? Actually many different answers are eligible.

You could say that "a new version of PrestaShop is released when there is a new release on the GitHub repository". Or you could say "a new version of PrestaShop is released when I can download a new version on prestashop.com". You could also say "a new version of PrestaShop is released when the auto-upgrade module allows to upgrade to this new version".

So let's first put some words on all of these statements, to avoid any confusion.

Steps to release a new version of PrestaShop:

1. Create a new Build of PrestaShop, which is a ZIP archive which contains the software
2. Make it available on GitHub as a GitHub release, and tag the commit used as basis for the build. This  way, it's possible to identify the exact point in git history where release was built.
3. Make the ZIP archive available to download on prestashop.com
4. Activate multiple settings in PrestaShop Addons system so the PrestaShop API allows the new version of PrestaShop to download modules adapted to it
5. Activate multiple settings in PrestaShop Internationalization API so it allows the new version of PrestaShop to download localization packs
6. Update the XML stream being used by auto-upgrade module to monitor what versions of PrestaShop are available
7. Create new Docker images for the new version

## 1. (re)Make a build

If you want to create a new version of PrestaShop from its branch `1.7.6.x`, here is the process:

1. Clone the repository, checkout the branch
2. Update the code to acknowledge the new version:
 - update version number in files `app/AppKernel.php` and `nstall-dev/install_version.php` (see the 1.7.6.6 [example](https://github.com/PrestaShop/PrestaShop/pull/19980))
 - update the Changelog file `docs/CHANGELOG.txt` and the `CONTRIBUTORS.md` files with new content and new contributors (see the 1.7.6.6 [example](https://github.com/PrestaShop/PrestaShop/pull/20032))
3. Use the embedded CLI [PrestaShop Release Creator](https://github.com/PrestaShop/PrestaShop/blob/develop/tools/build/README.md) to create the ZIP archive

Example of Release Creator usage: `php tools/build/CreateRelease.php --version="1.7.6.6"`

This allows you to create a new ZIP archive which contains the software. It can be installed and run, however the installation process might be unable to download new language packs and download any modules from Addons if the Addons and Translation systems do not acknowledge this version.

If you want to remake the build of a release for comparison and repeatability purpose, make sure you checkout the very same git commit, as the Release Creator will use it to build the code. You can find it on [the repository GitHub tags list](https://github.com/PrestaShop/PrestaShop/tags).

## 2. Make a new version on GitHub

Only maintainers of the project are granted rights to create new GitHub versions on the PrestaShop repository. However someone who forked the repository can create such a release on his own repository. This can be n opportunity to learn the process, or to reproduce the release for studying purposes.

The first step is to merge (using a Pull Request) into the GitHub branch the work you have carried out for the Build: updating the version number and modifying Changelog and Contributors files.

When it is merged, tag the last commit on this branch (not the merge commit, but rather the one before).

Open GitHub and go to ["Releases" page](https://github.com/PrestaShop/PrestaShop/releases), click "Draft a new release".

- use the tag you created as a target
- use the Changelog as description
- attach the ZIP archive

And publish the new release !

## 3. Make a new version on prestashop.com

This information is private to PrestaShop company, but we can say it is simply a form where we input the version number and upload the new ZIP archive.

## 4. Configure Addons API for the new version

This information is private, but we can say it is simply a series of steps to create some artifacts which, when configured properly, allow the Addons API to serve modules for the new version.

## 5. Configure Internationalization API for the new version

This information is private, but we can say it is simply a series of steps to create some artifacts which, when configured properly, allow the Internationalization API to serve localization packs for the new version.

## 6. Update XML stream to allow auto-upgrade module to perform upgrades to the new version

It is a simple update of a XML document. Once updated, the [auto-upgrade module](https://github.com/PrestaShop/autoupgrade/) is able to parse it and acknowledge the new available version.

## 7. Create Docker images for the new version

1. Checkout the [project](https://github.com/PrestaShop/docker) and create a new branch
2. Modify the following files (see [this PR as example](https://github.com/PrestaShop/docker/pull/225)):
 - `versions.txt` - in which you add the new version
 - `versions<major version>.txt` - the new release must be added at the end of the file
 - `.travis.yml` - to test the image creation with the new release, you can update the test case corresponding to the same major version.
3. Commit these changes
4. Run `generate_all.sh`, all Dockerfile will (re)generated in the folder `images/`
5. Commit these changes
6. Create a PR to merge this branch into upstream
7. PR must be approved and merged.

Docker Hub is synchronized with the GitHub repository and will quickly provide the new images.
