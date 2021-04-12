---
title: How to use GitHub to report an issue
weight: 10
menuTitle: Reporting issues
---

# How to use GitHub to report an issue

PrestaShop uses GitHub to track bugs and issues. This is the best place to report the bugs you are witnessing on your PrestaShop shop.

{{% notice tip %}}
You need a free GitHub account to collaborate. If you don't have one yet, you can [create it here](https://github.com/join).
{{% /notice %}}

## Creating an issue

To create your first issue, go to the [list of issues](https://github.com/PrestaShop/PrestaShop/issues) and click on the "New issue" button on the right. Or just [click here](https://github.com/PrestaShop/PrestaShop/issues/new/choose).

![Issue or Feature request](../img/github-new-issue.png)

 Choose between a "Bug report", or a "Feature request", and click on "Get started"

![Issue or Feature request](../img/github-select-issue-type.png)

A text editor appears:

![Issue or Feature request](../img/github-issue-editor.png)

To fill the required information, just use the text editor. You can use the "preview" tab to see how your issue will be published.

There are five main sections:

1. **Describe the bug** – a clear and concise description of what went wrong.
2. **Expected behavior** – describe what you expected to happen instead.
3. **Steps to Reproduce** – describe the different steps and information to reproduce the issue.
4. **Screenshots** – add screenshots in this section.
5. **Additional information** – like your version of PHP and MySQL, as well as any other relevant server configuration.

Click the "Submit new issue" button when you are done.


## Best practices for writing an issue

When writing a bug report, please use these guidelines:

- Make sure you can reproduce your bug every time.
- Make sure your software is up to date. 
- Ideally, test the latest [nightly build development version](https://nightly.prestashop.com/) to see whether your bug has already been fixed.
- Search in GitHub issues to see whether your bug has already been reported.
- Write a clear summary. Describe the observed result what you expected to happen instead.
- Write precise steps to reproduce. Be specific and verbose: do not fear to give details on how you did reproduce the bug.

These are inspired by [Mozilla's own guidelines](https://developer.mozilla.org/en-US/docs/Mozilla/QA/Bug_writing_guidelines).

{{% notice tip %}}
GitHub provides very good documentation about how to write [issues](https://guides.github.com/features/issues/) with its [flavoured Markdown](https://github.github.com/gfm/). It is possible to [highlight code syntax](https://help.github.com/articles/creating-and-highlighting-code-blocks/), [add pictures](https://help.github.com/articles/file-attachments-on-issues-and-pull-requests/), or even to [link issues and pull requests](https://help.github.com/articles/autolinked-references-and-urls/).
{{% /notice %}}

## What happens after you submit your issue

If your issue can be reproduced using a clean install, it is likely that the problem effectively is due to a software defect.
In that case, the bug will receive a severity classification, and be added to the backlog so that it can be fixed in a future release.

To find out more, read [How issues are sorted]({{< relref "contribution-process/how-issues-are-sorted.md" >}}).
