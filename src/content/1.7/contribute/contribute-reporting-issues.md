---
title: How to use the Forge to contribute to PrestaShop
menuTitle: Contribute by reporting issues
---

# How to use the Forge to contribute to PrestaShop

The Forge is the name of PrestaShop's bug and issue tracker, which uses Atlassian's JIRA tool. This is the best place to describe bugs you are witnessing on your PrestaShop installation, and have the developers try to fix it.

## Creating your account

In order to participate, you need to create an account to use the bug tracker.

[Create your account here](http://forge.prestashop.com/secure/Signup!default.jspa).

![Sign up form](../img/forge-createAccount.jpg)

Fill all fields and validate your account request.

![Account created message](../img/forge-accountCreated.jpg)

Once your account is validated, [click here to log in](http://forge.prestashop.com/secure).

## Creating an issue

You can now create your first issue: click on the "Create issue" button in the top bar.

![Capture of the Forge page](../img/forge-createIssue.jpg)

A form appears:

1. **Project**: Choose the Forge project depending on the context of your report:
    1. "PrestaShop 1.7": when your report is tied to version 1.7.
    1. "PrestaShop 1.6": when your report is tied to version 1.6.
    1. "Partners & Native Modules": when your issue is tied to a default module.
1. **Issue type**: Choose "Bug" or "Improvement" depending on what you your issue is about.
1. **Affects version**: Always indicate the exact version where your issue happens. 
    1. If possible, check on the latest version to make sure that the issue is not already solved.
1. **Summary**: Give a short description of the issue.
1. **Description**: Give a complete and precise description of the bug and the best way to reproduce it.
1. **How to reproduce the issue**: Being able to reproduce every time is the best way to get your issue fixed. Please give details!
1. **Attachment**: If necessary, add image files or sample code.
1. Click the "Create" button when you are done.

![Capture of the Forge page](../img/forge-createIssue2.jpg)

## Best practices for writing an issue

When writing a bug report, please use these guidelines:

- Make sure you can reproduce your bug every time.
- Make sure your software is up to date.
    - Ideally, test an in-development version to see whether your bug has already been fixed.
- Search the Forge to see whether your bug has already been reported.
- Write a clear summary.
- Write precise steps to reproduce. Be specific and verbose: do not fear to give details on how you did reproduce the bug.
    - After your steps, precisely describe the observed result and the expected result.

These are inspired from [Mozilla's own guidelines](https://developer.mozilla.org/en-US/docs/Mozilla/QA/Bug_writing_guidelines).

To learn more about how to best use the Forge, read the [JIRA documentation](https://confluence.atlassian.com/display/JIRA/JIRA+Documentation). 
