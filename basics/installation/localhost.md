---
title: Installing a local environment
menuTitle: Development environment
weight: 15
mostViewedPage: true
---

# Installing PrestaShop for development

Now that you intend to develop for PrestaShop, you are better off keeping all your development work on your machine. The main advantage is that it makes it possible for you to entirely bypass the process of uploading your file on your online server in order to test it. Another advantage is that a local test environment enables you to test code without the risk of breaking your production store. Have a local environment is the essential first step in the path of web development.

## Prerequisites

Read [System Requirements][system-requirements].

## Installing a local environment

Installing any web-application locally requires that you first install the adequate environment, namely the Apache web server, the PHP language interpreter, the MySQL database server, and ideally a MySQL admin tool such as phpMyAdmin tool. 

This is called an *AMP package: Apache+MySQL+PHP and the operating system, giving WAMP (Windows+Apache+MySQL+PHP), MAMP (macOS…) and LAMP (Linux+…). Since all of the items packaged are open-source, these installers are most of the time free.

Here is a selection of free AMP installers:

* [XAMPP](https://www.apachefriends.org/download.html) (Windows, macOS, Linux, Solaris)
* [WampServer](http://www.wampserver.com/) (Windows)
* [EasyPHP](https://www.easyphp.org/) (Windows)
* [MAMP](https://www.mamp.info/en/mamp/) (Windows, macOS)
* [Laragon](https://laragon.org/) (Windows)

To install LAMP on your computer follow these steps (tested on Debian Buster).
- Update your system
  ```bash
  apt update
  ```
- Install MySQL
  ```bash
  apt install default-mysql-server default-mysql-client
  ```
- Install Apache server
  ```bash
  apt install apache2
  ```
- Install PHP
  ```bash
  apt install libapache2-mod-php7.3 php7.3 php7.3-common php7.3-curl php7.3-gd php7.3-imagick php7.3-mbstring php7.3-mysql php7.3-json php7.3-xsl php7.3-intl php7.3-zip
  ```

## Creating a database for your shop

If you are installing PrestaShop on a web server, then you must create the database and give access to a privileged user.
You will need this user's credentials to configure PrestaShop during the installation process.

### Using phpMyAdmin

We assume you have root access to `phpMyAdmin`, and you're using version 4.x.

 * Sign in to `phpMyAdmin` as the root user
 * Click `User accounts`, and then click on `Add user account`
 * Fill the `User name` and the `Password`
 * In the `Database for user account`, select `Create database` and `Grant all privileges`
 * Create user and database and make sure the COLLATION of your database is `utf8mb4_general_ci`
 
### From the command line

The database must be created with 4-Byte UTF-8 encoding (`utf8mb4_general_ci`).
For information on installation and configuring MySQL see the [MySQL 5.6 documentation](https://dev.mysql.com/doc/refman/5.6/en/).
Connect as root to your MySql server. In this example our root user is called `adminusername`:

```bash
$ mysql -u adminusername -p
```

Create the database and give it a name like "prestashop":

```bash
> CREATE DATABASE prestashop COLLATE utf8mb4_general_ci;
```

Grant privileges to that database to a new user (the one that PrestaShop will use to connect to the database). Let's call it "prestashopuser".

```bash
> CREATE USER "prestashopuser"@"hostname" IDENTIFIED BY "somepassword";
> GRANT ALL PRIVILEGES ON prestashop.* TO "prestashopuser"@"hostname";
```

In the example above,

- `prestashop` is the name of the new database
- `hostname` is usually localhost (`127.0.0.1` or `localhost`), if you don't know the value, check with a system administrator
- `somepassword` must be a strong password and of course, only known by you

Finally, flush privileges:

```bash
> FLUSH PRIVILEGES;
```

## Downloading PrestaShop

The source code of PrestaShop is hosted on the [Official PrestaShop GitHub Repository](https://github.com/PrestaShop/PrestaShop/).

You can find all the released versions of PrestaShop here: [PrestaShop releases](https://github.com/PrestaShop/PrestaShop/releases).

Nightly releases of PrestaShop are also generated daily. Their details can be found on a [public Google Cloud storage](https://console.cloud.google.com/storage/browser/prestashop-core-nightly).

### Choosing the right version for you

PrestaShop comes in two "flavors":

- **Release package**. A zip package, tuned for production environments.
- **Development version**. The raw source code as it is on the GitHub repository, including automated test suites, build scripts and source codes for assets that are otherwise compiled (like javascript and css files).

![Download files](../img/Prestashop_1.7.8.6_release.png)

{{% notice tip %}}
**Prefer cloning the repository using git for the development version.**

If you intend to work on PrestaShop itself, we suggest using Git to clone the source code of PrestaShop from the GitHub repository.
{{% /notice %}}

{{% callout %}}

#### Repository branches

As stated above, if you decide to work on PrestaShop itself, it's best to clone the PrestaShop repository and work using git. Depending on the version of PrestaShop you want to work on, you will need to choose the right branch:

* The [develop branch](https://github.com/PrestaShop/PrestaShop/tree/8.0.x) contains the current work in progress for the next minor or major version.
    - **This is the right branch to contribute new features, refactors, small bug fixes, etc.**
* The maintenance branches (_8.0.x, ..._) contains all patches made for each minor version.
    - For example, the _8.0.x_ branch contains all patches from 8.0.0 to 8.0.99.
    - Whenever a new minor or major version is ready for release, a new maintenance branch is created. For example, _8.0.x_ for version 8.0.0, _8.1.x_ for 8.1.0, and so forth.
    - **Only the most recent maintenance branch accepts new contributions**
    
{{% /callout %}}

[Clone the repository using Git][clone-the-repository] or extract the zip package in a `prestashop` folder inside the document folder of the AMP installer you chose:

* XAMPP: `C:\xampp\htdocs` or `/Applications/xampp/htdocs`
* WampServer: `C:\wamp\www`
* EasyPHP: `C:\easyphp\www`
* MAMP: `/Applications/MAMP/htdocs/`

## Download dependencies

{{% notice note %}}
This step is only needed if you downloaded the development version.
{{% /notice %}}

### PHP dependencies

Use [composer][composer] to download the project's dependencies:

```bash
cd /path/to/prestashop
composer install
# or alternatively:
make composer
```

### JavaScript and CSS dependencies

PrestaShop uses NPM to manage dependencies and [Webpack][webpack] to compile them into static assets. 
You only need NodeJS 14.x (16.x recommended [get it here][nodejs]), NPM will take care of it all.

```bash
cd /path/to/prestashop
make assets
```

You can also compile assets for the particular element of the system:

- `make admin-default` - for the legacy back office theme
- `make admin-new-theme` - for the new back office theme
- `make front-core` - front office theme core assets
- `make front-classic` - front office default theme assets
- `make front` - all assets for the the front office
- `make admin` - all assets for the the back office

Alternatively, you can [compile assets][compile-assets] manually.


## Setting up file rights

PrestaShop needs recursive write permissions on several directories:

- ./admin-dev/autoupgrade
- ./app/config
- ./cache
- ./config
- ./download
- ./img
- ./log
- ./mails
- ./modules
- ./override
- ./themes
- ./translations
- ./upload
- ./var

You can set up the appropriate permissions using this command:

```bash
$ chmod -R +w admin-dev/autoupgrade app/config var/logs cache config download img log mails modules override themes translations upload var
```

If you do not have some of the folders above, please create them before changing permissions. For example:

```bash
$ mkdir log var/logs
```

To ease up your life on a development environment, we suggest to make Apache run with your own user and group.

{{% notice warning %}}
<b>Never do that in production!</b> Carefully change permissions folder by folder instead.
{{% /notice %}}

## Installing PrestaShop

Open the PrestaShop installer and follow its instructions.

Depending on whether you downloaded a release package or cloned the repository, the route to the installer will be slightly different:

- Release package: http://127.0.0.1/prestashop/install
- Development version: http://127.0.0.1/prestashop/install-dev

You can read the [Getting Started guide][getting-started-guide] for more details.

## Troubleshooting

#####  Compile Error: Cannot declare class AppKernel, because the name is already in use

You may find this error message the first time you open up the Back Office.

This problem may arise in case-insensitive file systems like MacOS due to a misconfiguration. Check your Apache configuration and make sure that the root directory path to your PrestaShop matches the capitalization of the actual system path exactly. A typical error is for example having a folder named `/path/to/PrestaShop` (capital P, capital S) and then configuring it in Apache as `/path/to/Prestashop` (missing the capital S).

[getting-started-guide]: https://docs.prestashop-project.org/v.8-documentation/v/english/getting-started
[system-requirements]: {{< relref "system-requirements" >}}
[clone-the-repository]: {{< relref "/8/themes/getting-started/setting-up-your-local-environment" >}}
[compile-assets]: {{< relref "/8/development/compile-assets" >}}
[webpack]: https://webpack.js.org/
[composer]: https://getcomposer.org/download/
[nodejs]: https://nodejs.org/
