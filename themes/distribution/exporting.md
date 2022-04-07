---
title: Exporting your theme
---

# Exporting your theme

## Creating a valid ZIP file

There is no longer any theme data in the database with PrestaShop 1.7. Hence a theme is installed as soon as
it is on the disk.

If you want the theme to appears in the backoffice, it only needs to contain a `config/theme.yml` file.
This will only display it, if you want to select it as your active theme, it has to be valid. Read ["What
makes a valid theme"]({{< ref "1.7/themes/distribution/testing" >}}).


![Export current theme](../img/export-current-theme.png)

Once it is active you can export your theme using the _"Export current theme"_ button or use the command
from your terminal.

```bash
php bin/console prestashop:theme:export THEME_DIRECTORY_NAME
```

{{% notice note %}}
Use `php app/console` instead of `php bin/console` for versions prior to {{< minver v="1.7.4" >}}
{{% /notice %}}

### What is exported

Exporting your theme using the button or the command line will export the following data:

* All theme files in directory
* Dependencies specified in `theme.yml` ([See theme.yml doc]({{< ref "1.7/themes/getting-started/theme-yml" >}}))
* Theme translations

