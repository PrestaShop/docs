This repository contains the developer documentation sources.

# Reviewers

In this repository, we have primary and regular reviewers.

Primary reviewers are the people who mostly shape and structure this repository. Although it's not mandatory, it's highly recommended that at least one of them review and approve a Pull Request before it can be merged.

Primary reviewers are:
- @kpodemski
- @thomasnares

As regular reviewers, any committer on the organization can review submitted Pull Requests.

### Examples

PR [#1631](https://github.com/PrestaShop/docs/pull/1631) was approved and merged by primary reviewer @kpodemski.

PR [#1639](https://github.com/PrestaShop/docs/pull/1639) was not approved by primary reviewers as it was a simple 3-line fix. Two committers approved it and merged it.

# Pull Request workflow

## Steps

Pull Requests can be made against different branches. One branch contains the sources for a given PrestaShop version:
- branch `1.7.x` contains the sources for PrestaShop 1.7 developer documentation
- branch `8.x` contains the sources for PrestaShop 8 developer documentation

Pull Requests only need to be reviewed. There is no need to test by QA or any other manual tests unless it introduces a complex change, such as a new Hugo markdown. In this situation, reviewers should checkout the branch and verify it behaves as expected.

After a Pull Request has been approved it can be merged.

## After the merge

There is no need to milestone merged Pull Requests, however, if the merger believes the change should be backported on other branches, he can kindly ask the author to do it and add the label 'Needs backport'.

When the Pull Request to backport the change to another branch is submitted and merged, the label 'Needs backport' should be replaced by 'Backported'.