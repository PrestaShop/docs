---
title: Submit a Pull Request
weight: 4
---

# Publish your contribution on GitHub

Once your changes sound good and tests pass on your local computer, you can submit these changes as a Pull Request on GitHub in order to contribute to the opensource project.

First you need to push your branch on GitHub:

```
git push origin add-emoticons-support
```

> You will need to use your GitHub credentials.

Now you can create your Pull Request on GitHub.

If you do not know how to do it, you can read [GitHub documentation](https://help.github.com/articles/creating-a-pull-request/).

If you find this process quite complex, the following materials can help you (on dev.to):
- [The SIMPLEST way to make a pull request](https://dev.to/lukegarrigan/the-simplest-way-to-make-a-pull-request-2h61)
- [The github workflow explained](https://dev.to/mathieuks/introduction-to-github-fork-workflow-why-is-it-so-complex-3ac8)

> Do not forget to complete the contribution table, this is really important for the Core Team to really understand what is the value of your contribution.


## Syncing your fork

PrestaShop Core is a really active project with more than 30 contributions accepted per week, so your copy will become outdated
really fast. To make your own copy up to date with the original project, only a few commands are required:

> You need to execute these commands at the root of your copy/fork.

```
git remote add ps https://github.com/PrestaShop/PrestaShop.git
git fetch ps
git rebase -i ps/develop
git push -f origin develop
```

### What we have done here?

We have added the location of the original project to git so he can retrieve the latest commits, and then we apply this "history"
to our local project. Note, here we have updated the `develop` branch of the PrestaShop project and the same commands can be used to refresh every git branch.