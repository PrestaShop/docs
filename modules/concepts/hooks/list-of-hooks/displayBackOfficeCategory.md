---
menuTitle: displayback officeCategory
Title: displayback officeCategory
hidden: true
hookTitle: Display new elements in the Back Office, tab AdminCategories
files:
  - src/PrestaShopBundle/Resources/views/Admin/Sell/Catalog/Categories/Blocks/form.html.twig
locations:
  - back office
type: display
hookAliases:
---

# Hook displayback officeCategory

## Information

{{% notice tip %}}
**Display new elements in the Back Office, tab AdminCategories:** 

This hook launches modules when the AdminCategories tab is displayed in the Back Office
{{% /notice %}}

Hook locations: 
  - back office

Hook type: display

Located in: 
  - [https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/PrestaShopBundle/Resources/views/Admin/Sell/Catalog/Categories/Blocks/form.html.twig](src/PrestaShopBundle/Resources/views/Admin/Sell/Catalog/Categories/Blocks/form.html.twig)

## Call of the Hook in the origin file

```php
{{ renderhook('displayback officeCategory') }}
```