---
title: Contribute using Docker
weight: 3
---

# How to become a Core Contributor using Docker

If you're reading this, thank you! This means you're interested in contributing to PrestaShop.
You probably are a PrestaShop developer, and your use of the project is slightly different from ours. For instance, there are few differences between a PrestaShop zip release package and the GitHub repository. This is because the release package is a build, whereas the GitHub repository contains the sources.

To be able to contribute you need:

* a **GitHub account**
* to know the **basics of git**
* to be able to run **prestashop** from the sources

In this part, we'll run PrestaShop using docker.

No need to "know" docker, but you should have the "docker" command available in your terminal.

{{% notice note %}}
If you need to install "docker", you can follow their [Documentation](https://docs.docker.com/install/).
{{% /notice %}}

## Install PrestaShop Core

To install the core, you need to fork the PrestaShop repository. A fork is a copy of the original project on GitHub.
If you don't know what is a fork or how to fork a project on GitHub, you can follow the [GitHub tutorial](https://help.github.com/articles/fork-a-repo/).

Once you have forked the project, you need to download it to your computer.

For instance, if your GitHub nickname is `preston`, this is what you should do in your terminal:

```
git clone https://github.com/preston/PrestaShop.git
```

{{% notice note %}}
Of course, you need to replace "preston" with your own nickname here.
{{% /notice %}}

Then you can start the effective installation:

```
cd PrestaShop
docker-compose up
```

{{% notice tip %}}
The installation can take between 10-15 minutes, don't close the terminal!
{{% /notice %}}

You'll see a lot of information displayed in your terminal, you should spot the following ones:

```
prestashop-git | \n* Installing PrestaShop, this may take a while ...
prestashop-git | -- Installation successful! --
prestashop-git | \n* Almost ! Starting web server now\n
```

At this point, your PrestaShop installation is ready and the website is available at http://localhost:8001. 

The default credentials for the back-office are `demo@prestashop.com` / `Correct Horse Battery Staple`.

Default MySQL credentials to connect using 3rd party programs like Sequel Pro and others:
Username: `root`
Password: `prestashop`

You can check MySQL port using command line

```
docker-compose ps mysql
```

{{% notice tip %}}
You can now close the terminal if you want.
{{% /notice %}}

## Make your first contribution

The very first step to create a pull request is to create your own git branch.

Let's say you want to suggest a new feature, like emoticon support everywhere. A correct name for your git branch could be "add-emoticons-support":

```
git checkout -b "add-emoticons-support"
```

Then you can start to do changes on PrestaShop Core, and create commits: YaY!

{{% notice tip %}}
A good practice is to write meaningful commits messages: it's better to have "corrected type hinting in FooBar" than "fixed stuff".
{{% /notice %}} 

### Launch the test suite

Your changes now sounds ok, and you're almost ready to share your changes with the community.
Before all, you may ensure your changes don't break everything: this is why we have multiple test suites you can use. Want to read more about tests in PrestaShop? Head to [this]({{< relref "/8/testing/" >}}) page.

You can execute it in your dockerized PrestaShop application without altering your website (it uses a specific database).

```
docker-compose exec prestashop-git composer test-all
```

### Publish your work

See [Submit a Pull Request]({{< relref "/8/contribute/contribute-pull-requests/create-pull-request" >}}).
