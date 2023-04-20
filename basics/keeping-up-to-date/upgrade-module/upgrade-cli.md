---
title: Upgrade CLI
weight: 40
aliases:
  - /8/development/upgrade-module/upgrade-cli
---

# Module CLI

The Autoupgrade module is accessible via `cli`. Its advantages is to be used in conjunction with a CI/CD pipeline to automate your upgrade process. 
It can be aswell used manually via regular `cli` to avoid regular configuration limits on Apache or Nginx (`php-cgi`, `php-fpm` limitations such as `memory_limit`, `max_execution_time`, ...). 

## Upgrade CLI

Upgrade module can be used as a Command Line Interface.

### Command line parameters

Entry point is *cli-upgrade.php* from the module's directory.
The following parameters are mandatory:

* **--dir**: Specify the admin directory name

You can also use these parameters:

* **--channel**: Specify the [channel to use]({{< ref "/8/basics/keeping-up-to-date/upgrade-module/channels.md" >}})
* **--action**: Specify the [step you want to start from]({{< ref "/8/basics/keeping-up-to-date/upgrade-module/upgrade-process-steps.md" >}}) (Default: `UpgradeNow`)

If you use default `action` parameter, it will run the full upgrade process.

Example:

```
$ php modules/autoupgrade/cli-upgrade.php --dir=admin-dev --channel=major
```

## Rollback CLI

{{% notice warning %}}
**Important**

It is not recommended to use this option. It's always better to manager your backup manually.
{{% /notice %}} 

If an error occurs during the upgrade process, the rollback will be suggested.
In case you lost the page from your backoffice, note it can be triggered via CLI.

### Command line parameters

Entry point is *cli-rollback.php*.
The following parameters are mandatory:

* **--dir**: Specify the admin directory name
* **--backup**: Specify the backup name to restore (this can be found in your folder `<admin directory>/autoupgrade/backup/`)

Example:

```
$ php cli-rollback.php --dir=admin-dev --backup=V1.7.5.1_20190502-191341-22e883bd
```

## Full example

To upgrade your PrestaShop store to the latest version using the command line interface, follow the steps outlined below. Make sure to execute all commands from the root directory of your PrestaShop installation and replace `admin-dev` with the name of your back office directory.

### Step 1: Uninstall and remove the old autoupgrade module

1. Uninstall the old AutoUpgrade module:

`php bin/console prestashop:module uninstall autoupgrade`

2. Remove the old module's directory:

`rm -rf modules/autoupgrade`

### Step 2: Install the new autoupgrade module

1. Download the latest version of the autoupgrade module and place it in the /modules directory:

`curl -L  https://github.com/PrestaShop/autoupgrade/releases/latest/download/autoupgrade.zip -o modules/autoupgrade.zip && unzip modules/autoupgrade.zip`

2. Install the new version of the autoupgrade module:

`php bin/console prestashop:module install autoupgrade`

### Step 3: Download the latest PrestaShop files

1. Download the latest version of PrestaShop (.zip and .xml files):

`curl -L https://github.com/PrestaShop/PrestaShop/releases/download/8.0.2/prestashop_8.0.2.zip -o admin-dev/autoupgrade/download/prestashop.zip`
`curl -L https://github.com/PrestaShop/PrestaShop/releases/download/8.0.2/prestashop_8.0.2.xml -o admin-dev/autoupgrade/download/prestashop.xml`

### Step 4: Configure the autoupgrade module

1. Create a configuration file for the AutoUpgrade module to use the local archive. Adjust the settings as needed:

`echo "{\"channel\":\"archive\",\"archive_prestashop\":\"prestashop.zip\",\"archive_num\":\"8.0.2\", \"archive_xml\":\"prestashop.xml\", \"PS_AUTOUP_CHANGE_DEFAULT_THEME\":0, \"skip_backup\": 1}" > modules/autoupgrade/config.json`


2. Apply the configuration to the `autoupgrade` module:

`php modules/autoupgrade/cli-updateconfig.php --from=modules/autoupgrade/config.json --dir=admin-dev`

### Step 5: Start the Upgrade Process


1. Initiate the upgrade process:

`php modules/autoupgrade/cli-upgrade.php --dir=admin-dev`

The upgrade process is divided into multiple parts by default. To automate the entire process, use the `testCliProcess.php` script, which runs all the steps automatically:

`php modules/autoupgrade/tests/testCliProcess.php modules/autoupgrade/cli-upgrade.php --dir=admin-dev`

By following these steps, your PrestaShop store should be successfully upgraded to the latest version.