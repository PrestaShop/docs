---
title: "How to backup PrestaShop"
menuTitle: "Shop backup"
weight: 10
---

# How to backup PrestaShop

{{% notice warning %}} 
**Important**

It is strongly recommended not to leave your backups at the root of your store or in another place that could be publicly exposed.
{{% /notice %}}

Before starting anything, you must think first about safety.
Any modification to a shop could break it, so you must ensure all your data has been backed up before going further. This implies saving two things: your files and your database.

This documentation can help to run an upgrade, but we can’t be held responsible for any damage caused to your shop during the process. That’s why we strongly recommend you follow this backup step.

## File backup

The first elements to backup are the files on the web server where you have deployed your PrestaShop. The PrestaShop folder contains the source code and your modules & themes, pictures, and all other resources needed to run your shop successfully.

### Copy files

To complete this step, your shop folder must be copied somewhere else. Although it can be copied to another folder on your server, making an additional copy of your files on another computer is a nice additional security measure. To do so, connect to your server using an FTP, SSH, or RDP connection (depending on your server and hosting provider), copy the files to another location, then download them on your computer.

With SSH, you may use `scp` or `rsync` command to backup your shop folder from a server to another. For example, backup from a remote server to your local machine (or the one you are connected on) with `scp` ([scp man page](https://linuxcommand.org/lc3_man_pages/scp1.html)):

```
scp -r user@host:/var/www/prestashop_folder_path /local_path_for_backup/
```

Or with `rsync` ([rsync man page](https://linux.die.net/man/1/rsync)):

```
rsync -avz user@host:/var/www/prestashop_folder_path /local_path_for_backup/
```

Note that this may take a few hours to complete depending on the number of files and your internet connection. But if you’re an advanced user with complete access to your server, the next part may help you go faster.

#### Bonus: Compress your files before download

As said before, downloading the whole PrestaShop folder one file at a time will take a long time to complete.
If you can run commands on your server, you can make a backup faster by compressing the entire content in a single archive file, then downloading this file locally.

* On Windows-based servers, this requires a remote desktop access. Once logged on your remote environment, use the Windows explorer to reach your www folder and compress all its content into a `ZIP` file.

* On Linux-based servers, you need to access your server terminal using SSH. Once logged in, reach your folder and use the following command to create a `TAR` file:

```
tar -czf <file_name>.tar <folder_to_save>
```

For instance:

```
tar -czf backup.tar /var/www/html
```

When your archive is ready, copy it on your computer or any other safe location.

## Database backup

The database on which PrestaShop runs must be saved as well. There are many ways to get a dump of the database content, and we cannot cover all of them. Feel free to use your tools. We cover the main ones here. You can consider your dump complete when you get a SQL file with the structure AND the content of each table.

### Using MySQL client in command line

Using `mysqldump` is the most straightforward way to make a full backup of a specific database.
In a Windows or Linux terminal, run the following command to create a file `dump.sql` with your database structure & data:

```
mysqldump yourdbname > dump.sql
```

With `yourdbname` an example name for the PrestaShop database.

Your server is likely to require credentials. These details can also be provided as parameters:

```
mysqldump --host=<IP_or_hostname> --user=<user> --password --single-transaction --create-options --extended-insert --complete-insert yourdbname > dump.sql
```

If you do not remember your database name or credentials, you can find them in your configuration files:

* PrestaShop 1.6: `config/settings.inc.php`
* Since PrestaShop 1.7: `app/config/parameters.php`

More details about backup & recoveries with MySQL binaries can be found on the [official documentation](https://dev.mysql.com/doc/refman/5.7/en/backup-and-recovery.html).

### PhpMyAdmin (web interface)

PhpMyAdmin, provided by several hosting providers, offers another way to get a complete dump of your database.

Log on to your PhpMyAdmin interface, select the database where PrestaShop is installed, and choose the “export” tab.

{{< figure src="../img/backup-phpmyadmin-export-database.png" title="Exporting a database in SQL format" >}}

We advise selecting the “custom” method, as it offers more options to customize your dump. Ensure all your tables, views, etc., are selected for backup.
To get the same file content as the `mysqldump` method, the following options should be checked as well:

* Use LOCK TABLES statement
* Add DROP TABLE / VIEW / PROCEDURE / FUNCTION / EVENT / TRIGGER statement

Click on the “Go” button, wait for the dump to be generated, then download it.

## Other MySQL clients

There are a lot of ways to connect to a MySQL server. Many different softwares also provide a dump or export option as well.

* MySQL Workbench: https://dev.mysql.com/doc/workbench/en/wb-migration-wizard.html
* Navicat MySQL: https://www.navicat.com/manual/online_manual/en/navicat/win_manual/#/dump_execute_sql
* Adminer, a very easy to use and complete MySQL client in php: https://www.adminer.org/
* Sequel Pro (Mac): https://www.sequelpro.com/