---
menuTitle: displayModuleConfigureExtraButons
Title: displayModuleConfigureExtraButons
hidden: true
hookTitle: Module configuration - After toolbar buttons
files:
  - admin-dev/themes/default/template/controllers/modules/configure.tpl
locations:
  - back office
type: display
---

# Hook displayModuleConfigureExtraButons

## Information

{{% notice tip %}}
**Module configuration - After toolbar buttons** 

This hook allows to add toolbar's additional content on module configuration page
{{% /notice %}}

Hook locations: 
  - back office

Hook type: display

Located in: 
  - [admin-dev/themes/default/template/controllers/modules/configure.tpl](https://github.com/PrestaShop/Prestashop/blob/8.0.x/admin-dev/themes/default/template/controllers/modules/configure.tpl)

## Call of the Hook in the origin file

```php
{hook h="displayModuleConfigureExtraButtons" module_name=$module_name}
```