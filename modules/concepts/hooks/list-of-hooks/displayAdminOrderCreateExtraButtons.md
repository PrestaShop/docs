---
menuTitle: displayAdminOrderCreateExtraButtons
Title: displayAdminOrderCreateExtraButtons
hidden: true
hookTitle: Add buttons on the create order page dropdown
files:
  - src/PrestaShopBundle/Resources/views/Admin/Sell/Order/Order/Blocks/Create/summary.html.twig
locations:
  - back office
type: display
hookAliases:
---

# Hook displayAdminOrderCreateExtraButtons

## Information

{{% notice tip %}}
**Add buttons on the create order page dropdown:** 

Add buttons on the create order page dropdown
{{% /notice %}}

Hook locations: 
  - back office

Hook type: display

Located in: 
  - [src/PrestaShopBundle/Resources/views/Admin/Sell/Order/Order/Blocks/Create/summary.html.twig](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/PrestaShopBundle/Resources/views/Admin/Sell/Order/Order/Blocks/Create/summary.html.twig)

## Call of the Hook in the origin file

```php
{{ renderhook('displayAdminOrderCreateExtraButtons') }}
```