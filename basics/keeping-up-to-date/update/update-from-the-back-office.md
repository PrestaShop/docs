---
title: Update from the back office
weight: 40
---

# Update from the back office

The Update Assistant module lets you update, backup and restore your PrestaShop store. Formerly known as “1-Click
upgrade”, the technical name of this public module is “Autoupgrade”.

The module can be used in two main ways:

- Through the module web user interface.
- Through the module Command-line ([CLI][1]).

This documentation is meant to guide you through the use of these main assets.

## Module download

The Update Assistant module can be downloaded from various sources:

- From the module page in the Addons Marketplace: <a href="https://addons.prestashop.com/5496-update-assistant.html" target="_blank">link</a>.
- From the Marketplace in the back office of your stores (MBO module): <a href="https://addons.prestashop.com/en/administrative-tools/39574-prestashop-marketplace-in-your-back-office.html" target="_blank">link</a>.
- From the Update Assistant module GitHub repository: <a href="https://github.com/PrestaShop/autoupgrade/releases" target="_blank">link</a>.

## Module installation

Once downloaded, the module can be installed in the same way as all other PrestaShop modules.

![Module manager](../img/module-manager.png)

- From the Module Manager in your back office, by uploading the .zip file of the Update Assistant module you've just downloaded.
- From the Marketplace in your back office, by clicking on the “install” button.

After the installation, click on the “configure” button to access the Update assistant web interface (see next section).

## Module configuration

When you open the module configuration page, two main paths are available to you:

- The “Update your store” path to update your PrestaShop store.
- The “Restore from a backup” path to restore a previous version of your PrestaShop store ( enabled if you have a backup
  of your store).

![Home page](../img/update-assistant-home-page.png)

## Update your store path

By selecting the “Update your store” path, you enter the process of updating your store. This path is divided into 5
main steps: Version choice > Update options > Backup > Update > Post-update.

![Version choice stepper](../img/update-assistant-version-choice-stepper.png)

### Version choice

The step “Version choice”, shows you the updates available for your store. Two update channels are listed at this stage:

- The official “online” update for your store, detected by PrestaShop APIs (major, minor or patch versions). This update
  corresponds to the most recent version of PrestaShop compatible with the PHP version of your server.
- The “local” update, which displays customized updates detected in your `/your-admin-directory/autoupgrade/download`
  folder on your server.

These views are thus adapted to the version of PrestaShop used in your store, to the PHP version of your server, and
therefore reflect possible updates for your store.

![Version choice page](../img/update-assistant-version-choice-page.png)

If you're using the local channel, choose the `.zip` archive and associated `.xml` file to be guided through the update
process. Be sure to choose a `.zip` and `.xml` file with the corresponding PrestaShop version, otherwise you'll get an error message.

The `.xml` must list the contents of the `.zip` file, with the md5 checksum of each file in it. You can download the desired `.zip` and `.xml` files from the [Releases section of PrestaShop’s GitHub repository][prestashop-releases].

![Version choice local channel](../img/update-assistant-version-choice-local-channel.png)

In all cases, when selecting an update channel, a check of the technical prerequisites is performed before proceeding to
the next step:

- Error messages that block access to the next step are displayed with a red cross at the beginning of the line.
- Warning messages, which allow access to the next step, are displayed with an orange warning at the beginning of the
  line.

Please consider these points before proceeding to the next step, as they may affect the stability of your store.

![Check requirements](../img/update-assistant-check-requirements.png)

Once the update channel has been selected and the technical prerequisites checked (non-blocking), you can click on the
“Next” button to access the next step, “Update options”.

### Update options

During this step you can configure the options to be applied to your update.

![Update options page](../img/update-assistant-update-options-page.png)

Here are the available options:

- **Deactivate non-native modules:** this option allows you to deactivate all modules installed after the creation of
  your store and therefore qualified as “non-native”. These modules may cause instabilities with the target version of
  the PrestaShop update, which is why we recommend that you disable them (set to “yes” by default).
- **Regenerate email templates:** this option allows email templates to be regenerated during the update process (set to
  “yes” by default). Be careful, if you have customized email templates, activating this option may cause you to lose
  your modifications.
- **Disable all overrides**: this option allows you to directly disable all class and controller overrides (set to “no”
  by default). Enabling this option helps prevent conflicts arising during and after the update process.

Once the update options have been configured, you can click on the “Next” button to access the next step, “Backup”.

### Backup

During this step, you can choose whether or not to make a backup of your store with the Update Assistant module.
Backing up your store is strongly recommended so that you can restore it to its original state in the event of problems with the update.
It is also important to create a manual backup to ensure a secure update process and have full control over the restoration if needed.

![Backup page](../img/update-assistant-backup-page.png)

