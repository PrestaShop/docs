---
title: How to push your changes to GitHub
menuTitle: Publish your changes to GitHub
weight: 4
---

# How to publish your contribution to GitHub

Once your changes sound good and tests pass on your local computer, you can contribute to the open source project by submitting these changes as a Pull Request on GitHub.

First you need to push your branch on GitHub:

```
git push origin add-emoticons-support
```

{{% notice note %}}
You will need to use your GitHub credentials.
{{% /notice %}}

Now you can create your Pull Request on GitHub. If you don't know how to do it, you can read [GitHub documentation](https://help.github.com/articles/creating-a-pull-request/).

If you find this process quite complex, the following articles can help you:

- [The SIMPLEST way to make a pull request](https://dev.to/lukegarrigan/the-simplest-way-to-make-a-pull-request-2h61)
- [The github workflow explained](https://dev.to/mathieuks/introduction-to-github-fork-workflow-why-is-it-so-complex-3ac8)

{{% notice note %}}
Do not forget to complete the contribution table, this is really important for the Core Team to really understand what is the value of your contribution.
See [our contribution guidelines]({{< ref "1.7/contribute/contribution-guidelines/" >}})
{{% /notice %}}

## Syncing your fork

PrestaShop Core is a really active project with more than 30 contributions accepted per week, so your fork will become outdated really fast. To make your own copy up to date with the original project, only a few commands are required:

{{% notice note %}}
You need to execute these commands at the root of your copy/fork.
{{% /notice %}}

```
git remote add ps https://github.com/PrestaShop/PrestaShop.git
git fetch ps
git rebase -i ps/develop
git push -f origin develop
```

### What we have done here?

We have added the location of the original project to git so he can retrieve the latest commits, and then we apply this "history"
to our local project. Note, here we have updated the `develop` branch of the PrestaShop project and the same commands can be used to refresh every git branch.
