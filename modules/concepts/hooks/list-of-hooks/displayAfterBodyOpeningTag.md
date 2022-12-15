---
menuTitle: displayAfterBodyOpeningTag
Title: displayAfterBodyOpeningTag
hidden: true
hookTitle: Very top of pages
files:
  - themes/classic/templates/layouts/layout-both-columns.tpl
locations:
  - front office
type: display
hookAliases:
---

# Hook displayAfterBodyOpeningTag

## Information

{{% notice tip %}}
**Very top of pages:** 

Use this hook for advertisement or modals you want to load first
{{% /notice %}}

Hook locations: 
  - front office

Hook type: display

Located in: 
  - [themes/classic/templates/layouts/layout-both-columns.tpl](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/themes/classic/templates/layouts/layout-both-columns.tpl)

## Call of the Hook in the origin file

```php
{hook h='displayAfterBodyOpeningTag'}
```