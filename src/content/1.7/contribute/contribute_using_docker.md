---
title: Become a Core Contributor using Docker
weight: 2
---

# How to become a Core Contributor using Docker

If you're reading this, thank you! This means you're interested on contributing to PrestaShop.
You probably are a PrestaShop developer, and your use of the project is slighty different from
ours. For instance, there are little differences between PrestaShop 1.7 (the release) and the branch 1.7
of PrestaShop in GitHub repository. This is because we create a release usable by everyone from our sources.

To be able to contribute you need:

* a **GitHub account**,
* to know **basics of git**,
* to have **docker** installed in your computer;

No need to "know" docker, but you should have "docker" command available in your terminal.

> If you need to install "docker", you can follow their [Documentation](https://docs.docker.com/install/).

## Install PrestaShop Core

To install the core, you need to fork PrestaShop repository. A fork is a copy of original project on GitHub.
If you don't know what is a fork or how to fork a project on GitHub, you can follow the [GitHub tutorial](https://help.github.com/articles/fork-a-repo/).

Once you have a forked the project, you need to download it on your computer.

For instance, if your GitHub nickname is `preston`, this is what you should do in your terminal:


```
git clone https://github.com/preston/PrestaShop.git
```

> Of course, you need to replace "preston" by your own nickname here.

Then you can start the effective installation:

```
cd PrestaShop
docker-compose up
```

> The installation can take between 10-15 minutes, don't close the terminal!

You'll see a lot of information displayed in your terminal, you should spot the following ones:

```
prestashop-git | \n* Installing PrestaShop, this may take a while ...
prestashop-git | -- Installation successful! --
prestashop-git | \n* Almost ! Starting web server now\n
```

At this point, your PrestaShop installation is ready and the website is available at http://localhost:8001.

> You can now close the terminal if you want.

## Make your first contribution

The very first step to create a pull request is to create your own git branch.

Let's say you want to suggest a new feature, like emoticon support everywhere. A correct name for your git branch could be "add-emoticons-support":

```
git checkout -b "add-emoticons-support"
```

Then you can start to do changes on PrestaShop Core, and create commits: YaY!

> A good practice is to have meaningful commits labels: it's better to have "corrected type hinting in FooBar" than "fixed stuff". 

### Launch the test suite

Your changes now sounds ok, and you're almost ready to share your changes with the community.
Before all, you may ensure your changes doesn't break everything: this is why we have a test suite you can use.

You can execute it in your dockerized PrestaShop application without alter your website (it uses a specific database).

```
docker exec prestashop-git sh tests/check_phpunit.sh
```

### Publish your contribution on GitHub

Once your changes sounds good and tests pass in your local computer, it's time to publish your work online and make a pull request.

The last thing you need to do in the terminal is to publish your branch on GitHub:

```
git push origin add-emoticons-support
```

> You'll need to use your GitHub credentials, this is totally ok.

Then, you can create your Pull Request on GitHub! If you don't know how to do it, you can read [GitHub documentation](https://help.github.com/articles/creating-a-pull-request/).

> Don't forget to complete the contribution table, this is really important for the Core Team to really understand what is the value of your contribution.


## Syncing your fork

PrestaShop Core is a really active project with more than 30 contributions accepted per week, so your copy will become outdated
really fast. To make your own copy up to date with the original project, only few commands are required:

> You need to execute these commands at the root of your copy/fork.

```
git remote add ps https://github.com/PrestaShop/PrestaShop.git
git fetch ps
git rebase -i ps/develop
git push -f origin develop
```

### What we have done here?

We have added the location of original project to git so he can retrieve the latest commits, and the we apply this "history"
to our local project. Note, here we have updated `develop` branch of PrestaShop project and same commands can be used to refresh every git branch.