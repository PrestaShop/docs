---
title: How to become a maintainer
---

# How to become a maintainer

In the PrestaShop project, maintainers are contributors with merge rights. 

The maintainer status is a position of great power, but it also carries great responsibility.
As gatekeepers to the project's code, maintainers are ultimately responsible for every contribution that is included in the project. 


## Requirements to become a maintainer

1. **Active participation in the project**
    - Display a record of several accepted, quality Pull Requests having received little or no objections from maintainers.
    - Display a record of participation in several issues and/or in technical discussions (e.g. Pull Request reviews).
    - Be active in the project’s [Slack][slack] chat.
    - Real interest in getting involved.
2. **Demonstrate a good level of technical knowledge**
    - Justify a good level of technical skills (SOLID, readable, well-documented, stable, testable code) – in discussions and in code contributions.
    - Display a good understanding of the project, its architecture, its ecosystem, its constraints (transparency, license, backwards compatibility, dependencies, expected behavior...)
    - Be competent with git and the GitHub workflow (use a fork, be able to rebase, be able to fetch and update a remote branch...)
3. **Cultural convergence**
    - Respect the Code of Conduct; behave respectfully and in good faith.
    - Agree to work together with the rest of the maintainer team towards main goals (see [The Future Architecture][future-architecture]): migration to Symfony, adoption of VueJS ...

## Requirements to continue being a maintainer

All the above, plus:

1. **Continuous participation and involvement**
    - Actively and responsibly review Pull Requests.
    - Engage and participate in technical discussions with maintainers and the community on Slack.
    - Mentor new contributors.
2. **Responsible behavior**
    - Respect & enforce the project’s quality standards and contribution guidelines.
    - Respect & enforce the project’s issue and code review workflow.
    - Respect & enforce the project’s release lifecycle (feature freeze, RC, minor and patch release scope, module releases...)
    - Respect & enforce convergence with the project’s goals.
    - Put the best interest of the project before one’s own (in case of conflict of interests).

## How to apply to be a maintainer

1. [Open an issue on the open source repository](https://github.com/PrestaShop/open-source/issues/new) explaining why you apply to become a maintainer, and on what part of the project (Core or module/subproject).
2. Discuss with current maintainers on this issue; particularly, this will be the time for maintainers to analyze the candidate’s motivation and skills on the different parts of the project that they applied for.
3. Once all questions have been answered, current maintainers vote.
4. If the qualified majority of two-thirds positive votes is achieved, the new maintainer is approved.

## How to lose the maintainer status

A project maintainer can be revoked for any of the following reasons:

- Refusal to follow the rules and policies stated in this document.
- Lack of activity for the past six months.
- Willful negligence or intent to harm the PrestaShop project.
- On their demand, for personal reasons.

[future-architecture]: https://build.prestashop.com/news/prestashop-in-2019-and-beyond-part-3-the-future-architecture/
[slack]: {{< param ProjectUrls.Slack >}}
