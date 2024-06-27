---
title: UI tests
weight: 60
---

# UI Tests

UI tests have been built around PrestaShop in order to be able to verify whether new code changes do break an existing feature.

They work as follow
- setup a docker instance with an installed shop running
- start a browser
- pilot the browser to perform actions on the web interface on the shop: click links, fill form and submit them, read `<div>` content...

These UI tests simulate the behavior of a real user.

## Using UI tests to verify a PRs (Pull Requests)

Anyone can run the UI tests against a PR made on the Core repository using [this tool](https://github.com/PrestaShop/ga.tests.ui.pr/).

As explained in the README of the tool, you need to first fork it then launch test campaigns by inputing the needed informations (PR number, target branch ...).  
As we support MySQL and MariaDB in our UI tests, you have to launch 2 campaigns: the first one by selecting "mysql" in the database field, the second one by selecting "mariadb".

The UI tests do evolve in time as new tests are added and existing tests are refactored and updated: please regularly update your forks or you might be running an outdated version of the tests against a PR.

UI tests will not inform you whether the change in your PR is valid but they will reassure you that your PR did not break one of the features that are being verified by them. So your PR, to the best of our knowledge, and limited by the tests scope, do not introduce an unwanted side-effect that breaks an existing behavior.

## Adding tests results in a PR

After running the tests, please post the link to your job run in your PR to give reviewers the link needed to verify the tests results.

The link will look like this:
```
https://github.com/.../ga.tests.ui.pr/actions/runs/...
```

### What happens if some of the tests fail?

Some of the UI tests scenario might fail for 3 reasons

1. Knowing failing test

It can happen some of the tests are failing because of a recent code change introduced in the branch. In that case, since your PR is based on the branch it will also cause the tests to fail.

The test will be fixed by [Software Developers in Test](https://www.prestashop-project.org/project-organization/people-and-roles/#software-developers-in-test).

If you think some UI tests are failing on your PR and this is not due to your code changes, please reach out to a Committer or Software Developer in Test for confirmation.

2. Incorrect failure

UI tests are code, and just like code they sometimes fail. Most common failures for UI tests are timeouts, when the piloted browser has been waiting for a `<div>` to be displayed and it does not, simply because the software is too slow. These are random issues.

In that case, you can simply relaunch the failing tests and check if, on the second run, they do fail too.

3. Your PR does introduce an unwanted side-effect and break an existing behavior

If the tests fail it most likely indicate that the code changes you submitted in your PR introduce an unwanted side-effect that breaks an existing behavior. This is a great news: the issue was detected before the PR is merged. Open the tests logs to understand the scenario that was applied and follow it to reproduce the problem. Once you understand the problem, you can change your PR and fix it. Relaunching the tests after you have updated your PR will allow you to verify the problem is gone.

Scenarios will look like this:
```
BO - Catalog - Categories : Filter and quick edit Categories table
    ✔ should login in BO
    ✔ should go to 'Catalog > Categories' page
    ✔ should reset all filters and get number of Categories in BO
    Filter Categories table
      ✔ should filter by id_category '9'
      ✔ should reset all filters
      ✔ should filter by name 'Accessories'
      ✔ should reset all filters
      ✔ should filter by description 'Items and accessories for your desk'
      ✔ should reset all filters
```
