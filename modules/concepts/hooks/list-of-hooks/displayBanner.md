---
menuTitle: displayBanner
Title: displayBanner
hidden: true
hookTitle: Very top of pages
files:
  - themes/classic/templates/_partials/header.tpl
locations:
  - frontoffice
type:
  - display
hookAliases:
---

# Hook displayBanner

## Information

{{% notice tip %}}
**Very top of pages:** 

Use this hook for banners on top of every pages
{{% /notice %}}

Hook locations: 
  - frontoffice

Hook type: 
  - display

Located in: 
  - [https://github.com/PrestaShop/PrestaShop/blob/8.0.x/themes/classic/templates/_partials/header.tpl](themes/classic/templates/_partials/header.tpl)

## Hook call in codebase

```php
{hook h='displayBanner'}
```