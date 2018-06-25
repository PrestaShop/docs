---
title: Exporting your theme
---

# Exporting your theme

## Creating a valid zip file

There is no longer any theme data in the database with PrestaShop 1.7. Hence a theme is installed as soon as
it's on the disk.

If you want to theme to appears in the backoffice, it's simply have to contain a `config/theme.yml` file.
This will only display it, if you want to select it as your active theme, it has to be valid. Read :doc:`What
makes a valid theme <testing>`


![Export current theme](../img/export-current-theme.png)

Once it's active you can export your theme using the _"Export current theme"_ button or use the command
from your terminal.

```bash
php app/console prestashop:theme:export THEME_DIRECTORY_NAME
```

### What is exported

Exporting your theme using the button or the command line will export the following data:

* All theme files in directory
* Dependencies specified in `theme.yml` ([See theme.yml doc]({{< ref "1.7/themes/getting_started/theme_yml.md" >}}))
* Theme translations

## Distributing on Addons

Please note that if you want to sell your theme on the PrestaShop Addons, there are a few rules to follow:

** LIST OF REQUIREMENTS **

* Use BootStrap 4 alpha 4 -- [follow the appropriate doc](https://github.com/twbs/bootstrap/tree/v4.0.0-alpha.4/docs).
* Add your key -- [follow the appropriate doc]({{< ref "1.7/themes/getting_started/theme_yml.md" >}}).
