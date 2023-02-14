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

Entry point is *cli-upgrade.php*.
The following parameters are mandatory:

* **--dir**: Specify the admin directory name
* **--channel**: Specify the [channel to use]({{< ref "/8/basics/keeping-up-to-date/upgrade-module/channels.md" >}})
* **--action**: Specify the [step you want to start from]({{< ref "/8/basics/keeping-up-to-date/upgrade-module/upgrade-process-steps.md" >}}) (Default: `UpgradeNow`)

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

* **--dir**: Specify the admin directory name
* **--backup**: Specify the backup name to restore (this can be found in your folder `<admin directory>/autoupgrade/backup/`)

Example:

```
$ php cli-rollback.php --dir=admin-dev --backup=V1.7.5.1_20190502-191341-22e883bd
```
