---
menuTitle: displayBackOfficeCategory
Title: displayBackOfficeCategory
hidden: true
hookTitle: Display new elements in the Back Office, tab AdminCategories
files:
  - src/PrestaShopBundle/Resources/views/Admin/Sell/Catalog/Categories/Blocks/form.html.twig
locations:
  - backoffice
type:
  - display
hookAliases:
---

# Hook displayBackOfficeCategory

## Information

{{% notice tip %}}
**Display new elements in the Back Office, tab AdminCategories:** 

This hook launches modules when the AdminCategories tab is displayed in the Back Office
{{% /notice %}}

Hook locations: 
  - backoffice

Hook type: 
  - display

Located in: 
  - [https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/PrestaShopBundle/Resources/views/Admin/Sell/Catalog/Categories/Blocks/form.html.twig](src/PrestaShopBundle/Resources/views/Admin/Sell/Catalog/Categories/Blocks/form.html.twig)

## Hook call in codebase

```php
{{ renderhook('displayBackOfficeCategory') }}
```