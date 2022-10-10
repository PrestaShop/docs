---
title: Patch release lifecycle
weight: 1
---

# Patch release lifecycle

Patch releases are "maintainance" releases: they provide bug fixes and security patches, but do not provide enhancements or new features. They are part of a necessary maintenance process.

## Scope of maintainance

When a minor version is released, such as PrestaShop 1.7.7.0, the related branch becomes the latest and maintained branch.
This means that, when PrestaShop 1.7.7.0 is out:

- There will be no more PrestaShop 1.7.6 patch releases, for either bug or security issues
- There might be, if necessary, patch releases for PrestaShop 1.7.7. (which means: 1.7.7.1, 1.7.7.2 and so on ...) until next minor release is delivered (PrestaShop 1.7.8)

When PrestaShop 1.7.7.0 is released, PrestaShop 1.7.6 reaches its [End Of Life](https://en.wikipedia.org/wiki/End-of-life_(product)), just like all previous minor versions.

## When is it decided to release a patch ?

A patch release is scheduled when a "trigger bug" is reported:

- A major bug in maintained branch
- A security issue in maintained branch

For example, let's see 1.7.7.0 lifecycle:

Until PrestaShop 1.7.7.0 is released, the maintained branch remains `1.7.6.x`.

This means that work on a new 1.7.6 release will start if a community contributor or the QA team reports a major regression in PrestaShop 1.7.6 or a security issue.

This means that **work on a new 1.7.6 release will start if a community contributor or the QA team reports a major regression in PrestaShop 1.7.6 or a security issue.**

If minor or trivial regressions are reported for PrestaShop 1.7.6, they are scheduled to be fixed in next minor version. Minor or trivial bugs are considered not important enough to trigger a patch release process which is, as explained below, a costly process for both the PrestaShop company and the PrestaShop community.

From the moment a "trigger bug" is reported, there start a *6 weeks long timer*. Our process states that a patch release must be delivered within these 6 weeks.

## What happens in six weeks

From the moment the 6 weeks timer is started, Product Team register into the dedicated Kanban the bugs to be fixed in the patch release, whether they are trivial, minor or major.

Then maintainers start working on fixing them (or merging the bug fixes submitted by the community).

Obviously, security issues are not processed the same way: when a vulnerability is reported, it is being explored and it is being fixed in a hidden manner in order to make sure hackers unaware of the vulnerability do not hear about it. We use [GitHub Security Advisories](https://help.github.com/en/github/managing-security-vulnerabilities/about-github-security-advisories) and temporary private forks to collaborate on the fix. Maintainers only publish the advisory and the fix on the day of the release, following [responsible disclosure](https://en.wikipedia.org/wiki/Responsible_disclosure) principle.

When all bug fixes for the target patch version are merged, and all teams pressure themselves to make it happen before the end of the 6 weeks, maintainers deliver a Release Candidate to QA team for the **standard patch release test campaign**. This test campaign aims to find whether this patch introduces new bugs.

If the campaign reports that no bugs are found, the new patch release is validated by QA team and can be delivered!


_(This article was originally published on our blog: [PrestaShop 1.7 Patch Release Lifecycle
](https://build.prestashop-project.org/news/ps17-patch-release-lifecycle/))_
