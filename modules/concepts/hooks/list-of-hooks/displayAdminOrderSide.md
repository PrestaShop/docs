---
Title: displayAdminOrderSide
hidden: true
hookTitle: 'Admin Order Side Column'
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/9.1.x/src/PrestaShopBundle/Resources/views/Admin/Sell/Order/Order/view.html.twig'
        file: src/PrestaShopBundle/Resources/views/Admin/Sell/Order/Order/view.html.twig
locations:
    - 'back office'
type: display
hookAliases:
    - displayBackOfficeOrderActions 
array_return: false
check_exceptions: false
chain: false
origin: core
description: 'This hook displays content in the order view page in the side column under the customer view'

---

{{% hookDescriptor %}}

## Parameters details

```php
    <?php
    array(
      'id_order' => (int) Order ID
    );
```

## Call of the Hook in the origin file

```php
{{ renderhook('displayAdminOrderSide', {id_order: orderForViewing.id}) }}
        {{ include('@PrestaShop/Admin/Sell/Order/Order/Blocks/View/messages.html.twig') }}
        {{ renderhook('displayAdminOrderSideBottom', {id_order: orderForViewing.id}) }}
      </div>

      <div class="col-md-8 d-print-block right-column">
```
