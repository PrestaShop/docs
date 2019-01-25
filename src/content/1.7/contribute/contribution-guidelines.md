---
title: Contribution guidelines
weight: 10
aliases:
  - /1.7/development/coding_standards/commits_and_pull_requests
  - /1.7/development/coding-standards/commits-and-pull-requests
---

# Contribution guidelines

Ready to contribute code? Here's what you need to know to get your Pull Request accepted.

## Commits

### Atomic commits

In the past, we used to have only one commit by pull request. This was a bad habit. We now require contributors to make **atomic commits**, so you will surely have more than one commit in a single pull request. This will be helpful to review, cherry-pick or revert changes (we hope to never have to do that 😉).

**What's an atomic commit?** It means that the commit's purpose is **one, and only one, complete fix or change**. Typically, ask yourself if what you are doing is one or several tasks. Do not hesitate to use `git add -p ...` ([details here](https://git-scm.com/book/en/v2/Git-Tools-Interactive-Staging)) if you have made several changes in the same file but not all those changes are meant to be in the current commit.

### Writing a good commit message

{{% notice note %}}
In the past, we used to ask to prepend commit names with *FO, BO, CO...* <br>
**This is no longer needed.**
{{% /notice %}}

The commit name should give an idea of the nature and context of the change that has been done. The more details, the better! The commit name should be as unique and recognizable as your commit itself. There are multitude of articles on the web regarding commit messages, here are two that you can find useful:

- [How to Write a Git Commit Message](https://chris.beams.io/posts/git-commit/)
- [What makes a good commit message?](https://hackernoon.com/what-makes-a-good-commit-message-995d23687ad)

#### Bad examples

Bad commit messages give pretty much no context:

- `add cli new`
- `fix useless code`
- `fix code review comments`

#### Good example

A good commit message explains _what_ is done, and _why_: 
```text
Make Source.indexOf(ByteString) significantly faster

Previously the algorithm that did this was extremely inefficient, and
had worst case runtime of O(N * S * S) for N is size of the bytestring
and S is the number of segments.

The new code runs in O(N * S). It accomplishes this by not starting
each search at the first segment, which could occur many times when
called by RealBufferedSource.
```

{{% notice tip %}}
Some tips:

- Separate subject from body with a blank line
- Limit the subject line to 50 characters
- Capitalize the subject line
- Use the body to explain _what_ and _why_ vs. _how_
{{% /notice %}}

### Compiled assets

Some source files like SCSS and JavaScript need to be compiled to work on a PrestaShop shop. To ease up the life of contributors who don't want to fuzz around installing node and NPM, we require those files to be compiled and committed in the same Pull Request as the source changes.

Make sure to follow these guidelines:

- **Compile assets for production.** Check that that the assets you are compiled were built using the "prod" setting instead of the "dev" one. To find out more, read [How to compile assets][how-to-compile-assets].
- **Commit assets assets and sources separately.** Submit your compiled assets in a separate commit from your source changes. This will be especially helpful when rebasing, because you can just drop the commit and avoid merge conflicts.
- **One asset commit per Pull Request**. Try to avoid recompiling and committing the assets more than once. If you need to make changes and you have already committed a previous build, use interactive rebase to remove the previous commit, _then_ compile the assets. 


## Pull Requests

Now that you have made atomic commits, you surely have a lot of commits for one pull request.
 
**A pull request should answer to a single given issue**. Do not ever make a single pull request for many purposes. Do not hesitate to split your big commit into several subprojects. It will be easier and quicker to review.

As all your commits messages are well-formatted, just make a summary of your pull request’s purpose in its GitHub title. A summary does not mean it can not be explicit. Please describe what your pull request does in detail (avoid "Fix product page" or "Category page improvement"). Then, just fill the PR template table to answer some questions which will help the team make a decision faster.

Please note that all the pull requests must follow those guidelines. If the commit messages are not well-formatted, the pull request's title is not correct, or the table is not properly filled, we will not be able to accept your pull request.

### Pull requests requirements

Code submitted through your Pull Request will be reviewed by PrestaShop maintainers. The code review process is generally regarded as a good practice and adopted by hundreds of software projects around the world. It provides lot of benefits:
- it helps spotting errors in the code, because we all make mistakes and it's very hard to find one's own mistakes
- it helps improving code quality not only by ensuring it's readable and understandable, but also by pinpointing design, performance or security issues that may have been unintentionally introduced by the author
- it helps spread knowledge of the code base, because the reviewer will learn how your code works too
- and don't forget that reviewing is a discussion, not a to-do list: the goal is to find the best solution by sharing different opinions

However, reviewing code is hard and can be exhausting. Making your pull request as easy as possible to review will help in getting it accepted swiftly. Completing the pull request form (explained below), properly explaining the reasons behind some of your technical choices, as well as any part of the code that could be tricky to understand... those are some examples of things that you can do to help ease up the process.

Also, please avoid submitting very large PRs when it can be avoided.

- If you modified a lot of files or a very big number of lines, it is unlikely that you're addressing a single issue: please try and submit one PR for each issue you solve. This way, a problem in one change won't block other valid changes from being merged.
- A PR with a lot of changed lines will take a long time to review, and consequently the reviewer might miss possible issues. If your PR is too big, it may be rejected due to risk of regressions.
- The longer it takes to merge a PR, the more it is likely that it will be blocked by merge conflicts. Whenever a Pull Request is rebased, it has to be reviewed again, thus increasing the time to merge, thus increasing the risk of conflicts...

Remember: smaller changes are easier to review, easier to test and easier to merge.

### The Pull Request form

When you create a new Pull Request, you will be presented with a form to complete that looks like this:

![Screenshot of the New Pull Request Form](../img/new-pull-request.png)

It is very important that you complete this table correctly, as it is vital for:

- Making sure the branch is correct
- Understanding your change
- Making sure that it works as expected
- Tracking when a PR fixes a known issue
- Tracking if a release breaks retro-compatibility
- Building the change log

#### Target branch

Pull requests must be made in the appropriate branch, depending on the nature of your change.

* **Develop**. New features, bug fixes, improvements. PRs merged here will be released in the next minor or major version.
* **Patch version branch** (eg. 1.7.4.x). For critical bug fixes and regressions only. PRs merged here will be released in a patch version. 
* **1.6.1.x branch**. For PrestaShop 1.6 bug fixes only. 

{{% callout %}}

##### About supported branches

PrestaShop only accepts PRs on branches which are subject to new releases.

Once PrestaShop releases a new minor ("dot-zero") version, it won't release new patch versions for previous minor versions – with the exception of rare cases, for example if a security bug is found just before or after a minor release is published.

This means that except for `1.6.1.x` (on extended support), only the latest minor version patch branch is supported.

For example, the `1.7.4.x` branch is supported until the release of version 1.7.5.0. After that, the only supported version branch will be `1.7.5.x`, and so on.

If you find a bug on an unsupported version, make sure that bug is still present in the latest version. If the bug is still present, please submit a PR on `develop`.

**PRs on unsupported versions will be closed.**

{{% notice tip %}}
When in doubt, use the develop branch. We will ask you to rebase on the correct branch if necessary.
{{% /notice %}}
{{% /callout %}}

#### Category

The category is the portion of the project to which your changes apply to. We use this code to construct the [change log](https://github.com/PrestaShop/PrestaShop/blob/develop/docs/CHANGELOG.txt) by grouping changes in different sections. Choose the code that most closely describes your change:

Code | Scope
-----|------
FO | if the changes impact the Front Office
BO | if the changes impact the Back Office
IN | if the changes impact the Installer
WS | if the changes impact the Web Services
CO | if the changes impact the Core (non-visible functionality)
LO | if the changes impact localization functionality
TE | if the changes impact automated tests

{{% notice note %}}
Remember, this is only needed for the Pull Request form, not for your commit messages.
{{% /notice %}} 

[how-to-compile-assets]: {{% ref "1.7/development/compile-assets.md" %}}
