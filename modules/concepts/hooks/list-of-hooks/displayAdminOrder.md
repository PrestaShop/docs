---
menuTitle: displayAdminOrder
Title: displayAdminOrder
hidden: true
hookTitle: 'Display new elements in the Back Office, tab AdminOrder'
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/PrestaShopBundle/Resources/views/Admin/Sell/Order/Order/view.html.twig'
        file: src/PrestaShopBundle/Resources/views/Admin/Sell/Order/Order/view.html.twig
locations:
    - 'back office'
type: display
hookAliases:
    - adminOrder
hasExample: true
array_return: false
check_exceptions: false
chain: false
origin: core
description: 'This hook launches modules when the AdminOrder tab is displayed in the Back Office'

---

{{% hookDescriptor %}}

## Parameters details

```php
    <?php
    array(
     'id_order' = (int) Order ID
    );
```

## Call of the Hook in the origin file

```php
{{ renderhook('displayAdminOrder', {'id_order': orderForViewing.id}) }}
```

## Example implementation

This hook has been implemented as an example in our [modules examples repository - demovieworderhooks](https://github.com/PrestaShop/example-modules/tree/master/demovieworderhooks).
