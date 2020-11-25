---
menuTitle: Use the Upgrade Assistant
title: How to use the Upgrade Assistant
weight: 40
---

# How to upgrade PrestaShop using the Upgrade Assistant

Also known as the "Autoupgrade module" or the "1-click upgrade module", PrestaShop upgrade assistant aims to automatize the upgrade process.

It is provided for free on the marketplace and your shop administration panel. It executes the [upgrade process]({{< ref "/1.7/basics/keeping-up-to-date/upgrade.md" >}}) automatically, and is available for almost all versions of PrestaShop.

{{% notice note %}}
The same note as above, in order to have this module working you must have set in `/app/config/parameters.php` database account with full privileges.
{{% /notice %}}

{{% notice note %}}
The latest versions of this module allow updates from PS 1.6 to PS 1.7 only.
{{% /notice %}}

### Note about version +4.0.0

This module has been reworked internally for PrestaShop 1.6 & 1.7.

Technical details about this major version can be found on a [specific document (Google docs)](https://docs.google.com/document/d/1DQMP6bg5_fgbJQScdidCQCEmAi4MzRgYNhdGVcYOqm4/edit#heading=h.sn6tqvhtvo8p).

## Download / Installation

- Download from the marketplace: https://addons.prestashop.com/en/data-migration-backup/5496-.html

Then, import your module archive on the modules page. To do so, you can find the button “Upload a module” (PrestaShop 1.7) or “Add a module”
(PrestaShop 1.6) at the top right of the page. Clicking on it will open a form that will allow you to upload your module zip.

On PrestaShop 1.7:

{{< figure src="/images/1.7/upgrade-migration/image70.png" >}}

On PrestaShop 1.6:

{{< figure src="/images/1.7/upgrade-migration/image79.png" >}}

- From the administration panel

On PrestaShop 1.7:

{{< figure src="/images/1.7/upgrade-migration/image33.png" >}}

On PrestaShop 1.6:

{{< figure src="/images/1.7/upgrade-migration/image66.png" >}}

## Usage

The configuration page of the module displays some checks and the
options available for an upgrade.

{{< figure src="/images/1.7/upgrade-migration/image61.png" >}}

The first configuration lets you choose what kind of upgrade you want to run. It is always recommended to stick with the minor / major branches of the options, as they use some additional information provided by PrestaShop (md5 checksum, core files to delete...).

{{< figure src="/images/1.7/upgrade-migration/image30.png" >}}

It is always recommended to let the module make its own backup, because it will allow it to immediately run a rollback if something goes wrong during the upgrade.

However, if you are confident in the backup you have made and are ready to rollback manually in case of trouble, you can disable the backup step.

{{< figure src="/images/1.7/upgrade-migration/image26.png" >}}

Finally, the last options customizing the upgrade process let you keep any changes you have done to the default theme, mails etc.

{{< figure src="/images/1.7/upgrade-migration/image62.png" >}}

If the configuration chosen and the self-checks are valid, a button “Upgrade Now” will be available. Clicking immediately start the upgrade.

Note the interface may be unfriendly to you, but it displays as much information as possible to let you know what happened in case of trouble. Let the process run until the message “Upgrade successful” appears.

If an error is found, you will be given the choice to rollback.
