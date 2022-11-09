---
menuTitle: displayBackOfficeCategory
Title: displayBackOfficeCategory
hidden: true
hookTitle: Display new elements in the Back Office, tab AdminCategories
files:
  - src/PrestaShopBundle/Resources/views/Admin/Sell/Catalog/Categories/Blocks/form.html.twig
locations:
  - backoffice
types:
  - twig
---

# Hook : displayBackOfficeCategory

## Informations

{{% notice tip %}}
**Display new elements in the Back Office, tab AdminCategories:** 

This hook launches modules when the AdminCategories tab is displayed in the Back Office
{{% /notice %}}

Hook locations: 
  - backoffice

Hook types: 
  - twig

Located in: 
  - src/PrestaShopBundle/Resources/views/Admin/Sell/Catalog/Categories/Blocks/form.html.twig

## Hook call with parameters

```php
{{ renderhook('displayBackOfficeCategory') }}
```