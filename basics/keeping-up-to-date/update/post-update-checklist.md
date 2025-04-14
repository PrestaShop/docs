---
title: Post-update checklist
weight: 40
aliases:
  - /1.7/development/update/post-update-checklist
---

# Post-update checklist

Below is a list of actions that should be done following a PrestaShop update.

## Main steps

The following steps will be executed during the upgrade:

- **Refresh the page.** You’ll need to sign in to your back office again.
- **Re-enable and check your modules** one by one.
- **Make sure your store’s front office is working properly:** try to create an account, place an order, to add a product, etc.
- **Disable the maintenance** mode in General settings > Maintenance.
- **Check the Module Manager** to discover and install the modules extracted on your server during the update process.

## Troubleshooting

- If some images don’t appear in the front office, try regenerating thumbnails in Preferences > Images. You should check the images of products, categories…
- If something’s wrong, you can restore a backup with this module. Your backup is available at {admin}/autoupgrade/backup and can be restored either manually or via the [command line interface][1]
- If you can't access your back office, try enabling the debug mode manually in config/defines.inc.php by setting _PS_MODE_DEV_ to true

[1]: {{< relref "/1.7/basics/keeping-up-to-date/update/update-from-the-cli" >}}
