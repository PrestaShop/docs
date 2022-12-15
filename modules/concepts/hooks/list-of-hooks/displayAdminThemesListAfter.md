---
menuTitle: displayAdminThemesListAfter
Title: displayAdminThemesListAfter
hidden: true
hookTitle: BO themes list extra content
files:
  - src/PrestaShopBundle/Resources/views/Admin/Improve/Design/Theme/index.html.twig
locations:
  - back office
type: display
hookAliases:
---

# Hook displayAdminThemesListAfter

## Information

{{% notice tip %}}
**BO themes list extra content:** 

This hook displays content after the themes list in the back office
{{% /notice %}}

Hook locations: 
  - back office

Hook type: display

Located in: 
  - [src/PrestaShopBundle/Resources/views/Admin/Improve/Design/Theme/index.html.twig](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/PrestaShopBundle/Resources/views/Admin/Improve/Design/Theme/index.html.twig)

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