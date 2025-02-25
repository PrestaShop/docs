---
title: Database structure
weight: 4
---

# Maintaining the database

## Database structure definition

### Global definition

The database structure of PrestaShop can be found in `install/data/db_structure.sql` ([1.7.8.0 releases example](https://github.com/PrestaShop/PrestaShop/blob/1.7.8.0/install-dev/data/db_structure.sql)).

It is used one time, during the installation of PrestaShop.
It contains the structure of almost all tables. If a table needs to be added or
modified, this the file you should open.

### Table in DB but not in db_structure.sql

With PrestaShop 1.7, some tables are now linked to [Doctrine](https://www.doctrine-project.org/) entities
(i.e stocks). If their `ObjectModel` (= legacy) equivalent does not exist,
the entity is probably only managed by Doctrine.

In that case, updating the table can be done by modifying the related entity
stored in `src/PrestaShopBundle/Entity/`.

## Database content

The default database content is stored in XML files in `install/data/xml/`.
There is one file per entity (= table). XML files are structured following ObjectModel structure.

These files are used during the PrestaShop installation as well.

Another file is being used to load data during the install process: `install/data/db_data.sql`. Some versions of PrestaShop do not use it so you might not always find it in the ZIP archive.

## Structure and content updates

### Defining changes

Once PrestaShop is installed, the default structure and content files we saw
are not used anymore.

If a new release of PrestaShop must bring changes to the existing database, an
update file must be created along the `db_structure.sql` update. This SQL
file will be stored in the folder `/install/upgrade/sql/`.

Its name is the PS version on which the change will be applied.

For instance, here is the file *[1.7.8.0.sql](https://github.com/PrestaShop/PrestaShop/blob/1.7.8.0/install-dev/upgrade/sql/1.7.8.0.sql)*, used by stores updating to 1.7.8.0 or later:

```sql
[...]
UPDATE `PREFIX_product` SET `product_type` = "virtual" WHERE `is_virtual` = 1;

/* PHP:ps_1780_add_feature_flag_tab(); */;
```

In there we can read the SQL queries to execute when updating to 1.7.8.0.
Each of them alters the structure and/or modify the existing data.
In case you have complex algorithms to run, you can call PHP code with the
`PHP:` keyword.

To make the code callable, a dedicated file has to be created in
`/install/upgrade/php/` with a function in it. This file and function must have
the same name as we saw in the SQL update file.

If we reuse the previous example, we will find the corresponding file *[/install/upgrade/php/ps_1780_add_feature_flag_tab.php](https://github.com/PrestaShop/PrestaShop/blob/1.7.8.0/install-dev/upgrade/php/ps_1780_add_feature_flag_tab.php)*:

```php
<?php
function ps_1780_add_feature_flag_tab()
{
  // Code inserting values in database
  [...]
}
```

PrestaShop does not expect these functions to return anything. It will always
consider it was run without failure.

### Applying changes

Applying the changes is covered in [the update page]({{< ref "/1.7/basics/keeping-up-to-date/update" >}}).
