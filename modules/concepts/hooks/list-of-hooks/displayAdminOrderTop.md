---
menuTitle: displayAdminOrderTop
Title: displayAdminOrderTop
hidden: true
hookTitle: 'Display new elements in the Back Office, top of Order page'
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/PrestaShopBundle/Resources/views/Admin/Sell/Order/Order/view.html.twig'
        file: src/PrestaShopBundle/Resources/views/Admin/Sell/Order/Order/view.html.twig
locations:
    - 'back office'
type: display
hookAliases: null
hasExample: true
array_return: false
check_exceptions: false
chain: false
origin: core
description: 'This hook launches modules when the Order is displayed in the Back Office'

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
{% set displayAdminOrderTopHookContent = renderhook('displayAdminOrderTop', {'id_order': orderForViewing.id}) %}
```

## Example implementation

This hook has been implemented as an example in our [modules examples repository - demovieworderhooks](https://github.com/PrestaShop/example-modules/tree/master/demovieworderhooks).
