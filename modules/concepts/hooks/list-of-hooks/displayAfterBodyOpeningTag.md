---
menuTitle: displayAfterBodyOpeningTag
Title: displayAfterBodyOpeningTag
hidden: true
hookTitle: Very top of pages
files:
  - Classic Theme: templates/layouts/layout-both-columns.tpl
locations:
  - front office
type: display
origin: theme
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

Hook origin: theme

Located in: 
  - [Classic Theme: templates/layouts/layout-both-columns.tpl](https://github.com/PrestaShop/classic-theme/blob/develop/templates/layouts/layout-both-columns.tpl)

## Call of the Hook in the origin file

```php
{hook h='displayAfterBodyOpeningTag'}
```