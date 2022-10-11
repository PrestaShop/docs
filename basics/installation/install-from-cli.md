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

The point of having a CLI installer in addition to the regular in-browser installer is to provide a solution to some advanced users, who often prefer command-line interfaces as they tend to give a more concise and powerful means to control a program or operating system. We can see the advantage of CLI installer in Continuous Integration processes.

## How to use it

To use the CLI installer, use your terminal, go to the `/install` (or `/install-dev`) folder, and start the script with this command:

```shell
php index_cli.php
```

This command, by default, will display the various available options:

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

- All the options from the regular in-browser installer are available, with their default values listed above.
- Almost all default option values can be left as is because you can edit them all from the PrestaShop back office once the installation is complete. 

{{% notice info %}}
Note that the e-mail and password are used to create the administrator's back office account.
{{% /notice %}}

To start the installation, you only need to provide one argument. In reality, you need to provide more:

- `domain`. The location where you want your store to appear.
- `db_server`. The database server address.
- `db_name`. The name of the database you want to use.
- `db_user`. The username for the database you want to use.
- `db_password`. The password for the database username above.

Example:

```shell
php install_cli.php --domain=example.com --db_server=sql.example.com --db_name=prestashop --db_user=root --db_password=123456789
```

If the installation completes without any errors, you should see the following confirmation:

```shell
-- Installation successful! --
```

{{% notice info %}}
Before running this command, please note that your database must be created with a `CREATE DATABASE xxx;` statement. 
The in-browser installer has an option to attempt to create the database automatically **but not the CLI**.
{{% /notice %}}