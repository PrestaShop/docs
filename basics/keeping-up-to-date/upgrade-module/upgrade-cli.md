---
title: Upgrade CLI
weight: 40
aliases:
  - /8/development/upgrade-module/upgrade-cli
---

# Module CLI

## Upgrade CLI

Upgrade module can be used as a Command Line Interface.

### Command line parameters

Entry point is *cli-upgrade.php*.
The following parameters are mandatory:

* **--dir**: Tells where the admin directory is
* **--channel**: Selects what upgrade to run (minor, major etc.)
* **--action**: Sets the step you want to start from (Default: `UpgradeNow`)

If you use default `action` parameter, it will run the full upgrade process.

Example:

```
$ php cli-upgrade.php --dir=admin-dev --channel=major
```

## Rollback CLI

If an error occurs during the upgrade process, the rollback will be suggested.
In case you lost the page from your backoffice, note it can be triggered via CLI.

### Command line parameters

Entry point is *cli-rollback.php*.
The following parameters are mandatory:

* **--dir**: Tells where the admin directory is.
* **--backup**: Select the backup to restore (this can be found in your folder `<admin directory>/autoupgrade/backup/`)

Example:

```
$ php cli-rollback.php  --dir=admin-dev --backup=V1.7.5.1_20190502-191341-22e883bd
```
