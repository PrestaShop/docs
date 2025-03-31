---
menuTitle: Update
title: How to update PrestaShop
description: Everything you need to know to update your PrestaShop to the latest version
weight: 30
aliases:
  - /1.7/basics/keeping_up-to-date/update
  - /1.7/basics/keeping-up-to-date/upgrade
  - /1.7/basics/keeping-up-to-date/upgrade-module
---

# How to update PrestaShop

This chapter describes several ways to complete an update of PrestaShop.

## Update Assistant module - Update from the back office interface
You can use provided `Update Assistant` module to update your store to the newest version using web interface. You can read more about the module and how to use it [here][1].

## Update Assistant module - Update from the Command-Line (CLI)
`Update Assistant` module is fully accessible through `cli`. You can read all the details [here][2].

## Manual update – Process details

This guide gives you the full control on the process. This one has been applied by PrestaShop for several major versions, and thus can be applied on very old stores.

{{% notice info %}}
Warning, the manual method described below only works for updates from a PrestaShop 1.7.0 store to a PrestaShop 1.7.8 one.
Wrong use of this method may render the update and the operation of your store impossible.
We recommend that you use the web interface or CLI of the `Update Assistant` module.
{{% /notice %}}

### Release download

The first step is to download the latest version on <a href="https://www.prestashop.com/" target="_blank">prestashop.com</a>.

If you update to another version of PrestaShop 1.6, the release files
can be found in a <a href="https://www.prestashop.com/en/previous-versions?version=1.6" target="_blank">dedicated archives list</a>.

Download can also be done in command line, as done here with the version
1.7.8.11:

```bash
wget -O prestashop-update.zip https://github.com/PrestaShop/PrestaShop/releases/download/1.7.8.11/prestashop_1.7.8.11.zip
```

### Archive extraction

Extract the files from the archive with a tool like 7zip

Note starting from PrestaShop 1.7.0.0, the release package contains a
zip file itself, which must be extracted as well.

