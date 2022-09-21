---
title: Describing Pull Requests
weight: 20
---

# The Pull Request form

When you create a new Pull Request, you will be presented with a form that looks like this:

![Screenshot of the New Pull Request Form](../../img/new-pull-request.png)

The first step is to write a summary of your pull request's purpose in its GitHub title. 

## Writing a good title

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

## The Pull Request form

Once you have chosen a title for your Pull Request, you are asked to fill out the Pull Request table. **Filling it out properly is mandatory**. 

Along other reasons, it helps maintainers:

- Make sure that the change works as expected
- Track when a change fixes a known issue
- Track if a change introduced affects backwards compatibility (BC breaks)
- Build the change log (changes are grouped by type and category).

Let's see what each of the rows is for.

### Branch

This part is needed to cross-check that your PR targets the branch that you intended. Just write the name of the target branch, as explained in [Supported branches]({{< ref "supported-branches" >}}).

### Description 

Describing your change and the reasoning behind it is extremely important for it to be reviewed and approved. Explain, in as much detail as you can, what did you change and why.

If you need space, just write a short summary about your change in the table, then describe in more detail below it. You are also encouraged to add links, files, screenshots... anything that can help reviewers understand why the change is needed, and why it's valid.

{{% notice tip %}}
**Tip:** If you find yourself short on inspiration, use [this Pull Request](https://github.com/PrestaShop/PrestaShop/pull/16964) as an example.
{{% /notice %}}

### Type & Category

Type is used to describe what kind of a change your Pull Request is. Refer to the following table to choose the most appropriate:

Type        | Scope
------------|------
bug fix     | The changes fix a bug.
improvement | The changes improve an already existing feature (eg. cosmetic or UX changes, performance improvement, etc). 
new feature | The changes introduce a behavior that didn't exist before (eg. add a button, a new page, a new block...)
refacto     | The changes only refactor code, without changing any of its side effects.

The category is the main part of the project affected by your changes. Choose the code that most closely describes your change:

Code | Scope
-----|------
FO   | The changes impact the Front Office
BO   | The changes impact the Back Office
IN   | The changes impact the Installer
WS   | The changes impact the Web Services
CO   | The changes impact the Core (non-visible functionality)
LO   | The changes impact localization functionality
TE   | The changes impact automated tests
ME   | The changes only import a git branch into another (eg. merge maintenance branch into develop)
PM   | The changes are related to project management (eg. edit Github pull request form)

{{% notice tip %}}
Remember, this is only needed for the Pull Request form, not for your commit messages.
{{% /notice %}} 

{{% notice note %}}
**Why is this important?**

We use type & category to group changes in the [changelog](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/docs/CHANGELOG.txt).
{{% /notice %}}

### BC breaks

It is very important to note if your change introduces backwards incompatible changes (also referred to as "backward compatiblity breaks" or "BC breaks").

Here are some examples of changes that can be considered breaking changes:

* Change any public method signature in any class (rename, change its return type or structure, remove a parameter, or change its type).
* Change any public property in any class.
* Rename, move, or delete any class or class namespace.
* Add new requirements (like dropping support for old versions of PHP or browsers, requiring new server-side libraries, etc.)
* Replace any subsystem (like updating libraries to new major versions or replacing a library with another).

{{% notice note %}}
Be aware that introducing a breaking change, even when justified, may force maintainers to reject your Pull Request.
{{% /notice %}}

### Deprecations

If your code introduces deprecations, please note them here.

### Fixed ticket

If your Pull Request resolves an existing issue, please note it using the _magic word_ "Fixes", followed by the issue number, like this: `Fixes #12314`.

{{% notice tip %}}
Using the appropriate syntax will link your Pull Request to that issue, and will automatically close it once your Pull Request is merged.
{{% /notice %}}

If no issue is linked to your Pull Request, maintainers might ask you to create one. This helps the team track what goes in a release and the status of each individual change. 

### Related PRs

If your Pull Request is linked to another contribution and they should be reviewed or tested together, please provide the other Pull Request links into this field. Examples:

* Please provide the URL of Pull Request that submit theme changes, if your PR requires modifications both in the core and a supported theme.
* Please provide the URL of Pull Request that submit changes to the Upgrade process (such as database or configuration changes), if your PR requires modifications both in the core and the upgrade process

### How to test

In addition to being code reviewed, each individual contribution is manually verified by PrestaShop's QA team. In order to effectively confirm that your change doesn't introduce new errors, please describe how to best verify that your change does what you expect it to do. Feel free to write as much details as you can outside the table if needed.

{{% notice tip %}}
**Think about tests!**

Including automated tests (unit, integration or functional) that verify your changes can significantly increase the chances that your Pull Request is accepted.
{{% /notice %}} 

### Possible impacts

PrestaShop's QA team will not only verify the right behavior of your change but also verify that other related parts of the software are still working as expected. For example modifying a CSS class can disrupt the display of all the web pages which rely on it. Please mention all the impacts you are aware of that need to be checked in order to help QA team find and verify all of them. 
