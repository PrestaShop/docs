---
menuTitle: displayAfterProductThumbs
Title: displayAfterProductThumbs
hidden: true
hookTitle: Display extra content below product thumbs
files:
  - Classic Theme: templates/catalog/_partials/product-cover-thumbnails.tpl
locations:
  - front office
type: display
hookAliases:
origin: theme
---

# Hook displayAfterProductThumbs

## Information

{{% notice tip %}}
**Display extra content below product thumbs:** 

This hook displays new elements below product images ex. additional media
{{% /notice %}}

Hook locations: 
  - front office

Hook type: display

Hook origin: theme

Located in: 
  - [Classic Theme: templates/catalog/_partials/product-cover-thumbnails.tpl](https://github.com/PrestaShop/classic-theme/blob/develop/templates/catalog/_partials/product-cover-thumbnails.tpl)

## Call of the Hook in the origin file

```php
{hook h='displayAfterProductThumbs' product=$product}
```