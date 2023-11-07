---
Title: displayAdminThemesListAfter
hidden: true
hookTitle: 'BO themes list extra content'
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/PrestaShopBundle/Resources/views/Admin/Improve/Design/Theme/index.html.twig'
        file: src/PrestaShopBundle/Resources/views/Admin/Improve/Design/Theme/index.html.twig
locations:
    - 'back office'
type: display
hookAliases: 
array_return: false
check_exceptions: false
chain: false
origin: core
description: 'This hook displays content after the themes list in the back office'

---

{{% hookDescriptor %}}

## Parameters details

```php
    <?php
    array(
    'current_theme_name' => (string) Name of the currently used theme
    );
```

## Call of the Hook in the origin file

```php
{{ renderhook('displayAdminThemesListAfter', { 'current_theme_name': currentlyUsedTheme.get('name') }) }}
```
