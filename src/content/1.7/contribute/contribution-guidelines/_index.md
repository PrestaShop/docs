---
title: Contribution guidelines
weight: 20
aliases:
  - /1.7/development/coding_standards/commits_and_pull_requests
  - /1.7/development/coding-standards/commits-and-pull-requests
---

# Contribution guidelines

Ready to contribute code? Here's what you need to know to get your Pull Request accepted.

The PrestaShop project receives dozens of contributions every week, and every single one of them is reviewed by project maintainers. The review process ensures that only changes that meet a certain quality standard are merged in the codebase. 

{{% notice warning %}}
**The following guidelines apply to all code contributions to the project.**

Not following these rules may lead to your contribution being rejected by project maintainers.
{{% /notice %}}

## Work on a separate branch

Each time you want to work on a contribution, create a local dedicated branch based on the appropriate project branch (described below). Using separate branches for your contributions will allow you to submit multiple contributions at the same time, and update your contributions easily during the code review process.

### Choosing the right base branch

Contributions may be made to the appropriate branch, depending on the nature of your change:

* **Develop**. New features, bug fixes, improvements. Contributions merged here will be released in the next minor or major version.
* **Patch version branch** (eg. 1.7.4.x). For critical bug fixes and regressions only. Contributions merged here will be released in a patch version. 

{{% callout %}}
##### About supported branches

PrestaShop only accepts contributions on branches which are subject to new releases.

Once a minor "dot-zero" version has been released, no new patch releases will be made for previous versions. This means that only the latest minor version patch branch is supported – with the exception of rare cases, like a security bug being found just before or after a minor release is published.

For example, the `1.7.4.x` branch is supported until version 1.7.5.0 is released. After that, the only supported version branch will be `1.7.5.x`, and so on.

If you find a bug on an unsupported version, make sure that bug is still present in the latest version. If the bug is still present, please submit a Pull Request on `develop`.

**Pull Requests for unsupported versions will be closed.**

{{% notice tip %}}
When in doubt, use the develop branch. We will ask you to rebase on the correct branch if necessary.
{{% /notice %}}
{{% /callout %}}

## Commits

Make **atomic commits**, meaning that each commit's purpose should be **one, and only one, complete fix or change**. Typically, ask yourself if what you are doing is one or several tasks. 

Atomic commits make review easier, and it also helps for cherry-picking or reverting changes (we hope to never have to do that 😉).

