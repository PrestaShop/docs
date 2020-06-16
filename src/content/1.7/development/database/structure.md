---
title: Database structure
weight: 4
---

# Maintaining the database

## Database structure definition

### Global definition

The database structure of PrestaShop can be found in `install/data/db_structure.sql` ([1.7.3.x releases example](https://github.com/PrestaShop/PrestaShop/blob/1.7.3.x/install-dev/data/db_structure.sql)).

It is used one time, during the installation of PrestaShop.
It contains the structure of almost all tables. If a table needs to be added or
modified, this the file you should open.

### Table in DB but not in db_structure.sql

With PrestaShop 1.7, some tables have been migrated to doctrine entities
(i.e stocks). If their `ObjectModel` (= legacy) equivalent does not exist,
the entity is probably only managed by Doctrine.

In that case, updating the table can be done by modifying the related entity
stored in `src/PrestaShopBundle/Entity/`.

## Database content

The default database content is stored in XML files in `install/data/xml/`.
There is one file per entity (= table).

These files are used during the PrestaShop installation as well.

## Structure and content upgrades

### Defining changes

Once PrestaShop is installed, the default structure and content files we saw
are not used anymore.

If a new release of PrestaShop must bring changes to the existing database, an
upgrade file must be created along the `db_structure.sql` update. This SQL
file will be stored in the folder `/install/upgrade/sql/`.

Its name is the PS version on which the change will be applied.

For instance, here is the file *[1.7.3.0.sql](https://github.com/PrestaShop/PrestaShop/blob/1.7.3.x/install-dev/upgrade/sql/1.7.3.0.sql)*,
used by shops upgrading to 1.7.3.0 or later:

```sql
[...]
UPDATE `PREFIX_tab` SET `position` = 0 WHERE `class_name` = 'AdminZones' AND `position` = '1';
UPDATE `PREFIX_tab` SET `position` = 1 WHERE `class_name` = 'AdminCountries' AND `position` = '0';

/* PHP:ps_1730_add_quick_access_evaluation_catalog(); */;
/* PHP:ps_1730_move_some_aeuc_configuration_to_core(); */;

ALTER TABLE `PREFIX_product` ADD `low_stock_threshold` INT(10) NULL DEFAULT NULL AFTER `minimal_quantity`;
[...]
```

In there we can read the SQL queries to execute when upgrading to 1.7.3.0.
Each of them alters the structure and/or modify the existing data.
In case you have complex algorithms to run, you can call PHP code with the
`PHP:` keyword.

To make the code callable, a dedicated file has to be created in
`/install/upgrade/php/` with a function in it. This file and function must have
the same name as we saw in the SQL upgrade file.

If we reuse the previous example, we will find the corresponding file *[/install/upgrade/php/ps_1730_add_quick_access_evaluation_catalog.php](https://github.com/PrestaShop/PrestaShop/blob/1.7.3.x/install-dev/upgrade/php/ps_1730_add_quick_access_evaluation_catalog.php)*:

```php
<?php
function ps_1730_add_quick_access_evaluation_catalog()
{
  // Code inserting values in database
  [...]
}
```

PrestaShop does not expect these functions to return anything. It will always
consider it went well.

### Applying changes

Applying the changes on your database can be done:

* by reinstalling the shop
* from a previous version of PrestaShop, by copying the new files and calling
the PHP script `install/upgrade/upgrade.php`

PrestaShop lists the upgrade files waiting to be applied, by selecting the names
fitting between the configuration property `PS_VERSION_DB` and the constant
`_PS_INSTALL_VERSION_` defined in `install/install_version.php`.

In the first part of this article, we talked about entities being managed only by
Doctrine. Applying the changes on the database is done with the following command:

```
php bin/console prestashop:schema:update-without-foreign
```

{{% notice note %}}
Use `php app/console` instead of `php bin/console` for versions prior to {{< minver v="1.7.4" >}}
{{% /notice %}}
