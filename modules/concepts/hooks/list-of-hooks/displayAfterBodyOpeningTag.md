---
menuTitle: displayAfterBodyOpeningTag
Title: displayAfterBodyOpeningTag
hidden: true
hookTitle: Very top of pages
files:
  - themes/classic/templates/layouts/layout-both-columns.tpl
locations:
  - frontoffice
type:
  - display
hookAliases:
---

# Hook displayAfterBodyOpeningTag

## Information

{{% notice tip %}}
**Very top of pages:** 

Use this hook for advertisement or modals you want to load first
{{% /notice %}}

Hook locations: 
  - frontoffice

Hook type: 
  - display

Located in: 
  - [https://github.com/PrestaShop/PrestaShop/blob/8.0.x/themes/classic/templates/layouts/layout-both-columns.tpl](themes/classic/templates/layouts/layout-both-columns.tpl)

## Hook call in codebase

```php
{hook h='displayAfterBodyOpeningTag'}
```