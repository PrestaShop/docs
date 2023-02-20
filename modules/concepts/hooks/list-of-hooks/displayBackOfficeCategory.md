---
menuTitle: displaybackOfficeCategory
Title: displaybackOfficeCategory
hidden: true
hookTitle: Display new elements in the Back Office, tab AdminCategories
files:
  - src/PrestaShopBundle/Resources/views/Admin/Sell/Catalog/Categories/Blocks/form.html.twig
locations:
  - back office
type: display
hookAliases:
---

# Hook displaybackOfficeCategory

## Information

{{% notice tip %}}
**Display new elements in the Back Office, tab AdminCategories:** 

This hook launches modules when the AdminCategories tab is displayed in the Back Office
{{% /notice %}}

Hook locations: 
  - back office

Hook type: display

Located in: 
  - [src/PrestaShopBundle/Resources/views/Admin/Sell/Catalog/Categories/Blocks/form.html.twig](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/PrestaShopBundle/Resources/views/Admin/Sell/Catalog/Categories/Blocks/form.html.twig)

## Call of the Hook in the origin file

```php
{{ renderhook('displaybackOfficeCategory') }}
```
