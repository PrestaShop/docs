---
title: How Pull Requests are processed
weight: 2
---

# How Pull Requests are processed

All submitted pull requests go through a thorough process which aims to provide a stable, consistent and reliable software that we all know under the name PrestaShop. Here is this process in details.

## Automatic tasks when you open a Pull Request

When you submit a new Pull Request to the [project repository](https://github.com/PrestaShop/PrestaShop), some automatic checks are triggered.

### Continuous Integration

Three automatic code checker tools are active on the project.

The first tool is a [PHP CS Fixer](https://github.com/FriendsOfPHP/PHP-CS-Fixer) [GitHub Action](https://github.com/features/actions). This tool will look at your Pull Request and check whether the php syntax and code-style is correct. If not, it will block the PR from being merged and tell you what is wrong.

It is a lot easier to work on a big codebase like PrestaShop if all code is written following the same conventions: snake_case or camelCase, how to write the phpDoc, when to use white spaces ... it makes the code look like if it was written by a single developer.
Just like reading a book with two different styles in it, having a codebase with a unified style is making it easier to browse. A unified code-style also makes the pull requests easier to review.

If the Github Action states that your pull request has issues, you need to fix the issues by looking at the Github Action output to understand what needs to be fixed.

The second tool is a [ESLint](https://eslint.org/) [GitHub Action](https://github.com/features/actions). This one checks whether the Javascript syntax and code-style is correct. Likewise, it will block the PR from being merged if there is a syntax or code-style issue.

The third tool is [Travis](https://travis-ci.org/). Travis is a Continous Integration system that will look at the Pull Request and run several checks, be it code-style checkers, format checkers or automated tests, and provide you the result in the Pull Request. If something is wrong it will block the PR from being merged. This is a standard approach to ensure that new contributions in a codebase do not break existing features and behaviors.

If Travis states that your pull request has issues, you need to fix the issues by looking at Travis output to understand what needs to be fixed.

These tools are executed automatically for every Pull Request.

### Prestonbot and Issuebot

[Prestonbot](https://github.com/PrestaShop/prestonbot) (based on [Carsonbot](https://github.com/carsonbot/carsonbot)) is a custom bot that looks at all Pull Requests and tries to help us manage the project. He has multiple capabilities.

For example he detects mistakes in the pull request description, he add some labels to classify the pull requests, he welcomes new contributors to the project ...

[Read his article for the full details.](https://build.prestashop.com/news/prestonbot-reaches-stable-version/)

If something is wrong, Prestonbot will write a comment in the pull request to tell you what to fix.

Issuebot (based on the [probot framework](https://github.com/probot/probot)) is another bot that automates our issue/PR workflow. It will make sure your Pull Request metadata, such as labels or Kanban cards, are valid.

## The code review

Your Pull Request will be reviewed by a Core maintainer.

### What is being checked in code review?

When a Core maintainer sees a pull request, they will review it and decide whether it should be accepted, if it needs changes, or if it cannot be accepted.

The review process is quite thorough in order to make sure that PrestaShop codebase gets better with each contribution. Here is all the things looked for in a Pull Request, when reviewing it:

- The start is checking that the code is correct. This means both from a behavior point of view as well as from a technical point of view. This is simply an assessment of the quality of the Pull Request code, just like it happens in a lot of software teams. The Core maintainers check the code works as intended, it uses the right functions, it handles expectable edge-cases, has no obvious vulnerabilities, scales well, etc. The Core maintainers also keep in mind that PrestaShop is a CMS and consequently must provide all the necessary extension points to allow developers to customize or extend its behavior.
- The Core maintainers also assess the readability of the code. There is a statement that says "when a code file is opened by a developer, 9 times out of 10 it will only to be read, not to be modified". Because PrestaShop is a huge and complex codebase and because it has so many people reading through it, it is very important that its code is made as readable as possible. This is obtained by adding comments, carefully choosing function and variable names, and building an architecture that makes sense so it is easy to grasp and navigate for people who have never worked on it before.
- The Core maintainers also check that best practices are implemented into the Pull Request, be it standard conventions or practices like [PSR](https://www.php-fig.org/psr/) or best security recommandations like the ones from [OWASP](https://www.owasp.org/). When people use PrestaShop to build a shop, it is likely that they will follow the practices they see implemented in the Core, so the aim is to think of the code merged as an example that people will use.
- PrestaShop has grown huge over the years, both as a codebase and as a software. There are hundreds of features built in the software, and some are more commonly used than others. Some contributions sometimes need to be reworked because they did not take into account one of the less popular features of the software, or are not compatible with them. Common examples are the multi-store mode or the RTL (Right-To-Left) mode, two features that adress very specific needs and that many developers are not aware of.
- PrestaShop follows [SemVer](https://semver.org/). This means that The Core maintainers strive not to introduce breaking compatibility changes when releasing minor and patch versions. Therefore, each Pull Request must not introduce such changes.
- The Core maintainers also have a vision of what PrestaShop should evolve to in order to follow the new trends in the software world. Although a big codebase like PrestaShop evolves slowly, the future architecture and features to come are kept in mind, and the Core maintainers check whether the Pull Request is following this direction. For example today PrestaShop relies heavily on jQuery for its frontend features, and Vue.js is slowly starting to be used in the project. So if tomorrow a Pull Request that is using React.js is submitted, it might be refused in order to keep a consistency in the technology stack used for the project.

Some Pull Requests are very hard to review because they are related to a complex topic, a complex area of the code or have a huge global impact on the software that is very hard to estimate and assess. Reviews can take hours or days in order to make sure every contribution merged in the project meets the level of quality we want for it.

Most of the time, if an issue is found during the review, the Core maintainer will provide feedback about the issue and requests the author to modify the parts of the Pull Request that cannot be accepted as they are. After the author of the Pull Request has implemented the requested changes, then the Pull Request can be approved and move forward to the next step.

### It is not only about code

For some Pull Requests, some more people of PrestaShop might be involved in the review:

- UX design team will review changes that have a significant UX impact 
- Product team will review changes that introduce a significant behavior modification (either an existing feature or a new feature)
- Content team will review Pull Requests that introduce wording changes (labels, titles, error and information messages)

Once the Pull Request has been validated by all of the relevant people, it is finally verified by the QA team. The QA team will then make sure that the behavior of the proposed change is correct and that it does not produce any regressions (new errors).

After the Pull Request has finally passed the QA validation, it is merged in the project and the author becomes (if they weren't already) a contributor to this great open source project !

### Graphical summary

![Pull Request process summary](../../img/pull-request-process.png)


---

_(This article was originally published on our blog: [What Happens To Pull Requests After They Are Submitted](https://build.prestashop.com/news/the-review-process/))_
