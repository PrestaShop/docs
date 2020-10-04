---
menuTitle: Upgrade
title: How to upgrade PrestaShop
description: Everything you need to know to upgrade your PrestaShop to the latest version
weight: 30
aliases:
  - /1.7/basics/keeping_up-to-date/upgrade
---

# How to upgrade PrestaShop


{{% notice warning %}}
**Important**

Do not go further if you haven’t made a backup of your shop.

Rollback will be the only way to go back if something does not go well,
and this requires a backup.

Learn [how to backup your shop]({{< ref "/1.7/basics/keeping-up-to-date/backup" >}})
{{% /notice %}}

This chapter describes several ways to complete an upgrade of
PrestaShop.

## Manual upgrade – Process details

This guide gives you the full control on the process. This one has been
applied by PrestaShop for several major versions, and thus can be
applied on very old shops.

### Release download

The first step is to download the latest version on https://www.prestashop.com/.

If you upgrade to another version of PrestaShop 1.6, the release files
can be found in a [dedicated archives list](https://www.prestashop.com/en/previous-versions?field_main_version_tid=2875&sort_by=field_version_number_value&sort_order=DESC).

Download can also be done in command line, as done here with the version
1.7.3.2:

```bash
wget -O prestashop-upgrade.zip https://www.prestashop.com/download/old/prestashop_1.7.3.2.zip
```

### Archive extraction

Extract the files from the archive with a tool like 7zip

Note starting from PrestaShop 1.7.0.0, the release package contains a
zip file itself, which must be extracted as well.

On a Linux terminal, you can use the command \`unzip\`:

```bash
unzip prestashop-upgrade.zip && unzip prestashop.zip
```

Once you have the folders like `classes/`, `modules/`, `themes/`, etc. you may
go on the next step.

### Sample files cleanup

Avoid overwrite the production resources (images, conf ...) with the
default data. These folders can be removed from the new release:

-   img/
-   override/

All the other files present in the new release will overwrite the
existing files. All changes you made on the original source code will be
lost (by the way, this is not recommended, you should never modify the
core files).

Also, rename the “admin” folder to match your shop’s admin folder name.
This will prevent an unwanted duplication of the administration content.

### Turning on maintenance mode

The shop will now be modified. As it may cause unexpected behavior for
you and your customers during the upgrade, we highly recommend you to
turn on maintenance mode during the upgrade.

This can be done in your administration panel:

-   On PrestaShop 1.7, in Shop parameters > General > Maintenance tab
-   On PrestaShop 1.6, in Shop parameters > Maintenance

Adding your IP address will allow you to access your shop while it’s in
maintenance mode. That way, you can make sure everything is working
right before allowing your customers to access it again.

### File copy

In this step, we “upgrade” the PrestaShop files by copying the new
release content in the existing shop.

**Note about \`vendor\` folder**: Previous upgrades of PrestaShop 1.7
showed that conflicts may occur when merging the new vendor/ folder with
the old one. To avoid this problem, we recommend to delete this folder
in the existing shop before copying the new one.

On Windows, copy the new folder content and paste it in your shop
folder. You will get warnings that files already exists in the
destination folder. Choose “overwrite” to continue.

On linux, the copy can be done in your terminal:

```bash
cp -R <path_to_the_new_release>/* <path_to_the_current_shop>/
```

Example:

```bash
cp -R ~/Downloads/prestashop/* /var/www/html/
```

### Database upgrade

Once the files have been copied, your shop database is ready to be
upgraded.

{{% notice note %}}
Some web hosting providers gives you two user accounts to access your database. One with full privileges the other for using in scripts with limited rights. To be able to use this Database upgrade script you have to use the account with full privileges.
{{% /notice %}}

All the changes to apply have been defined in the \`install\` folder,
running them can be done with a specific PHP script.

When you’re ready, run the file \`install/upgrade/upgrade.php\`.

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

When the upgrade script found some upgrades to apply, the SQL queries
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

* Error #27: The shop is running a newer version than the content provided by the install folder.
* Error #28: The shop is already at the version you try to upgrade to.
* Error #29: Could not find the current version. Check your database parameters file and the database connection.
* Error #31: Unable to find upgrade directory in the installation path, does the folder `install/upgrade/sql` exist and is not empty?
* Error #32: No upgrade needs to be applied.
* Error #33: Error while loading a SQL upgrade file. Check your permissions of the folder `install/upgrade/sql`.
* Error #40: The version provided in the file `install/install_version.php` is invalid.
* Error #43: Error while upgrading database schema using doctrine.
* Error #44: Error while updating translations.
* Error #45: Error while enabling theme.

### Cleanup

Before going further, a few things should now be cleaned.

-   The \`install\` folder, used to run the database upgrades, is not needed anymore and can be safely deleted.
-   When opening your shop (in the front or back office) on your browser, you may see some visual issues. This can be due to your old assets being still served by a cache. Reload them by force-refreshing the page (press ctrl+R on Windows / Linux or cmd+R on Mac OS) or clearing your browser’s cache.

### Modules upgrade

Your modules files have been upgraded during the file copy, however many
of them may require additional changes on the database. Please check the
module page in your Back Office to see if upgrades are waiting to be
run.

Go to your administration panel and login. You will notice the version
displayed has changed on the login page. Then in the menu, click on the
module page to reach your catalog.

On PrestaShop 1.6, this page can be found in “Module & Services”. Click
on “Update all” at the top of the page to run all available upgrades:

{{< figure src="/images/1.7/upgrade-migration/image63.png" >}}

On PrestaShop 1.7, the same feature can be found in the Improve &gt;&gt;
Modules page, under the tab “Notifications”:

{{< figure src="/images/1.7/upgrade-migration/image38.png" >}}

## 1-click upgrade module

### About

If the manual process seems too tedious, other solutions exist to
complete an upgrade.

PrestaShop provides the module 1-click upgrade for free on the
marketplace and your shop administration panel. It executes the
previously given process automatically, and is available for almost all
versions of PrestaShop.

{{% notice note %}}
The same note as above, in order to have this module working you must have set in `/app/config/parameters.php` database account with full privileges.
{{% /notice %}}

### Note about version +4.0.0

This module has been reworked internally for PrestaShop 1.6 & 1.7.

Technical details about this major version can be found on a
[specific document (Google docs)](https://docs.google.com/document/d/1DQMP6bg5_fgbJQScdidCQCEmAi4MzRgYNhdGVcYOqm4/edit#heading=h.sn6tqvhtvo8p).

### Download / Installation

-   Download from the marketplace: https://addons.prestashop.com/en/data-migration-backup/5496-.html

Then, import your module archive on the modules page. To do so, you can
find the button “Upload a module” (PrestaShop 1.7) or “Add a module”
(PrestaShop 1.6) at the top right of the page. Clicking on it will open
a form that will allow you to upload your module zip.

On PrestaShop 1.7:

{{< figure src="/images/1.7/upgrade-migration/image70.png" >}}

On PrestaShop 1.6:

{{< figure src="/images/1.7/upgrade-migration/image79.png" >}}

-   From the administration panel

On PrestaShop 1.7:

{{< figure src="/images/1.7/upgrade-migration/image33.png" >}}

On PrestaShop 1.6:

{{< figure src="/images/1.7/upgrade-migration/image66.png" >}}

### Usage

The configuration page of the module displays some checks and the
options available for an upgrade.

{{< figure src="/images/1.7/upgrade-migration/image61.png" >}}

The first configuration lets you choose what kind of upgrade you want to
run. It is always recommended to stick with the minor / major branches
of the options, as they use some additional information provided by
PrestaShop (md5 checksum, core files to delete...).

{{< figure src="/images/1.7/upgrade-migration/image30.png" >}}

It is always recommended to let the module make its own backup, because
it will allow it to immediately run a rollback if something goes wrong
during the upgrade.

However, if you are confident in the backup you have made and are ready
to rollback manually in case of trouble, you can disable the backup
step.

{{< figure src="/images/1.7/upgrade-migration/image26.png" >}}

Finally, the last options customizing the upgrade process let you keep
any changes you have done to the default theme, mails etc.

{{< figure src="/images/1.7/upgrade-migration/image62.png" >}}

If the configuration chosen and the self-checks are valid, a button
“Upgrade Now” will be available. Clicking immediately start the upgrade.

Note the interface may be unfriendly to you, but it displays as most
information as possible to let you know what happened in case of
trouble. Let the process run until the message “Upgrade successful”
appears. If an error is found, you will be given the choice to rollback.

## Support service

Doing an upgrade by yourself can be risky. If you feel uncomfortable
with doing it on your own, you can leave it to our support team who will
handle the backup and the upgrade to the last **minor** version for you
(1.6 → 1.6, 1.7 → 1.7 etc.).

Basically, the process and the result will be the same. The existing
data on the shop will be kept, as well as your module and your current
theme.

You can [subscribe for the upgrade service on the marketplace](https://addons.prestashop.com/en/support/18689-upgrade-pack-prestashop.html).

Many agencies and freelancers in your area may also provide this kind of
service.
