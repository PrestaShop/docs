---
menuTitle: displayHeaderCategory
Title: displayHeaderCategory
hidden: true
hookTitle: Footer above of the product list
files:
  - Classic Theme: templates/catalog/listing/product-list.tpl
locations:
  - front office
type: display
---

# Hook displayHeaderCategory

## Information

{{% notice tip %}}
**Category / search header:** 

This hook adds new blocks above the products listing in a category/search
{{% /notice %}}

Hook locations: 
  - front office

Hook type: display

Located in: 
  - [Classic Theme: templates/catalog/listing/product-list.tpl](https://github.com/PrestaShop/classic-theme/blob/2.0.x/templates/catalog/listing/product-list.tpl)

## Call of the Hook in the origin file

```php
{hook h="displayHeaderCategory"}
```