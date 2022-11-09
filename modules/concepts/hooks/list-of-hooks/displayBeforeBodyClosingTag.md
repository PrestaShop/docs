---
menuTitle: displayBeforeBodyClosingTag
Title: displayBeforeBodyClosingTag
hidden: true
hookTitle: Very bottom of pages
files:
  - themes/classic/templates/layouts/layout-both-columns.tpl
locations:
  - frontoffice
types:
  - smarty
---

# Hook : displayBeforeBodyClosingTag

## Informations

{{% notice tip %}}
**Very bottom of pages:** 

Use this hook for your modals or any content you want to load at the very end
{{% /notice %}}

Hook locations: 
  - frontoffice

Hook types: 
  - smarty

Located in: 
  - themes/classic/templates/layouts/layout-both-columns.tpl

## Hook call with parameters

```php
{hook h='displayBeforeBodyClosingTag'}
```