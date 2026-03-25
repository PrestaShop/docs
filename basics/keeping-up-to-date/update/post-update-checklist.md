---
title: Post-update checklist
weight: 50
aliases:
  - /8/development/update/post-update-checklist
---

# Post-update checklist

Below is a list of actions that should be done following a PrestaShop update.

## Main steps

The following steps will be executed during the upgrade:

- **Refresh the page.** You’ll need to sign in to your back office again.
- **Check the Module Manager** and re-enable the modules that have been disabled to prevent any compatibility issue..
- **Make sure your store’s front office is working properly:** try to create an account, place an order, to add a product, etc.
- **Disable the maintenance** mode in General settings > Maintenance.
- **Review the state of your modules:** compatible modules have been updated automatically, while incompatible ones with PrestaShop %version% have been uninstalled.

## Troubleshooting

- If some images don’t appear in the front office, try regenerating thumbnails in Preferences > Images. You should check the images of products, categories…
- If something’s wrong, you can restore a backup with this module. Your backup is available at {admin}/autoupgrade/backup and can be restored either manually or via the [command line interface][1]
- If you can't access your back office, try enabling the debug mode manually in config/defines.inc.php by setting _PS_MODE_DEV_ to true ([see the dedicated documentation][2])

[1]: {{< relref "/8/basics/keeping-up-to-date/update/update-from-the-cli" >}}
[2]: {{< relref "/8/development/configuration/configuring-prestashop#enabling-debug-mode" >}}
