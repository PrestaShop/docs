---
title: How issues are sorted
weight: 1
---

# How issues are sorted

## What happens to the issue you have reported

PrestaShop Quality Assurance team (aka QA) uses a transparent definition for the criteria used to qualify issues' severity, and how they should be applied through labels on github issues.

Please note that severity is to be distinguished from priority. Indeed, severity is used to measure the negative impact that a bug has on a system, a feature, a component or on the project development. It is usually defined by the QA team. As for the priority, it is used to organize all the tasks (bugs, improvements, features, technical tasks) that have to be done in order to meet the project's deadlines. 


## Issue Severity Criteria

When a new issue is created, the first step is to understand what the problem is and then reproduce it. Once that work is done, the second step is to define the severity of that bug.

Four severity levels are used: Critical, Major, Minor and Trivial.

### Critical

The bug affects critical functionality or critical data and there is no workaround (no way to avoid it).
A critical issue affects a very large percentage of users (> 60%) and matches at least one of the following:

- It can lead to data loss, introduce a security vulnerability or break the automatic end to end tests
- It prevents the essential shop operations or puts your business at great risk

Examples:

- Difficulty accessing the front office or back office (significant slowdown, error during installation or update, fatal error)
- Difficulty to globally manage categories, products or customers
- Difficulty to globally place and manage orders

A critical issue should result in a patch version that should be released as soon as possible. [PrestaShop 1.7.2.5](https://build.prestashop-project.org/news/prestashop-1-7-2-5-maintenance-release/) is a good example: this patch release fixes two vulnerabilities affecting the Back Office.


### Major

The bug affects major functionality or major data and there is a workaround, but it is not obvious or can be difficult to put in practice.

A major issue affects a large percentage of users (> 30%) and matches at least one of the following:

- It impacts law compliance
- It has a strong impact on the usability of the front-office / back-office or blocks another project
- It is an important problem but not necessarily blocking the main activity of the seller

Examples:

- Being unable to add, configure or delete a theme or a module
- Difficulty in operating a module properly
- Impacts the price the customer pays

### Minor

The bug affects minor functionality or non-critical data and there is a reasonable workaround, even if it can be annoying when using your shop.


Examples:

- A tolerable slowdown
- A display problem that prevents users from doing something non-critical (eg: can’t click on an element that can be accessible in another way)
- An error message displayed in your back-office that can be dismissed
- Cloning a product doesn't copy all of it's data
- Inaccurate statistics


### Trivial

The bug doesn’t affect any functionality or data. It does not impact productivity or efficiency. It is only an inconvenience without functional impact and it does not even need a workaround.

Examples:

- Cosmetic issues
- Wrong translation in a specific language: that can be solved on [Crowdin](https://crowdin.com/project/prestashop-official)
- Missing confirmation message after an action
- A link opened in the same tab instead of a new tab


## Issue Prioritization

Assessing severity helps to prioritize issues but it is not the only criterion at stake. Given two equally severe issues, how to choose one over the other ?

Prioritization is done by representatives of the Development team, the Product Management team, and the Quality Assurance team.

Together, during regular meetings, they look at the new confirmed issues and they sort them.

In order to make sure that a given bug does not damage PrestaShop's image nor it affects the confidence merchants can have in PrestaShop, they take special care and strive to make every version of PrestaShop better than the one before. Since no one wants to introduce new bugs while fixing other bugs, regressions (new bugs created accidentally when fixing or improving an existing feature) are usually prioritized higher than older bugs. By doing this, the overall software stability is ever increasing.

Then the issue's technical complexity is also studied : that is, whether the bug is easy or complex to fix.

Sometimes a smaller bug will be prioritize over a bigger one. This is because a complex bug may require big technical changes which are not suitable until a later version. This may be because a would require applying backwards-incompatible changes (which are bad for module developers), or because it can be better addressed as a part of a larger project – there is no use fixing a bug if the whole feature is due to be revamped in the near future.
Also sometimes some bugs will be prioritized just because of the “opportunity cost” of fixing them together, as it is usually easier to fix several bugs within the same component. For instance, during the migration of a BO page to Symfony, the bugs of this page are prioritized higher in order to fix them all at once.

Last criterion used is the business impact as of course.

In the end, handling bugs requires two points of view: micro and macro. Severity analyzes the issue on its own, while Priority analyzes the issue in the context of the whole project.

---

_(This article was originally published on our blog: [Introducing A New Bug Severity Classification](https://build.prestashop-project.org/news/severity-classification/))_
