---
menuTitle: displayAdminOrderTabContent
Title: displayAdminOrderTabContent
hidden: true
hookTitle: 'Display new elements in the Back Office, tab contents on order'
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/PrestaShopBundle/Resources/views/Admin/Sell/Order/Order/Blocks/View/details.html.twig'
        file: src/PrestaShopBundle/Resources/views/Admin/Sell/Order/Order/Blocks/View/details.html.twig
locations:
    - 'back office'
type: display
hookAliases: 
hasExample: true
array_return: false
check_exceptions: false
chain: false
origin: core
description: ''

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
{% set displayAdminOrderTabContent = renderhook('displayAdminOrderTabContent', {'id_order': orderForViewing.id}) %}
```

## Example implementation

This hook has been implemented as an example in our [modules examples repository - demovieworderhooks](https://github.com/PrestaShop/example-modules/tree/master/demovieworderhooks).
