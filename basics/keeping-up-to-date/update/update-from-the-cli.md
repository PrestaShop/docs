---
title: Update from the CLI
weight: 40
aliases:
  - /9/development/update/upgrade-cli
  - /9/basics/keeping-up-to-date/upgrade/upgrade-cli
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
Update Assistant 7.x.x

Usage:
	command [options] [arguments]

Options:
	-h, --help            Display help for the given command. When no command is given display help for the list command
	-q, --quiet           Do not output any message
	-V, --version         Display this application version
		--ansi|--no-ansi  Force (or disable --no-ansi) ANSI output
	-n, --no-interaction  Do not ask any interactive question
	-v|vv|vvv, --verbose  Increase the verbosity of messages: 1 for normal output, 2 for more verbose output and 3 for debug

Available commands:
	completion                 Dump the shell completion script
	help                       Display help for a command
	list                       List commands
backup
	backup:create              Create backup.
	backup:delete              Delete a store backup file.
	backup:list                List all available backups.
	backup:restore             Restore the store to a previous state from a backup file.
update
	update:check-modules       Check module compatibility and updates.
	update:check-new-version   List Prestashop updates available for the store.
	update:check-requirements  Check all prerequisites for an update.
	update:start               Update your store.
```

### List command

This command lists the Update Assistant CLI commands.

Example of list command execution:

```text
$ php bin/console list

Available commands:
	completion                 Dump the shell completion script
	help                       Display help for a command
	list                       List commands
backup
	backup:create              Create backup.
	backup:delete              Delete a store backup file.
	backup:list                List all available backups.
	backup:restore             Restore the store to a previous state from a backup file.
update
	update:check-modules       Check module compatibility and updates.
	update:check-new-version   List Prestashop updates available for the store.
	update:check-requirements  Check all prerequisites for an update.
	update:start               Update your store.
```

### Help command

This command allows you to access the documentation for a particular option. The help command is one of the Symfony
Console component's built-in global options, and is therefore available for all the Update Assistant CLI commands.

Example of help command execution:

```text
$ php bin/console backup:list --help [command]
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
$ php bin/console backup:create --help

Description:
  Create backup.

Usage:
  backup:create [options] [--] <admin-dir>

Arguments:
  admin-dir                                The admin directory name.

Options:
      --config-file-path=CONFIG-FILE-PATH  Configuration file location.
      --include-images=INCLUDE-IMAGES      Include, or not, images in the store backup.
  -h, --help                               Display help for the given command. When no command is given display help for the list command
  -q, --quiet                              Do not output any message
  -V, --version                            Display this application version
      --ansi|--no-ansi                     Force (or disable --no-ansi) ANSI output
  -n, --no-interaction                     Do not ask any interactive question
  -v|vv|vvv, --verbose                     Increase the verbosity of messages: 1 for normal output, 2 for more verbose output and 3 for debug

Help:
  This command triggers the creation of the files and database backup.
```

The `<admin-dir>` argument is mandatory and is used to target the correct resource.

The optional `--include-images=[1|0]` option allows you to include, or not, the image backup during the backup process.
By default, if the option is not set, images are included in the backup.

The optional `--from-config-file=CONFIG-FILE-PATH` option allows you to use the backup options specified in the configuration file.
You must specify the location (`--from-config-file=.../folder1/configfile`) of this `CONFIG-FILE-PATH` file.

Example of `backup:create` command execution:

```text
$ php bin/console backup:create admin123 --include-images=1
Your files, database, and images will be backed up.
Starting backup...
```

### backup:list command

The `backup:list` command lists the backups available for your PrestaShop store.

```text
$ php bin/console backup:list --help

Description:
  List all available backups.

Usage:
  backup:list <admin-dir>

Arguments:
  admin-dir             The admin directory name.

Options:
  -h, --help            Display help for the given command. When no command is given display help for the list command
  -q, --quiet           Do not output any message
  -V, --version         Display this application version
      --ansi|--no-ansi  Force (or disable --no-ansi) ANSI output
  -n, --no-interaction  Do not ask any interactive question
  -v|vv|vvv, --verbose  Increase the verbosity of messages: 1 for normal output, 2 for more verbose output and 3 for debug

Help:
  This command list all available backups for the store.
