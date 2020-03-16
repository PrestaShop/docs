---
title: Contribute using localhost
weight: 2
---

# How to become a Core Contributor

If you're reading this, thank you! This means you're interested in contributing to PrestaShop.
You probably are a PrestaShop developer, and your use of the project is slightly different from
ours. For instance, there are few differences between PrestaShop 1.7 (the release) and the branch 1.7
of PrestaShop in the GitHub repository. This is because we create a release usable by everyone from our sources.

To be able to contribute you need:

* a **GitHub account**
* to know the **basics of git**
* to be able to run **prestashop** from the sources

In this part, we'll run PrestaShop by setting up a localhost environment on your machine. Your machine needs:

* a **running mysql database**
* be able to execute **php scripts**
* a **running web server** (apache or nginx, this page explains how to use apache)

## Installing PrestaShop for development

### Prerequisites

Please read the [system requirements][system-requirements] to check that your machine can run PrestaShop.

### Installing a local environment

Installing any web-application locally requires that you first install the adequate environment, namely the Apache web server, the PHP language interpreter, the MySQL database server, and ideally the phpMyAdmin tool. This is called an *AMP package: Apache+MySQL+PHP and the operating system, giving WAMP (Windows+Apache+MySQL+PHP), MAMP (Mac OS X+…) and LAMP (Linux+…). Since all of the items packaged are open-source, these installers are most of the time free.

Here is a selection of free AMP installers:

* [XAMPP](https://www.apachefriends.org/en/xampp.html) (Windows, Mac OS X, Linux, Solaris)
* [WampServer](http://www.wampserver.com/) (Windows)
* [EasyPHP](https://www.easyphp.org/) (Windows)
* [MAMP](https://www.mamp.info/) (Mac OS X)
* [Laragon](https://laragon.org/) (Windows)

### Creating a database for your local shop

Open the phpMyAdmin tool using your browser. Its location depends on the AMP pack you chose:

* http://127.0.0.1/phpmyadmin (XAMPP, WampServer, MAMP),
* http://127.0.0.1/mysql (EasyPHP)

In the “Databases” tab, indicate the database name you want and validate by clicking on the “Create a database” button.

### Downloading PrestaShop sources

To install the source code, you need to fork the PrestaShop repository. A fork is a copy of the original project on GitHub.
If you don't know what is a fork or how to fork a project on GitHub, you can follow the [GitHub tutorial](https://help.github.com/articles/fork-a-repo/).

Once you have forked the project, you need to download it to your computer.

For instance, if your GitHub nickname is `preston`, this is what you should do in your terminal:

```
git clone https://github.com/preston/PrestaShop.git
```

> Of course, you need to replace "preston" by your own nickname here.

Clone the repository inside the document folder of the AMP installer you chose:

* XAMPP: `C:\xampp\htdocs` or `/Applications/xampp/htdocs`
* WampServer: `C:\wamp\www`
* EasyPHP: `C:\easyphp\www`
* MAMP: `/Applications/MAMP/htdocs/`

### Download dependencies using composer

Use [composer](https://getcomposer.org/download/) to download the project's dependencies:

```bash
cd /path/to/prestashop
composer install
```

### Compile assets
{{< minver v="1.7.8" title="true" >}}

From the 1.7.8 version the assets are no longer present in the repository and need to be compiled (we explained with more details why in [this article](https://build.prestashop.com/news/open-question-not-commiting-assets-anymore/)).
You will need `npm` installed on your environment (here is the documentation about [how to compile assets][compile-assets]), then you can simply run:

```bash
cd /path/to/prestashop
make assets
```

### Setting up file rights

PrestaShop needs recursive write permissions on several directories:

- /admin-dev/autoupgrade/
- /app/logs
- /app/Resources/translations
- /cache
- /config/themes
- /download
- /img
- /log
- /mails
- /modules
- /themes
- /translations
- /var

To ease up your life on a development environment, we suggest to either:

- Make Apache run with your own user.
- Add your own user and Apache's to a common user group (eg. "_www"), then `chown` all PrestaShop files to "youruser:_www". 


### Installing PrestaShop

Open the PrestaShop installer and follow its instructions.

The installer can be run from your browser, if you browse http://127.0.0.1/prestashop/install-dev

You can read the [Getting Started guide][getting-started-guide] for more details.

That's it ! You have now a running shop on localhost !

## Make your first contribution

The very first step to create a pull request is to create your own git branch.

Let's say you want to suggest a new feature, like emoticon support everywhere. A correct name for your git branch could be "add-emoticons-support":

```
git checkout -b "add-emoticons-support"
```

Then you can start to do changes on PrestaShop Core, and create commits: YaY!

> A good practice is to have meaningful commits labels: it's better to have "corrected type hinting in FooBar" than "fixed stuff". 

### Publish your contribution on GitHub

Once your changes sound good and tests pass on your local computer, it's time to publish your work online and make a pull request.

The last thing you need to do in the terminal is to publish your branch on GitHub:

```
git push origin add-emoticons-support
```

> You'll need to use your GitHub credentials, this is totally ok.

Then, you can create your Pull Request on GitHub! If you don't know how to do it, you can read [GitHub documentation](https://help.github.com/articles/creating-a-pull-request/).

> Don't forget to complete the contribution table, this is really important for the Core Team to really understand what is the value of your contribution.


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

[getting-started-guide]: https://doc.prestashop.com/display/PS17/Getting+Started
[system-requirements]: {{< ref "1.7/basics/installation/system-requirements.md" >}}
[compile-assets]: {{< ref "1.7/development/compile-assets.md" >}}

