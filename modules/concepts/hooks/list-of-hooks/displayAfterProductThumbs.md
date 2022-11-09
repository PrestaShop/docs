---
menuTitle: displayAfterProductThumbs
Title: displayAfterProductThumbs
hidden: true
hookTitle: Display extra content below product thumbs
files:
  - themes/classic/templates/catalog/_partials/product-cover-thumbnails.tpl
locations:
  - frontoffice
types:
  - smarty
---

# Hook : displayAfterProductThumbs

## Informations

{{% notice tip %}}
**Display extra content below product thumbs:** 

This hook displays new elements below product images ex. additional media
{{% /notice %}}

Hook locations: 
  - frontoffice

Hook types: 
  - smarty

Located in: 
  - themes/classic/templates/catalog/_partials/product-cover-thumbnails.tpl

## Hook call with parameters

```php
{hook h='displayAfterProductThumbs' product=$product}
```