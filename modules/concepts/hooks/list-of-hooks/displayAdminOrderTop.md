---
menuTitle: displayAdminOrderTop
Title: displayAdminOrder
hidden: true
hookTitle: Display new elements in the Back Office, top of Order page
files:
  - src/PrestaShopBundle/Resources/views/Admin/Sell/Order/Order/view.html.twig
locations:
  - back office
type: display
hookAliases:
hasExample: true
---

# Hook displayAdminOrder

## Information

{{% notice tip %}}
**Display new elements in the Back Office, top of Order page:** 

This hook launches modules when the Order is displayed in the Back Office
{{% /notice %}}

Hook locations: 
  - back office

Hook type: display

Located in: 
  - [src/PrestaShopBundle/Resources/views/Admin/Sell/Order/Order/view.html.twig](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/PrestaShopBundle/Resources/views/Admin/Sell/Order/Order/view.html.twig)

## Call of the Hook in the origin file

```php
{% set displayAdminOrderTopHookContent = renderhook('displayAdminOrderTop', {'id_order': orderForViewing.id}) %}
```

## Example implementation

This hook has been implemented as an example in our [modules examples repository - demovieworderhooks](https://github.com/PrestaShop/example-modules/tree/master/demovieworderhooks).