---
title: Supported branches
weight: 30
---

# Supported branches

Maintainers will only accept contributions for branches which are subject to new releases.

The **development branch** (`develop`) contains the development code for the next minor or major version, and is the natural destination for all contributions.

The **patch version branch** (e.g. `8.0.x`) contains the code for the next patch release for a given version. This is where some bug fixes are destined, under specific conditions.

{{% notice tip %}}
**TL;DR**
When in doubt, target the `develop` branch. We will ask you to rebase on the correct branch if necessary.
{{% /notice %}}


## Understanding active & closed branches

The `develop` branch is always active and open to contributions.

Each minor version has its own patch branch: patches for the 8.0 version go in the `8.0.x` branch, while patches for 8.1 go in `8.1.x`... and so on. 

These branches are created and closed following the support window of each version. Once the support for a version is over and no new patch releases are expected for it, its corresponding branch becomes closed to contribution. 

Except for rare cases, a patch version branch is closed the moment the following minor version is released. For example, the `8.0.x` branch is closed once the 8.1 version has been released, giving way to the `8.1.x` branch. 

**Pull Requests targeting closed branches will not be accepted.**

## Bug fixes and patch branches

Patch branches usually only accept critical bug fixes, like security bugs, and **same-version regression** fixes. 

Regressions are bugs that break a feature that was previously working well. If a feature was working well in 8.0 and is broken by a bug introduced in 8.1, then the bug is a regression introduced in 8.1 and should be fixed in the `8.1.x` branch—as long as that branch is open.

If you intend to submit a fix for a regression introduced in a version that no longer receives patches, make sure that bug is still present in the `develop` branch. If the bug is still present, please submit a Pull Request on `develop`.

