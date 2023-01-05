---
title: Contribute using localhost
weight: 2
---

# How to become a Core Contributor

If you're reading this, thank you! This means you're interested in contributing to PrestaShop.
You probably are a PrestaShop developer, and your use of the project is slightly different from ours. For instance, there are few differences between a PrestaShop zip release package and the GitHub repository. This is because the release package is a build, whereas the GitHub repository contains the sources.

To be able to contribute you need:

* a **GitHub account**
* to know the **basics of git**
* to be able to run **prestashop** from the sources

In this part, we'll run PrestaShop by setting up a localhost environment on your machine. Your machine needs:

* a **running mysql database**
* be able to execute **php scripts**
* a **running web server** (Apache or Nginx, this page explains how to use Apache)

## Installing PrestaShop for development

### Prerequisites

Please read the [system requirements][system-requirements] to check that your machine can run PrestaShop.

### Installing a local environment

Installing any web-application locally requires that you first install the adequate environment, namely the Apache web server, the PHP language interpreter, the MySQL database server, and ideally the phpMyAdmin tool. This is called an *AMP package: Apache+MySQL+PHP and the operating system, giving WAMP (Windows+Apache+MySQL+PHP), MAMP (Mac OS X+…) and LAMP (Linux+…). Since all of the items packaged are open-source, these installers are most of the time free.

Here is a selection of free AMP installers:

* [XAMPP](https://www.apachefriends.org/en/xampp.html) (Windows, Mac OS X, Linux, Solaris)
* [WampServer](http://www.wampserver.com/) (Windows)
* [EasyPHP](https://www.easyphp.org/) (Windows)
* [MAMP](https://www.mamp.info/en/mamp/) (Windows, Mac OS X)
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

{{% notice note %}}
Of course, you need to replace "preston" with your own nickname here.
{{% /notice %}}

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

Static assets are not present in the repository and need to be compiled (we explained why in [this article](https://build.prestashop-project.org/news/open-question-not-commiting-assets-anymore/)).
You will need `npm` installed on your environment (here is the documentation about [how to compile assets][compile-assets]), then you can simply run:

```bash
cd /path/to/prestashop
make assets
```

### Setting up file rights

PrestaShop needs recursive write permissions on several directories:

- /admin-dev/autoupgrade/
- /app/logs
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

That's it! You have now a running shop on localhost!

## Make your first contribution

The very first step to create a pull request is to create your own git branch.

Let's say you want to suggest a new feature, like emoticon support everywhere. A correct name for your git branch could be "add-emoticons-support":

```
git checkout -b "add-emoticons-support"
```

Then you can start to do changes on PrestaShop Core, and create commits: Yay!

{{% notice tip %}}
A good practice is to write meaningful commits labels: it's better to have "Corrected type hinting in FooBar" than "Fixed stuff". 
{{% /notice %}}

### Publish your work

See [Submit a Pull Request]({{< relref "create-pull-request" >}}).

[getting-started-guide]: https://docs.prestashop-project.org/1.7-documentation/user-guide
[system-requirements]: {{< relref "/8/basics/installation/system-requirements" >}}
[compile-assets]: {{< relref "/8/development/compile-assets" >}}
