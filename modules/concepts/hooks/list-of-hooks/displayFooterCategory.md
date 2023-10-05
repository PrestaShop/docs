---
menuTitle: displayFooterCategory
Title: displayFooterCategory
hidden: true
hookTitle: This hook adds new blocks under the products listing in a category/search
files:
  - Classic Theme: templates/catalog/listing/product-list.tpl
locations:
  - front office
type: display
origin: theme
---

# Hook displayFooterCategory

## Information

{{% notice tip %}}
**Category / search footer:** 

This hook adds new blocks under the products listing in a category/search
{{% /notice %}}

Hook locations: 
  - front office

Hook type: display

Hook origin: theme

Located in: 
  - [Classic Theme: templates/catalog/listing/product-list.tpl](https://github.com/PrestaShop/classic-theme/blob/2.0.x/templates/catalog/listing/product-list.tpl)

## Call of the Hook in the origin file

```php
{hook h="displayFooterCategory"}
```