```

The `<admin-dir>` argument is mandatory and is used to target the correct resource.

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
$ php bin/console backup:restore --help

Description:
  Restore the store to a previous state from a backup file.

Usage:
  backup:restore [options] [--] <admin-dir>

Arguments:
  admin-dir             The admin directory name.

Options:
      --backup=BACKUP   Specify the backup name to restore (this can be found in your folder <admin directory>/autoupgrade/backup/)
  -h, --help            Display help for the given command. When no command is given display help for the list command
  -q, --quiet           Do not output any message
  -V, --version         Display this application version
      --ansi|--no-ansi  Force (or disable --no-ansi) ANSI output
  -n, --no-interaction  Do not ask any interactive question
  -v|vv|vvv, --verbose  Increase the verbosity of messages: 1 for normal output, 2 for more verbose output and 3 for debug

Help:
  This command allows you to restore the store to a previous state from a backup file.See https://devdocs.prestashop-project.org/9/basics/keeping-up-to-date/upgrade-module/upgrade-cli/#rollback-cli for more details
```

The `<admin-dir>` argument is mandatory and is used to target the correct resource.

The `[BACKUP]` argument is intended to target the backup file (file_name) to be used for the store restore.

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
$ php bin/console backup:delete --help

Description:
  Delete a store backup file.

Usage:
  backup:delete [options] [--] <admin-dir>

Arguments:
  admin-dir             The admin directory name.

Options:
      --backup=BACKUP   Specify the backup name to delete. The allowed values can be found with backup:list command)
  -h, --help            Display help for the given command. When no command is given display help for the list command
  -q, --quiet           Do not output any message
  -V, --version         Display this application version
      --ansi|--no-ansi  Force (or disable --no-ansi) ANSI output
  -n, --no-interaction  Do not ask any interactive question
  -v|vv|vvv, --verbose  Increase the verbosity of messages: 1 for normal output, 2 for more verbose output and 3 for debug

Help:
  This command allows you to delete a store backup file.
```

The `<admin-dir>` argument is mandatory and is used to target the correct resource.

The `[BACKUP]` argument is intended to target the backup file (file_name) to be deleted.

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

The Update Assistant CLI includes 4 commands dedicated to updates:

- `update:check-new-version`
- `update:check-requirements`
- `update:check-modules`
- `update:start`

### update:check-new-version command

The `update:check-new-version` command is used to check whether new updates are available for your store.

```text
$ php bin/console update:check-new-version --help

Description:
  List Prestashop updates available for the store.

Usage:
  update:check-new-version <admin-dir>

Arguments:
  admin-dir             The admin directory name.

Options:
  -h, --help            Display help for the given command. When no command is given display help for the list command
  -q, --quiet           Do not output any message
  -V, --version         Display this application version
      --ansi|--no-ansi  Force (or disable --no-ansi) ANSI output
  -n, --no-interaction  Do not ask any interactive question
  -v|vv|vvv, --verbose  Increase the verbosity of messages: 1 for normal output, 2 for more verbose output and 3 for debug

Help:
  This command allows you to list Prestashop updates available for the store.
```

The `<admin-dir>` argument is mandatory and is used to target the correct resource.

Example of the `update:check-new-version` command execution:

```text
$ php bin/console update:check-new-version admin123
+---------+--------------------+-------+--------------------------------------------------------------------------------------+
| Version | Channel            | Type  | Information                                                                          |
+---------+--------------------+-------+--------------------------------------------------------------------------------------+
| 8.2.3   | online_recommended | minor | https://build.prestashop-project.org/news/2025/prestashop-8-2-3-security-release/    |
| 9.0.1   | online             | major | https://build.prestashop-project.org/news/2025/prestashop-9-0-1-maintenance-release/ |
| 9.0.0   | local              | major | Zip: 2024-10-17-develop-prestashop_9_0_0.zip                                         |
|         |                    |       | Xml: prestashop_9.0.0.xml                                                            |
| 8.1.1   | local              | patch | Zip: 8_1_1.zip                                                                       |
|         |                    |       | Xml: 8.1.1-2.xml, 8.1.1.xml                                                          |
+---------+--------------------+-------+--------------------------------------------------------------------------------------+
```

#### Understanding the Channel column

The **Channel** column indicates the source and type of the available update:

- **`online_recommended`**: The recommended update for your store, detected by PrestaShop APIs (major, minor or patch versions). This update corresponds to the most stable and well-tested version of PrestaShop compatible with the PHP version of your server. The recommended version represents the safest upgrade path for your store.
- **`online`**: The latest update available for your store, which corresponds to the most recent version of PrestaShop compatible with the PHP version of your server. This version may differ from the recommended version.
- **`local`**: Customized updates detected in your `/your-admin-directory/autoupgrade/download` folder on your server.

#### Update scenarios

Depending on the current state of PrestaShop releases, the command output may show:

- Both a **recommended version** (channel `online_recommended`) and a **latest version** (channel `online`) when they differ.
- Only one online version (channel `online_recommended`) when the recommended version is also the latest.
- Only the latest version (channel `online`) when no specific version is marked as recommended.
- Local versions (channel `local`) in addition to online versions, if custom update files are detected on your server.

### update:check-requirements command

The `update:check-requirements` command is used to check that your store meets the technical requirements before updating.

```text
$ php bin/console update:check-requirements --help

