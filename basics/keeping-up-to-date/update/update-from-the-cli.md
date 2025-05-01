---
title: Update from the CLI
weight: 40
aliases:
  - /1.7/development/update/upgrade-cli
  - /1.7/basics/keeping-up-to-date/upgrade/upgrade-cli
---

# Update from the Command-Line

The Update Assistant module is available through the Command-Line Interface (CLI). Its main advantage is its ability to
integrate seamlessly with a CI/CD pipeline, enabling the automation of update, backup, and restore processes.
Additionally, it can be executed manually through the CLI to bypass common configuration constraints on Apache or Nginx,
such as `php-cgi` and `php-fpm` limitations (e.g., `memory_limit`, `max_execution_time`, etc.).

## Introduction to the Update Assistant CLI

The CLI interface is a unified tool that provides a consistent interface for interacting with all Update Assistant
module services.

To use this CLI, the Update Assistant module must be present in the `/modules` folder on your PrestaShop store server.
It is not necessary to have installed the module in order to use the associated CLI.

The CLI of the Update Assistant module is based on the Symfony console, and therefore follows the main principles of
this technology.

Below you'll find the Update Assistant CLI user guide, with descriptions, syntax and examples of use. All the commands are run from the module in the folder `modules/autoupgrade` of your store and must not be mistaken with the `bin/console` of PrestaShop.

## Generic commands

The `bin/console` file acts as the entry point to the Update Assistant Command-Line interface. When run without any
parameters, it displays the available commands and associated general options.

Example of `bin/console` command execution:

```text
$ php bin/console 

Usage:
	command [options] [arguments]
	
Options:
	-h, --help                            Display this help message
	-q, --quiet                           Do not output any message
	-V, --version                         Display this application version
	--ansi                                Force ANSI output
	--no-ansi                             Disable ANSI output
	-n, --no-interaction                  Do not ask any interactive question
	-v|vv|vvv, --verbose                  Increase the verbosity of messages: 1 for normal output, 2 for more verbose output and 3 for debug

Available commands:
	help                                  Displays help for a command
	list                                  List commands
backup
	backup:create                         Create backup.
	backup:list                           List existing backups.
	backup:restore                        Restore your store.
	backup:delete                         Remove a backup not anymore needed.
update
	update:check-new-version              Display the version the store can update to.
	update:check-requirements             Check all prerequisites for an update.
	update:start                          Update your store.
```

### List command

This command lists the Update Assistant CLI commands.

Example of list command execution:

```text
$ php bin/console list

Available commands:
	help                                  Displays help for a command
	list                                  List commands
backup
	backup:create                         Create backup.
	backup:list                           List existing backups.
	backup:restore                        Restore your store.
	backup:delete                         Remove a backup not anymore needed.
update
	update:check-new-version              Display the version the store can update to.
	update:check-requirements             Check all prerequisites for an update.
	update:start                          Update your store.
```

### Help command

This command allows you to access the documentation for a particular option. The help command is one of the Symfony
Console component's built-in global options, and is therefore available for all the Update Assistant CLI commands.

Example of help command execution:

```text
$ php bin/console backup:list help [command]
```

### Command-Line logs download

You can download backup, update and restore logs to keep track of any changes you made. These logs in
`yyyy-dd-mm-hhmmss-process.txt` format are available in the following folder on your PrestaShop store server:
`/your-admin-directory/autoupgrade/logs`. These CLI logs contain the date and time that correspond to the time zone
configured on your store server.

## Backup and Restore commands

The Update Assistant CLI includes 4 commands dedicated to backup management:

- `backup:create`
- `backup:list`
- `backup:restore`
- `backup:delete`

### backup:create command

The `backup:create` command is used to create a backup of your PrestaShop store. These backup files are stored in the
`/your-admin-directory/autoupgrade/backup` folder on your server.