The module offers you several options:

- **Complete backup:** Backup your store's files and database, including images (enabled by default). This option is enabled by default in the module interface.
- **Partial backup:** Backup your store's files and database, excluding images.
- **No backup:** Do not perform a backup with the Update Assistant module.

If you activate the backup option with the Update Assistant module, your store backup files will be stored in the `/your-admin-directory/autoupgrade/backup` folder on your server.

![Backup process](../img/update-assistant-backup-process.png)

During this step, you can monitor the progress of the backup process. Dedicated logs and a progress bar ease the follow-up.

If the backup fails, a failure message appears, along with the backup logs. These logs contain warnings and errors that
prevent the backup from running successfully. Once these elements have been corrected, you can restart a backup, or you
can launch an update without performing a backup with the Update Assistant module (in this case, it is imperative to
perform a backup by another means).

Once the backup is complete, a success message is displayed in the interface.

![Backup complete](../img/update-assistant-backup-complete.png)

You can then proceed to the next step by clicking on the “Start update” button. In this case, a modal will appear,
allowing you to confirm, or not, the launch of the update process (see the next section).

### Update

During this step, you can track the progress of the update process. Dedicated logs and a progress bar ease the
follow-up.

![Update process](../img/update-assistant-update-process.png)

If the update fails, a failure message appears, along with the update logs. These logs contain warnings and error
messages that prevent the update from running successfully. If you have made a backup with the Update Assistant module,
you can directly restore your store to its initial state by selecting the desired backup file (see the below “Restore
your store” section). If this is not the case, you will need to refer to your own backup file, created with another solution.

You can also share these error elements with us, using the dedicated form, by clicking on the “Send error report” button.

If the update is successful, you are automatically redirected to the next step, the “Post-update checklist” page (see the next section).

### Post-update checklist

If you've reached this page, it means that the update has been successful. Congratulations, your store is up to date!

![Post update page](../img/update-assistant-post-update-page.png)

On this page you'll find advice on what to do following this update, as well as debugging tips in case of issues.

You can find this list at any time in the PrestaShop developer documentation: [link][2].

You can also download update logs to keep track of any changes made. Logs downloaded from the module's web interface
contain the date and time corresponding to the time zone configured for the store.

When you leave this page by clicking on the “Exit” button, you will be automatically redirected to your PrestaShop cack office login (the page is refreshed).

You'll then be able to log in and benefit from the new features of your PrestaShop update.

## Restore your store path

By selecting the “Restore from a backup” path, you enter the process of restoring your store to a previous version. This path is divided into 3 main steps: Backup selection > Restore > Post-restore.

![Restore stepper](../img/update-assistant-restore-stepper.png)

### Backup selection

The step “Backup selection”, allows you to select the backup file to which you wish to restore your store. Backup files are ordered from most recent to oldest in the dedicated drop-down list.

![Backup selection](../img/update-assistant-backup-selection.png)

You have also the possibility to delete the selected backup file by clicking on the “Delete selection” button.

![Backup delete modal](../img/update-assistant-backup-delete-modal.png)

Once you have selected the desired backup file, you can launch the restore by clicking on the “Start restore” button.
After confirmation, you'll reach the next section, the “Restore” page.

### Restore

During this step, you can monitor the restoration process. Dedicated logs and a progress bar ease the follow-up.

![Restore process](../img/update-assistant-restore-process.png)

If the restore fails, a failure message appears, along with the restore logs. These logs contain warnings and error messages that prevent the restore from running successfully.
You can download these restore logs by clicking on the “Download restore logs” button.

You can share these error elements with us via a dedicated form, by clicking on the “Send error report” button.

You can also directly restart the restoration process by clicking on the “Try again” button.

If restoration is successful, you are automatically redirected to the next step, the “Post-restore checklist” page (see the next section).

### Post-restore checklist

If you've reached this page, it means that the restoration has been successful.

![Post restore page](../img/update-assistant-post-restore-page.png)

On this page, you'll find advice on what to do following restoration, as well as debugging tips in case of issues.

You can find this list at any time in the PrestaShop developer documentation: [link][3].

You can also download the restore logs to keep a record of the changes made.

When you leave this page by clicking on the “Exit” button, you will be automatically redirected to your PrestaShop back office login (the page is refreshed).

You will then be able to log in to access the previous, restored version of your store.

[1]: {{< relref "/1.7/basics/keeping-up-to-date/update/update-from-the-cli" >}}
[2]: {{< relref "/1.7/basics/keeping-up-to-date/update/post-update-checklist" >}}
[3]: {{< relref "/1.7/basics/keeping-up-to-date/update/post-restore-checklist" >}}
[prestashop-releases]: https://github.com/PrestaShop/PrestaShop/releases