Description:
  Check all prerequisites for an update.

Usage:
  update:check-requirements [options] [--] <admin-dir>

Arguments:
  admin-dir                                The admin directory name.

Options:
      --config-file-path=CONFIG-FILE-PATH  Configuration file location for update.
      --channel=CHANNEL                    Selects what update to run ('local' / 'online_recommended' / 'online')
      --zip=ZIP                            Sets the archive zip file for a local update.
      --xml=XML                            Sets the archive xml file for a local update.
  -h, --help                               Display help for the given command. When no command is given display help for the list command
  -q, --quiet                              Do not output any message
  -V, --version                            Display this application version
      --ansi|--no-ansi                     Force (or disable --no-ansi) ANSI output
  -n, --no-interaction                     Do not ask any interactive question
  -v|vv|vvv, --verbose                     Increase the verbosity of messages: 1 for normal output, 2 for more verbose output and 3 for debug

Help:
  This command allows you to check the prerequisites necessary for the proper functioning of an update.
```

The `<admin-dir>` argument is mandatory and is used to target the correct resource.

The `--from-config-file=CONFIG-FILE-PATH` option is used to check prerequisites based on information provided in the configuration file. You must specify the location (`--from-config-file=.../folder1/configfile`) of this `CONFIG-FILE-PATH` file.

The `--zip=ZIP` and `--xml=XML` options allow you to specify a `.zip` file and an `.xml` file to be used to check prerequisites from the “local” source. The “local” update, which displays customized updates detected in your `/your-admin-directory/autoupgrade/download` folder on your server.
You can download the desired `.zip` and `.xml` files from the [Releases section of PrestaShop’s GitHub repository][prestashop-releases].

By default, if no option is set, the prerequisites will be checked from the “online_recommended” source. The official “online_recommended” update for your store, detected by PrestaShop APIs (major, minor or patch versions). This update corresponds to the most recent and stable version of PrestaShop compatible with the current store installation.

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

### update:check-modules command

The `update:check-modules` command is used to check that the modules installed on the store are compatible with the new version of PrestaShop. The command `update:check-requirements` will invite you to run it when it finds a module that requires attention.

```text
$ bin/console update:check-modules admin-dev --help

Description:
  Check module compatibility and updates.

Usage:
  update:check-modules [options] [--] <admin-dir>

Arguments:
  admin-dir                                Name of the admin directory.

Options:
      --config-file-path=CONFIG-FILE-PATH  Configuration file location for update.
      --channel=CHANNEL                    Select which update channel to use ('local' / 'online_recommended' / 'online')
      --zip=ZIP                            Sets the archive zip file for a local channel.
      --xml=XML                            Sets the archive xml file for a local update.
  -h, --help                               Display help for the given command. When no command is given display help for the list command
  -q, --quiet                              Do not output any message
  -V, --version                            Display this application version
      --ansi|--no-ansi                     Force (or disable --no-ansi) ANSI output
  -n, --no-interaction                     Do not ask any interactive question
  -v|vv|vvv, --verbose                     Increase the verbosity of messages: 1 for normal output, 2 for more verbose output and 3 for debug

Help:
  This command checks the installed modules for compatibility with the target PrestaShop version and lists available updates.
```

The `<admin-dir>` argument is mandatory and is used to target the correct resource.

The `--from-config-file=CONFIG-FILE-PATH` option is used to check prerequisites based on information provided in the configuration file. You must specify the location (`--from-config-file=.../folder1/configfile`) of this `CONFIG-FILE-PATH` file.

The `--zip=ZIP` and `--xml=XML` options allow you to specify a `.zip` file and an `.xml` file to be used to check prerequisites from the “local” source. The “local” update, which displays customized updates detected in your `/your-admin-directory/autoupgrade/download` folder on your server.
You can download the desired `.zip` and `.xml` files from the [Releases section of PrestaShop’s GitHub repository][prestashop-releases].

By default, if no option is set, the prerequisites will be checked from the “online_recommended” source. The official “online_recommended” update for your store, detected by PrestaShop APIs (major, minor or patch versions). This update corresponds to the most recent and stable version of PrestaShop compatible with the current store installation.

Example of execution of the `update:check-modules` command, if all modules are compatible:

```text
$ php bin/console update:check-modules admin-dev
Prestashop version: 8.2.4
 Retrieving modules informations, please wait...
 Retrieving modules informations: Done.

