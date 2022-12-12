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

| Argument        | Description                                | Default value                | Allowed values                                                                                        |
| :-------------- | :----------------------------------------- | :--------------------------- | :---------------------------------------------------------------------------------------------------- |
| `step`          | Installation steps to execute              | all                          | all, database, fixtures, theme, modules, postInstall                                                  |
| `language`      | Language ISO code to install               | en                           | 2 letters ISO 639-1 code ([ISO 639-1][iso-639-1]) with available translation files in `/translations` |
| `all_languages` | Installs all available languages           | 0                            | 0, 1                                                                                                  |
| `timezone`      | Set timezone of instance                   | Europe/Paris                 | Valid timezone ([TZ Database][tz-database])                                                           |
| `base_uri`      | Base URI (appended after domain name)      | /                            | Any URI                                                                                               |
| `domain`        | Domain name for the shop (without http/s)  | localhost                    | Any domain name or IP address                                                                         |
| `db_server`     | Database server hostname                   | localhost                    | Any valid MySQL valid server name or IP address                                                       |
| `db_user`       | Database server user                       | root                         | Any valid MySQL user name                                                                             |
| `db_password`   | Database server password                   | ""                           | The valid password for `db_user`                                                                      |
| `db_name`       | Database name                              | prestashop                   | _string_                                                                                              |
| `db_clear`      | Drop existing tables                       | 1                            | 0, 1                                                                                                  |
| `db_create`     | Create the database if not exists          | 0                            | 0, 1                                                                                                  |
| `prefix`        | Prefix of table names                      | ps\_                         | _string_                                                                                              |
| `engine`        | Engine for MySQL                           | InnoDB                       | InnoDB, MyISAM                                                                                        |
| `name`          | Name of the shop                           | PrestaShop                   | _string_                                                                                              |
| `activity`      | Default activity of the shop               | 0                            | Id of an activity ([Complete list of activities][activities])                                         |
| `country`       | Country of the shop                        | fr                           | 2 letters Alpha-2 code of ISO-3166 list([ISO-3166][iso-3166])                                         |
| `firstname`     | Admin user firstname                       | John                         | _string_                                                                                              |
| `lastname`      | Admin user lastname                        | Doe                          | _string_                                                                                              |
| `password`      | Admin user password                        | Correct Horse Battery Staple | _string_                                                                                              |
| `email`         | Admin user email                           | pub@prestashop.com           | _string_                                                                                              |
| `license`       | Show PrestaShop license after installation | 0                            | 0, 1                                                                                                  |
| `theme`         | Theme name to install                      | "" (classic)                 | Theme name (located in `/themes`)                                                                     |
| `ssl`           | Enable SSL (from PS 1.7.4)                 | 0                            | 0, 1                                                                                                  |
| `rewrite`       | Enable rewrite engine                      | 1                            | 0, 1                                                                                                  |
| `fixtures`      | Install fixtures                           | 1                            | 0, 1                                                                                                  |
| `modules`       | Modules to install, separated by comma     | [] (all)                     | _array_ of module names (located in `/modules`)                                                       |

- All the options from the regular in-browser installer are available, with their default values listed above.
- Almost all default option values can be left as is because you can edit them all from the PrestaShop Back Office once the installation is complete. 

{{% notice info %}}
Note that the e-mail and password are used to create the administrator's Back Office account.
{{% /notice %}}

To start the installation, we recommend that you provide at least these arguments :

- `domain`. The domain name where your shop will be available.
- `db_server`. The database server address.
- `db_name`. The name of the database you want to use. **We strongly recommend that you change the default `prestashop` value**
- `db_user`. The username for the database you want to use.
- `db_password`. The password for the database username above.
- `prefix`. **We strongly recommend that you change the default `ps_` value.**
- `email`. Your email to connect to the Back Office. 
- `password`. The password to connect to the Back Office.

Example:

```shell
php index_cli.php 
    --domain=example.com 
    --db_server=sql.example.com 
    --db_name=myshop
    --db_user=root 
    --db_password=123456789 
    --prefix=myshop_
    --email=me@example.com
    --password=mystrongpassword
```

If the installation completes without any errors, you should see the following confirmation:

```shell
-- Installation successful! --
```

{{% notice info %}}
Before running this command, please note that your database must be created with a `CREATE DATABASE xxx;` statement. 
If the database is not created, please use argument `--db_create=1` to create the database.
{{% /notice %}}

{{% notice info %}}
If your MySQL server is configured on a different port than `3306`, please specify it in the `db_server` argument like this :
`--db_server=sql.example.com:3307`
{{% /notice %}}

[iso-639-1]: https://en.wikipedia.org/wiki/List_of_ISO_639-1_codes
[tz-database]: https://en.wikipedia.org/wiki/List_of_tz_database_time_zones
[activities]: https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/PrestaShopBundle/Form/Admin/Configure/ShopParameters/General/PreferencesType.php#L211-L230
[iso-3166]: https://en.wikipedia.org/wiki/List_of_ISO_3166_country_codes
