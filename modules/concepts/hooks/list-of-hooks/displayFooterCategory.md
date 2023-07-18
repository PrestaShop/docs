---
menuTitle: displayFooterCategory
Title: displayFooterCategory
hidden: true
hookTitle: Footer at the bottom of the product list
files:
  - themes/classic/templates/catalog/listing/product-list.tpl
locations:
  - front office
type: display
---

# Hook displayFooterCategory {{< minver v="1.7.7" >}}

## Information

{{% notice tip %}}
**Product list footer:** 

Displayed at the bottom of the product list
{{% /notice %}}

Hook locations: 
  - front office

Hook type: display

Located in: 
  - [themes/classic/templates/catalog/listing/product-list.tpl](https://github.com/PrestaShop/classic-theme/blob/2.0.x/templates/catalog/listing/product-list.tpl)

## Call of the Hook in the origin file

```php
{hook h="displayFooterCategory"}
```