✔ There is no action needed on the installed modules for this update.
```

Example of execution of the `update:check-modules` command, if some modules require attention:

```text
$ php bin/console update:check-modules admin-dev
Prestashop version: 8.2.4
 Retrieving modules informations, please wait...
 Retrieving modules informations: Done.

	✘ 5 incompatible modules
	  These modules are known to be incompatible with PrestaShop 8.2.4. They will be uninstalled before updating the store:
		contactform
		psgdpr
		ps_edition_basic
		ps_themecusto
		statsdata
	⚠ 1 uncertain modules
	  The compatibility of the following modules with the destination version of PrestaShop cannot be checked. It could be because they are homemade or have been unlisted from the Marketplace. Please review them via the Module Manager:
		gamification
```

### update:start command

The `update:start` command is used to update your PrestaShop store.

```text
$ php bin/console update:start --help

Description:
  Update your store.

Usage:
  update:start [options] [--] <admin-dir>

Arguments:
  admin-dir                                                    The admin directory name.

Options:
      --chain                                                  True by default. Allows you to chain update commands automatically. The command will continue executing subsequent tasks without requiring manual intervention to restart the process.
      --no-chain                                               Prevents chaining of update commands. The command will execute a task and then stop, logging the next command that needs to be run. You will need to manually restart the process to continue with the next step.
      --channel=CHANNEL                                        Selects what update to run ('local' / 'online_recommended' / 'online')
      --zip=ZIP                                                Sets the archive zip file for a local update
      --xml=XML                                                Sets the archive xml file for a local update
      --disable-non-native-modules=DISABLE-NON-NATIVE-MODULES  Disable all modules installed after the store creation (1 for yes, 0 for no). Ignored for PrestaShop v9 and above.
      --regenerate-email-templates=REGENERATE-EMAIL-TEMPLATES  Regenerate email templates. If you've customized email templates, your changes will be lost if you activate this option (1 for yes, 0 for no)
      --disable-all-overrides=DISABLE-ALL-OVERRIDES            Overriding is a way to replace business behaviors (class files and controller files) to target only one method or as many as you need. This option disables all classes & controllers overrides, allowing you to avoid conflicts during and after updates (1 for yes, 0 for no)
      --config-file-path=CONFIG-FILE-PATH                      Configuration file location for update.
      --action=ACTION                                          Advanced users only. Sets the step you want to start from. Only the "UpdateInitialization" task updates the configuration. (Default: UpdateInitialization, see https://devdocs.prestashop-project.org/9/basics/keeping-up-to-date/update/update-from-the-cli for other values available)
  -h, --help                                                   Display help for the given command. When no command is given display help for the list command
  -q, --quiet                                                  Do not output any message
  -V, --version                                                Display this application version
      --ansi|--no-ansi                                         Force (or disable --no-ansi) ANSI output
  -n, --no-interaction                                         Do not ask any interactive question
  -v|vv|vvv, --verbose                                         Increase the verbosity of messages: 1 for normal output, 2 for more verbose output and 3 for debug

Help:
  This command allows you to start the update process. Advanced users can refer to the https://devdocs.prestashop-project.org/9/basics/keeping-up-to-date/update/update-from-the-cli for further details on available actions
```

The `<admin-dir>` argument is mandatory and is used to target the correct resource.

The `--from-config-file=CONFIG-FILE-PATH` option is used to update from the information provided in the configuration file.
You must specify the location (`--from-config-file=.../folder1/configfile`) of this `CONFIG-FILE-PATH` file.

The `--zip=ZIP` and `--xml=XML` options allow you to specify a .zip file and an .xml file to be used for a “local” update. 
The “local” update, which displays customized updates detected in your `/your-admin-directory/autoupgrade/download` folder on your server.

By default, if no option is set, the prerequisites will be checked from the “online_recommended” source. The official “online_recommended” update for your store, detected by PrestaShop APIs (major, minor or patch versions). This update corresponds to the most recent and stable version of PrestaShop compatible with the current store installation.

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
