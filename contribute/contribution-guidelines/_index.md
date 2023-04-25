---
title: Contribution guidelines
weight: 20
showOnHomepage: true
---

# Contribution guidelines

The PrestaShop project receives dozens of contributions every week, and every single one of them is reviewed by project maintainers. The review process ensures that only changes that meet a certain quality standard are merged in the codebase. 

Ready to contribute code? Here are the rules you need to follow to get your Pull Request (or "PR") accepted.

{{% notice warning %}}
**The following guidelines apply to all code contributions to the project.**

Not following these rules may lead to your contribution being rejected by project maintainers.
{{% /notice %}}

## Work on a separate branch

Each time you want to work on a contribution, create a local dedicated branch based on the appropriate project branch (described below). Using separate branches for your contributions will allow you to submit multiple contributions at the same time, and update your contributions easily during the code review process.

### Choose the right base branch

Contributions should be based on the appropriate branch, depending on the nature of your change:

* **Develop**. New features, bug fixes, improvements. Contributions merged here will be released in the next minor or major release.
* **Patch version branch** (eg. 8.0.x). Only for critical bug fixes and [regression](https://en.wikipedia.org/wiki/Software_regression) fixes. Contributions merged here will be released in a patch version.

{{% notice note %}}
**Maintainers will only accept contributions to branches that are subject to new releases.**

- If you find a bug on an unsupported version, make sure that bug is still present in the latest version. 
- If the bug is still present, or if you're in doubt, please submit your Pull Request on the `develop` branch.
- Maintainers will ask you to rebase your PR on the correct branch if necessary.

For more information, see [Supported branches]({{< ref "supported-branches" >}}).
{{% /notice %}}

## Commits

- **Configure git to use your real name and email address**. This helps maintainers give you credit for your work.  
    Consider configuring your work email address, especially if you work on PrestaShop on your company's time:
    
    ```bash
    git config --global user.name "Your Name"
    git config --global user.email yourname@yourcompany.com
    ```
- **Make your commits atomic**. Ask yourself if what you are doing is one or several tasks: there should be only one complete fix or change per commit. Doing this makes it easier to review, cherry-pick and revert changes.
  - Write [meaningful commit messages]({{< ref "writing-a-good-commit-message" >}}).
  - Use [interactive staging](https://git-scm.com/book/en/v2/Git-Tools-Interactive-Staging) when you have made several changes in the same file but not all those changes are meant to be in a single commit.
  - Consider [squashing your commits](https://www.atlassian.com/git/tutorials/rewriting-history#git-rebase-i) as necessary, especially when you have performed many changes following code review.
- **Avoid merge commits in your Pull Request.** They make the commit history more difficult to understand, and they can lead to hidden changes which are not visible by reviewers. If you need to resolve conflicts with the base branch, [rebase your branch](https://anavarre.net/how-to-rebase-a-github-pull-request/) instead.

## Pull Requests

Changes submitted through your Pull Request will be reviewed by PrestaShop maintainers. 

Reviewing code is hard, takes a lot of time, and can be exhausting. Making your pull request as easy to review as possible will help in getting it accepted swiftly. 

- **Take time to describe your change.** Completing the [Pull Request Form]({{< ref "pull-requests" >}}), explaining the reasons behind your technical choices as well as any part of the code that could be tricky to understand – these simple tasks can help maintainers understand your change and be confident about accepting them.

- **Avoid submitting very large PRs when it can be avoided.** If you modified a lot of files or a very big number of lines, it is unlikely that you're addressing a single issue: please try and submit one PR for each issue you solve. This way, a problem in one change won't block other valid changes from being merged.
    
    A PR with a lot of changed lines will take a long time to review, and consequently the reviewer might miss possible issues. If your PR is too big, it may be rejected due to risk of regressions.

- **Keep an eye on your PRs.** The longer it takes to merge a PR, the more it is likely that it will be blocked by merge conflicts. Whenever a Pull Request is rebased, it has to be reviewed again, thus increasing the time to merge, thus increasing the risk of conflicts...

{{% notice tip %}}
**Tip:** smaller, tested, and well-described changes are easier to review, easier to verify and easier to merge.
{{% /notice %}}

## Third party dependencies

Adding third party software in the core or in a module can sometimes be faster and easier than developing it from scratch and then maintaining it. PrestaShop uses composer and NPM to manage such dependencies.

Before proposing to add a new dependency, make sure you do this:

- **Discuss with project maintainers**. Explain why do you want to add this dependency and how it will help solve the project.

- **Consider the dependency's stability**. Recently created libraries may have not yet reached maturity and may have errors or introduce breaking changes regularly.

- **Consider the dependency's support**. If the dependency is maintained by a single person or lacks contributors, bugs may take a long time to be fixed. Similarly, the lower the number of people working on a project, the higher the risk of it getting abandoned.

- **Consider the dependency's license**. Dependencies included in PrestaShop must be compatible with PrestaShop's license. [Here's a list][compatible-licenses].


## Related topics

- [What happens after you submit a contribution]({{< relref "/8/contribute/contribution-process/how-pull-requests-are-processed" >}})

## Read more

{{% children /%}}

[how-to-compile-assets]: {{% relref "/8/development/compile-assets.md" %}}
[compatible-licenses]: {{% relref "compatible-licenses" %}}