On a Linux terminal, you can use the command \`unzip\`:

```bash
unzip prestashop-update.zip && unzip prestashop.zip -d update
```

Once you have the folders like `classes/`, `modules/`, `themes/` inside the update-directory, etc. you may
go on the next step.

### Sample files cleanup

Avoid overwrite the production resources (images, conf ...) with the
default data. These folders can be removed from the new release:

- img/
- override/

All the other files present in the new release will overwrite the
existing files. All changes you made on the original source code will be
lost (by the way, this is not recommended, you should never modify the
core files).

Also, rename the “admin” folder to match your store’s admin folder name.
This will prevent an unwanted duplication of the administration content.

### Turning on maintenance mode

The store will now be modified. As it may cause unexpected behavior for you and your customers during the update, we highly recommend you to
turn on maintenance mode during the update.

This can be done in your administration panel:

- On PrestaShop 1.7, in Shop parameters > General > Maintenance tab
- On PrestaShop 1.6, in Shop parameters > Maintenance

Adding your IP address will allow you to access your store while it’s in
maintenance mode. That way, you can make sure everything is working
right before allowing your customers to access it again.

### File copy

In this step, we "update" the PrestaShop files by copying the new
release content in the existing store.

### Disable cache

You may have activated a caching system (eg. memcache) on your store. In that case, make sure to disable it in "Advanced Parameters" > "Performance". You can enable it again once the update process is done. You might want to also delete the `var/cache/prod` and `var/cache/dev` folders.

**Note about `vendor` folder**: Previous updates of PrestaShop 1.7
showed that conflicts may occur when merging the new vendor/ folder with
the old one. To avoid this problem, we recommend to delete this folder
in the existing store before copying the new one.

On Windows, copy the new folder content and paste it in your store
folder. You will get warnings that files already exists in the
destination folder. Choose “overwrite” to continue.

On linux, the copy can be done in your terminal:

```bash
cp -rf <path_to_the_new_release>/* <path_to_the_current_shop>/
```

Example:

```bash
cp -rf ~/Downloads/prestashop/* /var/www/html/
```

### Database update

Once the files have been copied, your store database is ready to be
updated.

{{% notice note %}}
Some web hosting providers gives you two user accounts to access your database. One with full privileges the other for using in scripts with limited rights. To be able to use this Database update script you have to use the account with full privileges.
{{% /notice %}}

All the changes to apply have been defined in the `install` folder,
running them can be done with a specific PHP script.

When you’re ready, run the file `install/upgrade/upgrade.php`.

This can be done with a browser, by reaching the address
`http://<shop_domain>/install/upgrade/upgrade.php`, or from your
server's command line:

```bash
php install/upgrade/upgrade.php
```

In both cases, an XML log will be displayed. The result can be found in
the attribute `result` of the first tag `<action>`:

* `ok` if updates have been found and executed
* `error` if something went wrong
* `info` for next actions, displaying the details on the process

#### Execution log

When the update script found some updates to apply, the SQL queries
run will be listed along their respective result.

```xml
<?xml version="1.0" encoding="UTF-8"?><action result="ok" id="">
<action result="info" id="1.7.0.5"><![CDATA[[OK] PHP 1.7.0.5 : /* PHP:ps_update_tabs(); */]]></action>
<action result="info" id="1.7.0.5"><![CDATA[[OK] SQL 1.7.0.5 : ALTER TABLE `ps_currency` MODIFY `name` varchar(64) NOT NULL]]></action>
<action result="info" id="1.7.1.0"><![CDATA[[OK] SQL 1.7.1.0 : SET SESSION sql_mode = '']]></action>
<action result="info" id="1.7.1.0"><![CDATA[[OK] SQL 1.7.1.0 : SET NAMES 'utf8']]></action>
[...]
```

You can double check that each action is marked as “OK”. If not,
additional details will be shown after the request, which can help you
fix the issue and re-execute the request manually on your database. In
some cases, you may need to restore your database backup and start over.

#### Error codes

An error code can also be displayed. Each code is related to a message
described here:

* Error #27: The store is running a newer version than the content provided by the install folder.
* Error #28: The store is already at the version you try to update to.
* Error #29: Could not find the current version. Check your database parameters file and the database connection.
* Error #31: Unable to find update directory in the installation path, does the folder `install/upgrade/sql` exist and is not empty?
* Error #32: No update needs to be applied.
* Error #33: Error while loading a SQL update file. Check your permissions of the folder `install/upgrade/sql`.
* Error #40: The version provided in the file `install/install_version.php` is invalid.
* Error #43: Error while updating database schema using doctrine.
* Error #44: Error while updating translations.
* Error #45: Error while enabling theme.

### Cleanup

Before going further, a few things should now be cleaned.

-   The `install` folder, used to run the database updates, is not needed anymore and can be safely deleted.
-   When opening your store (in the front or back office) on your browser, you may see some visual issues. This can be due to your old assets being still served by a cache.
    Reload them by force-refreshing the page (press ctrl+R on Windows / Linux or cmd+R on Mac OS) or clearing your browser’s cache.

### Modules update

Your modules files have been updated during the file copy, however many
of them may require additional changes on the database. Please check the
module page in your Back Office to see if updates are waiting to be
run.

Go to your administration panel and login. You will notice the version
displayed has changed on the login page. Then in the menu, click on the
module page to reach your catalog.

On PrestaShop 1.6, this page can be found in “Module & Services”. Click
on “Update all” at the top of the page to run all available updates:

{{< figure src="../img/image63.png" >}}

On PrestaShop 1.7, the same feature can be found in the Improve &gt;&gt;
Modules page, under the tab “Notifications”:

{{< figure src="../img/image38.png" >}}

## Support service

Updating your store yourself can be risky. If you're unsure about handling it on your own, you can seek professional help from agencies, freelancers, or the <a href="https://www.prestashop-project.org/support/" target="_blank">PrestaShop support network</a>.

Regardless of how you proceed, the update process ensures that your existing store data, modules, and theme are preserved.

## Read more

{{% children /%}}

[1]: {{< relref "/1.7/basics/keeping-up-to-date/update/update-from-the-back-office" >}}
[2]: {{< relref "/1.7/basics/keeping-up-to-date/update/update-from-the-cli" >}}
