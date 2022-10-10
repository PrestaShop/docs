---
title: Installing PrestaShop from CLI
menuTitle: Installation from CLI
weight: 15
---

# Installing PrestaShop from CLI

Since version 1.5.4, PrestaShop has a command-line installer.

This special installer makes it possible to install PrestaShop without the need to use a web browser: simply put the content of the zip archive on your web server or pull code from an official PrestaShop repository, and you can install PrestaShop through your command-line interface (CLI). 

{{% notice info %}}
If deploying from sources (PrestaShop repository), you must first install Composer dependencies.
Install them with `composer install` from project's root directory.
{{% /notice %}}

The point of having a CLI installer in addition to the regular in-browser installer is to give this option to cater for some advanced users, who often prefer command-line interfaces as they tend to provide a more concise and powerful means to control a program or operating system.

## How to use it

The CLI installer is easy to use: from your terminal, go to the /install (or /install-dev) folder, and start the script with this command:

```shell
php index_cli.php
```

This will display the various available options:

```
Arguments available:
--step	all / database,fixtures,theme,modules,postInstall	(Default: all)
--language	language iso code	(Default: en)
--all_languages	install all available languages	(Default: 0)
--timezone		(Default: Europe/Paris)
--base_uri		(Default: /)
--domain		(Default: localhost)
--db_server		(Default: localhost)
--db_user		(Default: root)
--db_password		(Default: )
--db_name		(Default: prestashop)
--db_clear	Drop existing tables	(Default: 1)
--db_create	Create the database if not exist	(Default: 0)
--prefix		(Default: ps_)
--engine	InnoDB/MyISAM	(Default: InnoDB)
--name		(Default: PrestaShop)
--activity		(Default: 0)
--country		(Default: fr)
--firstname		(Default: John)
--lastname		(Default: Doe)
--password		(Default: Correct Horse Battery Staple)
--email		(Default: pub@prestashop.com)
--license	show PrestaShop license	(Default: 0)
--theme		(Default: )
--ssl	enable SSL for PrestaShop	(Default: 0)
--rewrite	enable rewrite engine for PrestaShop	(Default: 1)
--fixtures	enable fixtures installation	(Default: 1)
--modules	Modules to install, separated by comma	(Default: [])
```

- All the options from the regular in-browser installer are available, with their default value listed. 
- Almost all default values value can be left as is, because you can edit them all from the PrestaShop back-office once the installation is done. 

{{% notice info %}}
Note that the e-mail and password are the ones used to create the administrator's back-office account.
{{% /notice %}}

To start the installation, you only need to provide one argument. In reality, you need to provide more:

- `domain`. The location where you want your store to appear.
- `db_server`. The database server address.
- `db_name`. The name of the database you want to use.
- `db_user`. The username for the database you want to use.
- `db_password`. The password for the database username above.

For instance:

```shell
php install_cli.php --domain=example.com --db_server=sql.example.com --db_name=prestashop --db_user=root --db_password=123456789
```

And if your database credentials were good, you should see :

```shell
-- Installation successful! --
```

{{% notice info %}}
Please note that your database must be created with a `CREATE DATABASE xxx;` statement before running this command. 
The Web GUI has an option to **Attempt to create the database automatically** but not the CLI.
{{% /notice %}}