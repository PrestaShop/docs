---
title: Reviewing Pull Requests
weight: 30
---

# Reviewing Pull Requests

The code review process is generally regarded as a good practice and is adopted by hundreds of software projects around the world. 

It provides lot of benefits:

- **it helps spotting errors in the code**, because we all make mistakes and it can be hard to find one's own mistakes.
- **it helps improving code quality** not only by ensuring it's readable and understandable, but also by pinpointing design, performance or security issues that may have been unintentionally introduced by the author.
- **it helps spread knowledge of the code base**, because the reviewer will learn how your code works too.

{{% notice tip %}}
Reviewing is a discussion, not a to-do list. The main goal is to find the best solution by sharing different points of view.
{{% /notice %}}

## Approving Pull Requests

Maintainers are responsible for the Pull Requests they approve. The main objective of this process is to make sure that the change being reviewed does not produce undesired side effects and that it's inclusion is coherent with the project's objectives.

Here are the rules for approving a Pull Request:

1. The change must follow the [contribution guidelines][contribution-guidelines], including:
    - Coding standards
    - License & license headers
    - Proper description
2. The change must not introduce evident regressions (including breaking changes) nor substantially increase entropy, unless it's properly justified.
3. The change must provide enough value to be worth merging.

{{% notice note %}}
Fulfilling the above requirements does not automatically imply that such a contribution must be accepted.  
Conversely, non-compliant contributions **should not** be accepted.  
{{% /notice %}}

### Collaborate with other teams

Pull Requests introduce into the codebase many kinds of changes.

**Some Pull Requests do fix bugs.** Sometimes the fix is done in a simple way, and the review is easy, sometimes the solution is more complex, and the reviewer must evaluate whether the submitted solution is good or if a better (simpler?) is desirable. It is recommended in such cases to ask for the opinion of other maintainers.

**Some Pull Requests do introduce new behavior changes** (a new button, a new Back-Office page, a new feature...) . If the change is impactful, such Pull Requests cannot be merged without the **Product Team** approval. It can be asked by marking the Pull Request and/or the related Issue with label "Waiting for PM" and Product Team will mark validated changes with label "PM ✓".

**Some Pull Requests do introduce new UX changes** (changing a layout, modifying a color...) . If the change is impactful, such Pull Requests cannot be merged without the **UX Team** approval. It can be asked by marking the Pull Request and/or the related Issue with label "Waiting for UX" and UX Team will mark validated changes with label "UX ✓".

**Some Pull Requests do introduce new wording changes**. Usually, [Prestonbot][prestonbot] will detect such Pull Requests and automatically add the "Waiting for wording" label. The Wording Team will review the Pull Request and work with the author until it is valid. At this moment the Pull Request is labelled "Wording ✓". Without this label, such Pull Requests cannot be merged.

**Some Pull Requests do introduce new technical changes** (a new dependency, a new extensibility mechanism)... If the change is impactful, it is recommended for Pull Requests to ask for the opinion of multiple maintainers. For changes that are important, a [Voting phase][adr] might be needed.

All these Teams can be reached out on the [Slack][slack] channel.

### Discussing with author

During review, maintainers can ask questions to the Pull Request author (for example to better understand a technical choice). Simply writing the question as a comment is enough.

When doing so, it is recommended to add the label "Waiting for author" on the Pull Request. This helps other maintainers to know this Pull Request state.

### Bots helping maintainers

There are multiple bots that monitor the Issues and Pull Requests on GitHub.

[Prestonbot][prestonbot] will try to add relevant informations on new Pull Requests and evaluate whether there are missing/invalid items. Following the Pull Request template, Prestonbot will add labels on the Pull Requests.

### Lists of red flags

Here is a list of things that should not be approved in a Pull Request

- Anti-patterns or code that clearly violates software development best practices such as [SOLID][solid] principles.
- Code that does not comply with current PrestaShop architecture, unless for good reasons (example: some View logic inside the Model layer).
- Code that scales poorly and/or performs poorly.
- Code that is very hard to read and consequently less maintainable.
- Code that ignores one standard PrestaShop usecase (example: logic that only makes sense for EU rules or USA rules).
- Code that ignores part of PrestaShop user audience (example: CSS that is not [RTL][rtl]-compliant).
- Code that is not secure.

More details available [here][pull-request-process].

#### About [BC breaks][bc-break]

Since PrestaShop follows [SemVer][semver], we should not accept Pull Requests introducing Breaking Changes unless they will be delivered in a new Major version.

Exceptions to this rule can however be made, for good reasons only such as:
- Security issue that cannot be fixed in a backward compatible manner
- Architecture/Design issue that cannot be fixed in an efficient and backward compatible manner
- Expected and announced beforehand change such as migrating a legacy page into a Symfony page

### Maintainers are gatekeepers

Approving a Pull Request is actually a meaningful act. It carries multiple messages:

**1. The submitted code is correct and its quality meets our expectations.**

This is obviously a requirement for the Pull Request to be approved.

**2. The outcome of this Pull Request is desirable.**

Some Pull Requests are correct but are not merged because they do not benefit the project. For example a Pull Request that enables the support of XCF format for images is likely to be rejected as this image format is very rarely used in eCommerce.

**3. We accept to introduce this new code into our scope.**

Code that is merged inside the project becomes part of its scope. It means the maintainers team agree to maintain, manage, test, document and update this code as if it was their own.

Part of the Pull Request might also be integrated into PrestaShop public API which must evolve in a backward compatible manner to comply with [SemVer][semver]. This means that once that it is released, it is quite frozen and must be preserved.

## Merging Pull Requests

A Pull Request may only be merged after the following requirements have been fulfilled:

- The change must not have any outstanding merge conflicts.
- The change has been approved by at least one maintainer (two maintainers for the [PrestaShop Core repository][prestashop-core-repository]).
- Automated checks (including automated tests) are passing.
- The change has been approved by the QA team using the "QA ✓" label, unless there's a general agreement that the change is not testable by QA.

### Marking merged Pull Requests

When merging a Pull Request on the Core Repository, maintainer must do the following, if it has not been done by someone else:

- Link the Pull Request to the right milestone. The milestone to choose is the next target release.
- Add the label "Key feature" if the Pull Request must be mentioned in the Release Note.
- Add the label "BC break" if the Pull Request introduces a [BC Break][bc-break].

The items above are very important as they will be key to writing a good Release Note and ChangeLog for the next version.

It is also recommended to :

- Thank the Pull Request author and anybody else who invested notable energy into the Pull Request (code review, code suggestions, QA validation, usecase specification ...).
- If the Pull Request is related to an issue, check whether the issue is fixed and closed (it might be done automatically depending on the Pull Request) and whether it should be.

## Stale Pull Requests

Pull Requests may be closed after 30 days of inactivity following a request for modifications.

[contribution-guidelines]: {{< ref "/1.7/contribute/contribution-guidelines/_index.md" >}}
[prestashop-core-repository]: https://github.com/PrestaShop/PrestaShop/
[bc-break]: https://stackoverflow.com/questions/8891005/what-does-bc-break-mean
[slack]: {{< param ProjectUrls.Slack >}}
[adr]: https://github.com/prestashop/ADR
[prestonbot]: {{< ref "/1.7/contribute/contribution-process/how-pull-requests-are-processed.md" >}}
[solid]: https://en.wikipedia.org/wiki/SOLID
[RTL]: {{< ref "/1.7/themes/reference/rtl.md" >}}
[pull-request-process]: {{< ref "/1.7/contribute/contribution-process/how-pull-requests-are-processed.md" >}}
[semver]: https://semver.org/
