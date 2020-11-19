---
title: Summary of how GitHub Issues and Pull Requests are processed
---

# Summary of how GitHub Issues and Pull Requests are processed

GitHub is the main tool used by maintainers to manage the PrestaShop project.

This page quickly describes how [Issues](https://guides.github.com/features/issues/) and [Pull Requests](https://docs.github.com/en/github/collaborating-with-issues-and-pull-requests/about-pull-requests) are processed on GitHub.

## The teams

On GitHub, there are mainly three teams (employees of PrestaShop's company) working together on the project.

- Core Product Team: this team takes care of the product vision of the software. It has Product Managers, UX Designers and Wording Managers.
- Quality Assurance (QA) team: this team takes care of ensuring the quality of the software. It has QA analysts and QA automation engineers.
- Core Developers Team: this team takes care of the code and act as maintainer for the project.

A maintainer will naturally belong to the Developers team but can also assist and work with the Product Team and QA Team.

## Issues

Currently, there are 4 different types of Issues submitted by users on GitHub.

### Feature request or improvement

When a user submits a feature request or an improvement, it can be either a functional request to add or change a behavior (example: add a new Back office page) or a technical request (example: support PostgreSQL).

Functional requests are labelled "Waiting for PM" while technical requests are labelled "Waiting for dev".

The team in charge will then analyse the request and either reject it or accept it. Rejected requests are closed with "no change required" label, while accepted  requests are added to the roadmap and labelled as "to be specified" if researches or specifications are needed or "to do". Labels will help triaging the backlog.

### Bug report

When a user submits a bug report, the QA team will analyse it and attempt to reproduce it. If it can be reproduced and is confirmed to be an issue, it will be labelled as "to do" and added to the roadmap.

If it cannot be reproduced, QA team will attempt to explore the issue with the contributor to isolate the very settings responsible for the buggy behavior.

If the user does not answer for 30 days or after multiple attempts, it cannot be reproduced on our side, the issue is as labelled as "can't reproduced" and closed.

#### Regressions

If the bug report is confirmed, one of the key elements to evaluate is whether it is a regression. A regression is a bug that cannot be observed in the previous PrestaShop version, it means the software quality level has decreased instead of increasing. Regressions are usually milestoned to be fixed in the next patch version.

#### This is not easy

The work of analyzing and reproducing all submitted bug reports is a very complex one, because there might be a very diverse range of reports. Moreover quite a huge number of them are actually not related to the software but to how the shop is being used: the server configuration, the shop configuration, the installed modules and the installed theme might introduce buggy behaviors that the user mistakenly believes come from the software.

This is why so much issues cannot be reproducted on our side, but to find it out multiple explorations and attempts are necessary.

### Support request

We sometimes receive support requests on GitHub, ranging from questions about the software to "please help me to do X in my shop" requests. GitHub is for the software development so we usually redirect users to other channels using the [Support template](https://github.com/PrestaShop/PrestaShop/issues/new?template=3_support_question.md).

### Other

There are some issues which do not fit in the previous categories, such as [releases Issues](https://github.com/PrestaShop/PrestaShop/issues/20804) to follow the progress of a release, or [epic issues](https://github.com/PrestaShop/PrestaShop/issues/9723) used to group together all requests concerning the same subject.

## Projects

Available in the ‘[Projects](https://github.com/PrestaShop/PrestaShop/projects)’ tab of the PrestaShop’s GitHub repository, versions kanbans organize the Core team’s work. Both the product and the tech teams use it to prepare and plan the next developments and, since we deal with an open source project, the purpose of having those kanbans public is to help the community and the external mainteners to know what is at stake.

### Definition of states

A pull request should always be linked to the issue it fixes. 
That's said, there should only have issues in the kanban and it always have an owner, be it a PM or a developer.

Community contributions are no longer part of the kanban. Only issues developed or fixed by the Core team are included in the kanban, as it should reflect the Core team’s work. For example, an issue reports a bug prioritized for the 1.7.8.0, the issue must appear in the 1.7.8 kanban while the linked pull request must have the 1.7.8.0 milestone.

Community contributions must be approved by the Core product team. Ideally before being reviewed, at least before being merged. Here is why:

It is a bug? The specifications must be completed only when it's incomplete or when there's a behavior change.
It is a feature request or an improvement? It must be validated, prioritized, and specified. Specification can be written by a contributor or by the Core Product team. The Core Product team has the final word in whether the specification is valid or not.

A pull request that shows no activity for more than three months must be closed. If it is fixing a major bug or any topwatcher issue, it will be back in the to do column again to be completed by a developer.

Also, an important notion to keep in mind is the definition of ready. Several elements must be prepared upstream to get the issue ready to be worked on, otherwise it will not be included in the backlog.

An issue is ready when it contains:
- an explicit title and description
- validated & available specifications
- validated & available mockups
- validated & available wording
- validated & available acceptance tests

#### Not ready

**All the issues that should be included in this version** but that are not yet ready - need to be assigned to an owner, be it a Project Manager or a Lead Developer.

_Who adds issues to this column?_ Mostly the PM once they approved the issue, but it could also be the developers.

#### Backlog

**All issues that are considered _ready_** by the lead PM and the lead dev. Issues in this column will be discussed with Core developers.

_Who adds issues to this column?_ It is the lead PM with the approval of lead developers.

#### To do

**All the issues that are considered _ready_ and validated by the developers**, optionally assigned to one.

_Who adds issues to this column?_ It is the lead PM with the approval of Core developers. 

#### Blocked / Need specs

**All the issues which have been started but lack information and need to be respecified** or that are blocked by some other task.

_Who adds issues to this column?_ It is the issue owner, after the PM/dev assigned to the issue has explained the blocking element. A comment must be added to explain what is blocking and what is expected.

#### In progress

**All the issues that are being actively worked on**, assigned to developer who has claimed it.

_Who adds issues to this column?_ It is the assigned developer, once he/she starts working on it.

#### To be reviewed

**All the issues where a Pull Request has been made and is waiting for code review**

_Who adds issues to this column?_ It is the developer working on the issue.

#### To be tested

**All the issues with an approved Pull Request that is waiting for validation** by the QA team.

_Who moves issues to this column?_ It is the second maintainer who approves the Pull Request (PRs require at least two approvals), he must also add the "waiting for QA" label on the Pull Request.

#### To be merged

**All the issues with a Pull Request that is ready to be merged**, once approved by the QA team.

_Who moves issues to this column?_ It is the QA analyst that approves the Pull Request.

#### Done

All the issues that are now part of the history, great work to all! 

## Pull Requests

When a contributor submits a Pull Request, it goes through multiple stages.

### Is it eligible

Maintainers must first validate that the Pull Request is eligible to review (the template is filled, the license headers are correct, the target branch is the right one ...).

If there is an issue with the Pull Request and it is not eligible, maintainers kindly ask the contributor to fix it.

### About the intent

If the Pull Request is eligible, maintainers can evaluate if the changes brought by the Pull Request are desirables.

- If the Pull Request brings in changes in design, they should ask the validation of UX designers by adding the label "Waiting for UX".
- If the Pull Request brings in changes to the product, they should ask the validation of Product managers by adding the label "Waiting for PM".
- If the Pull Request brings in changes in wording, they can should the validation of UX designers by adding the label "Waiting for wording".

If one "Waiting for ..." label has been applied, the team in charge will process the Pull Request and then add a "... approved" label. For example if Product team validates the new behavior implemented in a Pull Request, they will remove the "Waiting for PM" label and add the "PM approved" label instead.

There are some automated bots running on GitHub that will help maintainers to label the Pull Requests. For example Prestonbot is able to extract the new wordings and add the "Waiting for wording" label. You can read more about them [here]({{< ref "/1.7/contribute/contribution-process/how-pull-requests-are-processed.md" >}}).

### Reviewing the code

If the Pull Request is validated and there are no more "Waiting for ..." labels, then it awaits a [code review]({{< ref "/1.7/project/maintainers-guide/reviewing-pull-requests.md" >}}). The issue associated to the Pull Request is moved in the "To be reviewed" column by the developer assigned to the issue.

Maintainers provide this code review.

A maintainer can choose to
- Ask for changes in the Pull Request (which blocks merging)
- Provides comments wihout blocking or approving
- Approve the Pull Request

When the Pull Request has been approved (it needs two approvals on the Core repository), the Pull Request must be tested. It is labelled "Waiting for QA" by the second maintainer who approves the pull request.

### Testing the Pull Request

On regular Pull Requests, the QA analyst is in charge of testing the Pull Request. They will use the "How to test" part of the Pull Request description to validate the behavior implemented, and also run some more tests to validate there are no regressions.

Some technical Pull Requests however cannot be tested by QA analysts, the Developers team might test them.

If the Pull Request is tested successfully, the label "QA approved" is applied and the associated issue is moved in the "to be merged" column by the person who tested it.
Otherwise, the author is notified about the issues found during the tests, the label "waiting for author" is applied and the associated issue is moved in the "in progress" column by the person who tested it.

### Merging the Pull Request

Pull Requests that have been validated by QA analyst or developer can be merged. The developer who merges the pull request adds the milestone of the version in which the PR will be available. The associated issue must also be milestoned, labelled as "fixed", closed and moved in the "done" column.
