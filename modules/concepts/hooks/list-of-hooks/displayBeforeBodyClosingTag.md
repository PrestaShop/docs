---
menuTitle: displayBeforeBodyClosingTag
Title: displayBeforeBodyClosingTag
hidden: true
hookTitle: Very bottom of pages
files:
  - themes/classic/templates/layouts/layout-both-columns.tpl
locations:
  - frontoffice
type:
  - display
hookAliases:
---

# Hook displayBeforeBodyClosingTag

## Information

{{% notice tip %}}
**Very bottom of pages:** 

Use this hook for your modals or any content you want to load at the very end
{{% /notice %}}

Hook locations: 
  - frontoffice

Hook type: 
  - display

Located in: 
  - [https://github.com/PrestaShop/PrestaShop/blob/8.0.x/themes/classic/templates/layouts/layout-both-columns.tpl](themes/classic/templates/layouts/layout-both-columns.tpl)

## Hook call in codebase

```php
{hook h='displayBeforeBodyClosingTag'}
```