---
title: Create the build
weight: 20
---

# Create a build package

Once preliminary tasks have been completed, the project is ready to be built.

## 1. Communicate

Starting this step means that the Development phase of this release is over. Before you go further, make sure to tick the "Development" box in the Release Tracker GitHub issue (there is one per version, see the [1.7.6.6 example][release-tracker-issue]).

## 2. Create a local branch for your build

The following tasks will require you to perform changes and submit them as a Pull Request.

* **Clone the project** on your computer using Git (only if you don't already have a local copy of the repository).

    ```shell
    git clone git@github.com:PrestaShop/PrestaShop.git
    ```

* **Make sure that you switch to the appropriate branch** regarding the version you'll be building (e.g. you must be on branch 1.7.7.x if you're building a 1.7.7 release).

* **Make sure your branch is up-to-date with upstream.** Especially if you already had a local clone of the repository.

* **Create a local branch for your work.** Keep it! You will need to go back to it later. 

## 3. Merge any not-yet published security fixes

{{% notice note %}}
**About security advisories.**

To avoid disclosing security issues, security Pull Request are merged _after_ the build has been done and validated. In order to include them in your build, you need to retrieve them manually and merge them in your local branch.
{{% /notice %}}

If this release includes security PRs:

- Add the different private temporary repositories for each Security Advisory as remotes of your local git repository.
- Merge each one of those PRs into your working local branch.


## 4. Update the Changelog & Contributors list

### Use the changelog tool to extract the data

{{% notice warning %}}
**This step requires special rights.**

Ask a maintainer from the PrestaShop Company with access to the Changelog Tool to perform this step.
{{% /notice %}}

After this step, you should obtain two files:

- the Changelog file – including a list of all the merged Pull Requests. Make sure to keep this file, you'll need it later.
- the New Contributors file – a list of all the people who contributed code for this version for their first time.

### Update the files in the project

- Add the contents of the changelog at the top end of PrestaShop's [Changelog file][changelog-file].
- Update PrestaShop's [Contributors file][contributors-file] by adding the new contributors. Keep the alphabetical order.
- Commit your changed files with following message: `// Changelog [version]`
- You may push this branch to your own (private) fork, if you wish to.

{{% notice tip %}}
If you're lost, see [this example][update-author-pr-example] from the 1.7.6.6 release.

[update-author-pr-example]: https://github.com/PrestaShop/PrestaShop/pull/20032
{{% /notice %}}

## 5. Build the ZIP archive

Use the [Release Creator CLI script][release-creator-readme] included with PrestaShop's sources to create the ZIP archive.

From the root path of your repository, execute:

```shell
php tools/build/CreateRelease.php --version="1.7.6.6"
```

{{% notice note %}}
Note: the version number will be the same for pre-release versions and final release versions.
{{% /notice %}}

This tool creates a build based on the state of your workspace using git archive. Therefore, files not tracked by git won't be included in the build.

**Make sure you're building from the branch you updated in the previous step.** Otherwise the package won't include the updated changelog and contributors files.

By default, the release package will create two files in a new subdirectory in `/tools/build/releases`:

- A ZIP package, containing the software.
- An XML file, containing md5 checksums for every file within the package.

{{% notice warning %}}
**Make sure to keep them both!** You will need them later on.
{{% /notice %}}

As an optional step, consider downloading the latest stable release package and compare the contents of the zip archives to look for suspicious changes.

## 6. Upload your build for archiving

### Rename files

Rename both files according to our naming convention:

```text
prestashop_<version>-[beta.<beta number>|rc.<rc number>]+build.<build number>.<zip|xml>
```

{{% callout %}}
##### Examples

* `prestashop_1.7.4.0-beta.1+build.1.zip` – First build of beta 1
* `prestashop_1.7.4.0-beta.1+build.2.zip` – Second build of beta 1
* `prestashop_1.7.4.0-beta.2+build.1.zip` – First build of beta 2
* `prestashop_1.7.4.0-rc.1+build.1.zip`  – First build of RC 1
* `prestashop_1.7.4.0+build.1.zip` – First build of final version
* `prestashop_1.7.4.0+build.2.zip` – Second build of final version

For major versions, we may build a Beta Version (example: `prestashop_1.7.4.0-beta.1+build.1.zip`).

When the beta testing phase is over, we build one Release Candidate (example: `prestashop_1.7.4.0-rc.1+build.1.zip`).

For patch versions, the beta and RC phase can be skipped (example: `prestashop_1.7.4.1+build.1.zip`)
{{% /callout %}}

### Upload files to the archive

{{% notice warning %}}
**This step requires special rights.**

Send both ZIP and XML files to a maintainer from the PrestaShop Company with access to the Archive Drive to perform this step.
{{% /notice %}}

## 7. Communicate and wait for QA validation

At this point, the build process is over. 

- Make sure the build files have been submitted to the QA team.
- **Update the Release Tracker GitHub issue**. Tick the "Build" box, and add a comment to announce that the build has been submitted to QA ([see example][example-build-comment]). 
- Wait for QA to validate the build.

### If the QA rejects the build

In case the QA team finds blocking defects in the build, then these issues _must_ be fixed and merged before the branch can be built again.

- **Communicate** that the build validation has failed by updating the Release Tracker GitHub issue. 
- **Fix the issues** or wait for them to be fixed and merged in the version branch.
- **Repeat the build process from the top**. Make sure that you have checked out the head of the updated version branch.

{{% notice tip %}}
Once the QA has greenlighted the build, you can move on to publishing the version.
{{% /notice %}}

[release-tracker-issue]: https://github.com/PrestaShop/PrestaShop/issues/19959
[changelog-file]: https://github.com/PrestaShop/PrestaShop/blob/develop/docs/CHANGELOG.txt
[contributors-file]: https://github.com/PrestaShop/PrestaShop/blob/develop/CONTRIBUTORS.md
[release-creator-readme]: https://github.com/PrestaShop/PrestaShop/blob/develop/tools/build/README.md
[example-build-comment]: https://github.com/PrestaShop/PrestaShop/issues/19959#issuecomment-651685219