{{% notice tip %}}
Do not hesitate to use [interactive staging](https://git-scm.com/book/en/v2/Git-Tools-Interactive-Staging) if you have made several changes in the same file but not all those changes are meant to be in a single commit.
{{% /notice %}}

{{% callout %}}

### Writing a good commit message

The commit name should give an idea of the nature and context of the change that has been done. The more details, the better! The commit name should be as unique and recognizable as your commit itself. There are multitude of articles on the web regarding commit messages, here are two that you can find useful: [How to Write a Git Commit Message](https://chris.beams.io/posts/git-commit/) and [What makes a good commit message?](https://hackernoon.com/what-makes-a-good-commit-message-995d23687ad).

Bad commit messages give pretty much no context:

- `add cli new`
- `fix useless code`
- `fix code review comments`

A good commit message explains _what_ is done, and _why_. Here's an example: 

```text
Make Source.indexOf(ByteString) significantly faster

Previously the algorithm that did this was extremely inefficient, and
had worst case runtime of O(N * S * S) for N is size of the bytestring
and S is the number of segments.

The new code runs in O(N * S). It accomplishes this by not starting
each search at the first segment, which could occur many times when
called by RealBufferedSource.
```

Some tips:

- Separate subject from body with a blank line
- Limit the subject line to 50 characters
- Capitalize the subject line
- Use the body to explain _what_ and _why_ vs. _how_
{{% /callout %}}

## Compiled assets

Some source files like SCSS and JavaScript need to be compiled to work on a PrestaShop shop. To ease up the life of contributors who don't want to fuzz around installing node and NPM, we require those files to be compiled and committed in the same Pull Request as the source changes.

{{% notice note %}}
Assets no longer need to be compiled in the develop branch. More information in [this article](https://build.prestashop.com/news/open-question-not-commiting-assets-anymore/).
{{% /notice %}}

Make sure to follow these guidelines:

- **Compile assets for production.** Check that that the assets you are compiled were built using the "prod" setting instead of the "dev" one. To find out more, read [How to compile assets][how-to-compile-assets].
- **Commit assets and sources separately.** Submit your compiled assets in a separate commit from your source changes. This will be especially helpful when rebasing, because you can just drop the commit and avoid merge conflicts.
- **One asset commit per Pull Request**. Try to avoid recompiling and committing the assets more than once. If you need to make changes and you have already committed a previous build, use interactive rebase to remove the previous commit, _then_ compile the assets. 


## Pull Requests

Changes submitted through your Pull Request will be reviewed by PrestaShop maintainers. The code review process is generally regarded as a good practice and adopted by hundreds of software projects around the world. It provides lot of benefits:

- **it helps spotting errors in the code**, because we all make mistakes and it's very hard to find one's own mistakes.
- **it helps improving code quality** not only by ensuring it's readable and understandable, but also by pinpointing design, performance or security issues that may have been unintentionally introduced by the author.
- **it helps spread knowledge of the code base**, because the reviewer will learn how your code works too.

And don't forget that reviewing is a discussion, not a to-do list: the goal is to find the best solution by sharing different points of view.

However, reviewing code is hard and can be exhausting. Making your pull request as easy to review as possible will help in getting it accepted swiftly. Completing the pull request form (explained below) properly, explaining the reasons behind some of your technical choices as well as any part of the code that could be tricky to understand... those are some examples of things that you can do to help ease up the process.

**Avoid submitting very large PRs** when it can be avoided.

- If you modified a lot of files or a very big number of lines, it is unlikely that you're addressing a single issue: please try and submit one PR for each issue you solve. This way, a problem in one change won't block other valid changes from being merged.
- A PR with a lot of changed lines will take a long time to review, and consequently the reviewer might miss possible issues. If your PR is too big, it may be rejected due to risk of regressions.
- The longer it takes to merge a PR, the more it is likely that it will be blocked by merge conflicts. Whenever a Pull Request is rebased, it has to be reviewed again, thus increasing the time to merge, thus increasing the risk of conflicts...

Remember: **smaller changes are easier to review, easier to test and easier to merge.**

### The Pull Request form

When you create a new Pull Request, you will be presented with a form that looks like this:

(click on it to see full size)

![Screenshot of the New Pull Request Form](../img/new-pull-request.png)

The first step is to write a summary of your pull request's purpose in its GitHub title. 

{{% callout %}} 
#### Writing a good Pull Request title

A Pull Request title should be short, but precise enough to describe the changes it introduces and how they impact the software.

Please respect the following rules:

* **Be descriptive**. Avoid laconic or non-descriptive sentences, like _"Fix bug"_ or _"Update file.php"_.
* **Write full sentences**. Avoid writing sentences without verbs, like _"Yaml standards"_. 
* **Use the imperative mood** (eg. _"Add foo bar"_ instead of _"Added..."_ or _"Adding"_). This will help keep changelog style coherent. 
* **Don't include references.** Don't add issue references like _"#12314 Fix issue on..."_ or tags like _"[BO] Fix bug where..."_. The PR table is there for that.

Here are some good examples:

* Fix fatal error when trying to sign up on Chrome
* Prevent users from deleting their own profile on the users listing
* Reduce memory usage on the Front Office home
* Add button to close the welcome message on first login
* Migrate product page to Symfony 

{{% notice note %}}
**Why this is important?**

Pull Requests titles are used to build the Changelog we publish on each release. [Here's an example](https://github.com/PrestaShop/PrestaShop/releases/tag/1.7.6.1).
{{% /notice %}}
{{% /callout %}}

Once you have chosen a title for your Pull Request, you are asked to fill out the Pull Request table. **Filling it out properly is mandatory**. 

Along other reasons, it helps maintainers:

- Make sure that the change works as expected
- Track when a change fixes a known issue
- Track if a change introduced affects backwards compatibility (BC breaks)
- Build the change log (changes are grouped by type and category).

Let's see what each of the rows is for.

#### Branch

This part is needed to cross-check that your PR targets the branch that you intended. Just write the name of the target branch, as explained above in [Choosing the right base branch](#choosing-the-right-base-branch).

#### Description 

Describing your change and the reasoning behind it is extremely important for it to be reviewed and approved. Explain, in as much detail as you can, what did you change and why.

If you need space, just write a short summary about your change in the table, then describe in more detail below it. You are also encouraged to add links, files, screenshots... anything that can help reviewers understand why the change is needed, and why it's valid.

Use [this Pull Request](https://github.com/PrestaShop/PrestaShop/pull/16964) as an example if you find yourself short on inspiration.

#### Type & Category

Type is used to describe what kind of a change your Pull Request is. Refer to the following table to choose the most appropriate:

Type | Scope
-----|------
bug fix | The changes fix a bug.
improvement | The changes improve an already existing feature (eg. cosmetic or UX changes, performance improvement, etc). 
new feature | The changes introduce a functionality that didn't exist before (eg. add a button, a new page, a new block...)
refacto | The changes only refactor code, without changing any of its side effects.

The category is the portion of the project to which your changes apply to. We use this code alongside with the type to construct the [changelog](https://github.com/PrestaShop/PrestaShop/blob/develop/docs/CHANGELOG.txt) by grouping changes in different sections. Choose the code that most closely describes your change:

Code | Scope
-----|------
FO | The changes impact the Front Office
BO | The changes impact the Back Office
IN | The changes impact the Installer
WS | The changes impact the Web Services
CO | The changes impact the Core (non-visible functionality)
LO | The changes impact localization functionality
TE | The changes impact automated tests
ME | The changes only import a git branch into another (eg. merge maintenance branch into develop)
PM | The changes are related to project management (eg. edit Github pull request form)

{{% notice note %}}
Remember, this is only needed for the Pull Request form, not for your commit messages.
{{% /notice %}} 

#### BC breaks

It is very important to note if your change introduces backwards incompatible changes ("backward compatiblity breaks").

Here are some examples of changes that can be considered breaking changes:

* Change any public method signature in any class (rename, change its return type or structure, remove a parameter, or change its type).
* Change any public property in any class.
* Rename, move, or delete any class or class namespace.
* Add new requirements (like dropping support for old versions of PHP or browsers, requiring new server-side libraries, etc.)
* Replace any subsystem (like updating libraries to new major versions or replacing a library with another).

{{% notice note %}}
Be aware that introducing a breaking change, even when justified, may force maintainers to refuse your Pull Request.
{{% /notice %}}

#### Deprecations

If your code introduces deprecations, please note them here.

#### Fixed ticket

If your Pull Request resolves an existing issue, please note it using the _magic word_ "Fixes", followed by the issue number, like this: `Fixes #12314`.

{{% notice tip %}}
Using the appropriate syntax will link your Pull Request to that issue, and will automatically close it once your Pull Request is merged.
{{% /notice %}}

If no issue is linked to your Pull Request, maintainers might ask you to create one. This helps the team track what goes in a release and the status of each individual change. 

#### How to test

In addition to being code reviewed, each individual contribution is manually verified by PrestaShop's QA team. In order to effectively confirm that your change doesn't introduce new errors, please describe how to best verify that your change does what you expect it to do. Feel free to write as much details as you can outside the table if needed.

{{% notice tip %}}
Including automated tests (be it unit, integration or functional), can go a long way in having your Pull Request accepted.
{{% /notice %}} 

## Dependencies

Adding third party software in the core or in a module might sometimes be faster and easier than to develop it from scratch and then to maintain it. Composer and NPM are used to manage such dependencies in the PrestaShop open source project.

It is possible to add new dependencies, after a careful selection and study. A few rules must be followed.

### Licenses

The first step is to check the **legal compliance** of a third party software. The PrestaShop open source project being written and distributed under the OSL license, aggregated dependencies must be compatible with it. 

Below is a list of the known compatible licenses that can accepted for software:

- MIT
- ISC
- BSD
- AFL
- EUPL
- Apache
- CC-O
- Unlicense

Additionally, artwork (e.g: icons, pictures, fonts, but not only) is usually distributed with specific licenses. Below is a list of known compatible licenses that can be accepted for artwork:

- CC-0
- CC-by-sa
- CC-by
- Art Libre
- Artistic
- Unlicense

In general, public domain is not acceptable, as it doesn't exist in all juridictions or countries.

If the proposed dependency is available with a compliant license, a last check is done to be sure that there is no additional clause that would introduce a restriction of use.

If the legal compliance is confirmed, it will be possible to go the next step: the technical review.


## Read more

- [What happens after you submit a contribution]({{< ref "1.7/contribute/contribution-process/how-pull-requests-are-processed.md" >}})
{{% children /%}}


[how-to-compile-assets]: {{% ref "1.7/development/compile-assets.md" %}}