```text
$ php bin/console backup:create help

backup:create: create a PrestaShop store backup

Usage: backup:create [ADMIN_DIR] 
with [ADMIN_DIR] the PrestaShop admin directory
--from-config-file=[config-path]: the update config file path
--include-images=[1|0]: include, or not, images in the store backup (1 for yes, 0 for no)
--verbose: sets the verbosity level (e.g. 1 the default, 2 and 3, or you can use respective shortcuts -v, -vv and -vvv)
--quiet: disables output and interaction
--no-interaction: disables interaction
--version: displays the application version
--help: displays the command help
--ansi|--no-ansi: whether to force of disable coloring the output
```

The `[ADMIN_DIR]` argument is mandatory and is used to target the correct resource.

The optional `--include-images=[1|0]` option allows you to include, or not, the image backup during the backup process.
By default, if the option is not set, images are included in the backup.

The optional `--from-config-file=[config-path]` option allows you to use the backup options specified in the configuration file.
You must specify the location (`--from-config-file=.../folder1/configfile`) of this `[config-path]` file.

Example of `backup:create` command execution:

```text
$ php bin/console backup:create admin123 --include-images=1
Your files, database, and images will be backed up.
Starting backup...
```

### backup:list command

The `backup:list` command lists the backups available for your PrestaShop store.

```text
$ php bin/console backup:list help

backup:list: list all available backups for the store

Usage: backup:list [ADMIN_DIR] 
with [ADMIN_DIR] the PrestaShop admin directory
--verbose: sets the verbosity level (e.g. 1 the default, 2 and 3, or you can use respective shortcuts -v, -vv and -vvv)
--quiet: disables output and interaction
--no-interaction: disables interaction
--version: displays the application version
--help: displays the command help
--ansi|--no-ansi: whether to force of disable coloring the output
```

The `[ADMIN_DIR]` argument is mandatory and is used to target the correct resource.

Example of the `backup:list` command execution:

```text
$ php bin/console backup:list admin123
------------------+---------------+-----------------------------------------+
| Date            | Version       | File name                               |
+-----------------+---------------+-----------------------------------------+
| 15/07/2024 8:00 | 8.1.6         | autoupgrade_save_8.1.6_15/07/2024_8:00  |
| 14/07/2024 8:00 | 8.1.5         | autoupgrade_save_8.1.5_14/07/2024_8:00  |
```

### backup:restore command

The `backup:restore` command is used to restore your PrestaShop store from backup files in the `/your-admin-directory/autoupgrade/backup` folder on your server.

```text
$ php bin/console backup:restore help

backup:restore: restore the store to a previous state from a backup file

Usage: backup:restore [ADMIN_DIR][BACKUP_NAME]
with [ADMIN_DIR][BACKUP_NAME] the PrestaShop admin directory and the name of the backup file you want to restore
--verbose: sets the verbosity level (e.g. 1 the default, 2 and 3, or you can use respective shortcuts -v, -vv and -vvv)
--quiet: disables output and interaction
--no-interaction: disables interaction
--version: displays the application version
--help: displays the command help
--ansi|--no-ansi: whether to force of disable coloring the output
```

The `[ADMIN_DIR]` argument is mandatory and is used to target the correct resource.

The `[BACKUP_NAME]` argument is intended to target the backup file (file_name) to be used for the store restore.

Example of `backup:restore` command execution:

```text
$ php bin/console backup:restore admin123 autoupgrade_save_8.1.6_15/07/2024_8:00
The restoration of your store is complete
```

This command also supports the “interactive mode”, which provides you with a contextual action, such as:

```text
$ php bin/console backup:restore admin123
Please select your backup:
	[0] Date: 12/19/24 10:48:43, Version: 8.1.5, File name: V8.1.5_20241219-104843-XXX
	[1] Date: 12/19/24 09:44:50, Version: 8.1.5, File name: V8.1.5_20241219-094450-XXX
	[2] Exit the process
```

### backup:delete command

The `backup:delete` command is used to delete a backup file from your PrestaShop store.

