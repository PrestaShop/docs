---
Title: displayAdminOrderCreateExtraButtons
hidden: true
hookTitle: 'Add buttons on the create order page dropdown'
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/PrestaShopBundle/Resources/views/Admin/Sell/Order/Order/Blocks/Create/summary.html.twig'
        file: src/PrestaShopBundle/Resources/views/Admin/Sell/Order/Order/Blocks/Create/summary.html.twig
locations:
    - 'back office'
type: display
hookAliases: 
array_return: false
check_exceptions: false
chain: false
origin: core
description: 'Add buttons on the create order page dropdown'

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
{{ renderhook('displayAdminOrderCreateExtraButtons') }}
```
