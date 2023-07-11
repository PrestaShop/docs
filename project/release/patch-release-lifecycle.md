---
title: Patch release lifecycle
weight: 1
---

# Patch release lifecycle

Patch releases are "maintainance" releases: they provide bug fixes and security patches, but do not provide enhancements or new features, unless project members decide otherwise (for example: if one wants to introduce a new hook which helps avoiding using overrides). They are part of a necessary maintenance process.

## Scope of maintainance

When a minor version is released, such as PrestaShop 8.1, the related branch becomes the latest and maintained branch.
This means that, when PrestaShop 8.1 is out:

- There will be no more PrestaShop 8.0 patch releases, for either bug or security issues, unless the Leadership Council decides otherwise. For instance, if there is a critical security issue in PrestaShop 8.0 which is easily exploitable, the Leadership Council might decide to deliver a patch release for PrestaShop 8.0.
- There might be, if necessary, patch releases for PrestaShop 8.1. (which means: 8.1.1, 8.1.2 and so on ...). These patch releases will be delivered until the next major version is released.

When PrestaShop 8.1 is released, PrestaShop 8.0 reaches its [End Of Life](https://en.wikipedia.org/wiki/End-of-life_(product)).

## When is it decided to release a patch?

Patch versions, if needed, are delivered between every 6 to 8 weeks after the minor version is released. Whether a patch release is needed or not is decided by the Product Council, based on the following criteria:

- A major bug in maintained branch
- A security issue in maintained branch
- Number of minor bugs in maintained branch which are considered important enough to be fixed in a patch release

From the moment a "trigger bug" is reported, there start a *6 weeks long timer*. Our process states that a patch release must be delivered within these 6 weeks.

Starting with version 8.1 of PrestaShop, we accept non-regression bugs in patch releases. This means that, if a bug is reported in a patch release, even if it is not considered as a regression (a bug that was present in the previous version), it can be fixed in the patch release if the Product Council decides so.

## What happens in six weeks

From the moment the 6 weeks timer is started, Product Team register into the dedicated Kanban the bugs to be fixed in the patch release, whether they are trivial, minor or major.

Then project members start working on fixing them (or merging the bug fixes submitted by the community).

Obviously, security issues are not processed the same way: when a vulnerability is reported, it is being explored and it is being fixed in a hidden manner in order to make sure hackers unaware of the vulnerability do not hear about it. We use [GitHub Security Advisories](https://help.github.com/en/github/managing-security-vulnerabilities/about-github-security-advisories) and temporary private forks to collaborate on the fix. Project members only publish the advisory and the fix on the day of the release, following [responsible disclosure](https://en.wikipedia.org/wiki/Responsible_disclosure) principle.

When all bug fixes for the target patch version are merged, and all teams pressure themselves to make it happen before the end of the 6 weeks, a Release Candidate is delivered to QA team for the **standard patch release test campaign**. This test campaign aims to find whether this patch introduces new bugs.

If the campaign reports that no bugs are found, the new patch release is validated by QA team and can be delivered!