```text
$ php bin/console backup:delete help

backup:delete: delete a store backup file

Usage: backup:delete [ADMIN_DIR] [BACKUP_NAME]
with [ADMIN_DIR] [BACKUP_NAME] the PrestaShop admin directory and the name of the backup file you want to delete
--verbose: sets the verbosity level (e.g. 1 the default, 2 and 3, or you can use respective shortcuts -v, -vv and -vvv)
--quiet: disables output and interaction
--no-interaction: disables interaction
--version: displays the application version
--help: displays the command help
--ansi|--no-ansi: whether to force of disable coloring the output
```

The `[ADMIN_DIR]` argument is mandatory and is used to target the correct resource.

The `[BACKUP_NAME]` argument is intended to target the backup file (file_name) to be deleted.

Example of `backup:delete` command execution:

```text
$ php bin/console backup:delete admin123 autoupgrade_save_8.1.6_15/07/2024_8:00
The backup file has been successfully deleted
```

This command also supports the “interactive mode”, which provides you with a contextual action, such as:

```text
$ php bin/console backup:delete admin123
Please select your backup:
	[0] Date: 12/19/24 10:48:43, Version: 8.1.5, File name: V8.1.5_20241219-104843-XXX
	[1] Date: 12/19/24 09:44:50, Version: 8.1.5, File name: V8.1.5_20241219-094450-XXX
	[2] Exit the process
```

## Update commands

The Update Assistant CLI includes 3 commands dedicated to updates:

- `update:check-new-version`
- `update:check-requirements`
- `update:start`

### update:check-new-version command

The `update:check-new-version` command is used to check whether new updates are available for your store.

```text
$ php bin/console update:check-new-version help

update:check-new-version: list PrestaShop updates available for the store

Usage: update:check-new-version [ADMIN_DIR]
with [ADMIN_DIR] the PrestaShop admin directory
--verbose: sets the verbosity level (e.g. 1 the default, 2 and 3, or you can use respective shortcuts -v, -vv and -vvv)
--quiet: disables output and interaction
--no-interaction: disables interaction
--version: displays the application version
--help: displays the command help
--ansi|--no-ansi: whether to force of disable coloring the output
```

The `[ADMIN_DIR]` argument is mandatory and is used to target the correct resource.

Example of the `update:check-new-version` command execution:

```text
$ php bin/console update:check-new-version admin123
-----------+----------+-------+---------------------------------------------------------------------------+
| Version  | Channel  | Type  | Information                                                               |
+----------+----------+-------+---------------------------------------------------------------------------+
| 8.2.0    | online   | minor | https://build.prestashop-project.org/news/2024/prestashop-8-2-0-available/|
| 9.0.0    | local    | major | Zip: 2024-10-17-develop-prestashop_9_0_0.zip                              |
|          |          |       | Xml: prestashop_9.0.0.xml                                                 |
| 8.1.0    | local    | patch | Zip: 8_1_0.zip                                                            |
|          |          |       | Xml: 8.1.0-2.xml, 8.1.0.xml                                               |
```

- The official “online” update for your store, detected by PrestaShop APIs (major, minor or patch versions). This update corresponds to the most recent version of PrestaShop compatible with the PHP version of your server.
- The “local” update, which displays customized updates detected in your `/your-admin-directory/autoupgrade/download` folder on your server.

### update:check-requirements command

The `update:check-requirements` command is used to check that your store meets the technical requirements before updating.

```text
$ php bin/console update:check-requirements help

update:check-requirements: check if the store is compatible with the update requirements.

Usage: update:check-requirements [ADMIN_DIR]
with [ADMIN_DIR] the PrestaShop admin directory
--from-config-file=[config-path]: the update config file path
--zip=[name]: sets the archive zip file for a local update
--xml=[name]: sets the  archive xml file for a local update
--verbose: sets the verbosity level (e.g. 1 the default, 2 and 3, or you can use respective shortcuts -v, -vv and -vvv)
--quiet: disables output and interaction
--no-interaction: disables interaction
--version: displays the application version
--help: displays the command help
--ansi|--no-ansi: whether to force of disable coloring the output
```

The `[ADMIN_DIR]` argument is mandatory and is used to target the correct resource.

The `--from-config-file=[config-path]` option is used to check prerequisites based on information provided in the
configuration file. You must specify the location (`--from-config-file=.../folder1/configfile`) of this `[config-path]`
file.

The `--zip=[name]` and `--xml=[name]` options allow you to specify a `.zip` file and an `.xml` file to be used to check prerequisites from the “local” source. The “local” update, which displays customized updates detected in your `/your-admin-directory/autoupgrade/download` folder on your server.
You can download the desired `.zip` and `.xml` files from the [Releases section of PrestaShop’s GitHub repository][prestashop-releases].

By default, if no option is set, the prerequisites will be checked from the “online” source. The official “online” update for your store, detected by PrestaShop APIs (major, minor or patch versions). This update corresponds to the most recent version of PrestaShop compatible with the PHP version of your server.

Example of execution of the `update:check-requirements` command, if all prerequisites have been successfully met:

```text
$ php bin/console update:check-requirements admin123
Checking requirements...
✓ The requirements check is complete, you can update your store to this version of PrestaShop.
```

Example of execution of the `update:check-requirements` command, if some prerequisites are not met:

```text
$ php bin/console update:check-requirements admin123
Checking requirements...
X PHP's "Safe mode" needs to be disabled.
X Maintenance mode needs to be enabled. Enable maintenance mode and add your maintenance IP in Shop parameters > General > Maintenance.
⚠ Your current version of the module is out of date. Update now Modules > Module Manager > Updates
```

### update:start command

The `update:start` command is used to update your PrestaShop store.

```text
$ php bin/console update:start help

update:start: launch a store update.

Usage: update:start [ADMIN_DIR]
with [ADMIN_DIR] the PrestaShop admin directory
--from-config-file=[config-path]: the update config file path
--zip=[name] : sets the archive zip file for a local update
--xml=[name] : sets the archive xml file for a local update
--disable-non-native-modules=[1|0]: disable all modules installed after the store creation  (1 for yes, 0 for no)
--regenerate-email-templates=[1|0]: regenerate email templates. If you've customized email templates, your changes will be lost if you activate this option  (1 for yes, 0 for no)
--disable-all-overrides=[1|0]: overriding is a way to replace business behaviors (class files and controller files) to target only one method or as many as you need. This option disables all classes & controllers overrides, allowing you to avoid conflicts during and after updates  (1 for yes, 0 for no)
--verbose: sets the verbosity level (e.g. 1 the default, 2 and 3, or you can use respective shortcuts -v, -vv and -vvv)
--quiet: disables output and interaction
--no-interaction: disables interaction
--version: displays the application version
--help: displays the command help
--ansi|--no-ansi: whether to force of disable coloring the output
--action:[step]: Specify the step you want to start from (Default: UpgradeNow)
--chain: Enables to sequence update steps
--no-chain: Prevents chaining of update steps to keep the control
```

The `[ADMIN_DIR]` argument is mandatory and is used to target the correct resource.

The `--from-config-file=[config-path]` option is used to update from the information provided in the configuration file.
You must specify the location (`--from-config-file=.../folder1/configfile`) of this `[config-path]` file.

The `--zip=[name]` and `--xml=[name]` options allow you to specify a .zip file and an .xml file to be used for a “local” update. 
The “local” update, which displays customized updates detected in your `/your-admin-directory/autoupgrade/download` folder on your server.

By default, if no option is set, the update will be performed from the “online” source. The official “online” update for your store, detected by PrestaShop APIs (major, minor or patch versions).
This update corresponds to the most recent version of PrestaShop compatible with the PHP version of your server.
Example of `update:start` command execution:

```text
$ php bin/console update:start admin123
Starting update...
Destination version: 9.0.0
Downloading step has been skipped, upgrade process will now unzip the local archive.
Store deactivated. Extracting files...
...
Store updated to 9.0.0. Congratulations! You can now reactivate your store.
```

[prestashop-releases]: https://github.com/PrestaShop/PrestaShop/releases
