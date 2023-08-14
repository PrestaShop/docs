---
menuTitle: displayBeforeBodyClosingTag
Title: displayBeforeBodyClosingTag
hidden: true
hookTitle: Very bottom of pages
files:
  - Classic Theme: templates/layouts/layout-both-columns.tpl
locations:
  - front office
type: display
hookAliases:
---

# Hook displayBeforeBodyClosingTag

## Information

{{% notice tip %}}
**Very bottom of pages:** 

Use this hook for your modals or any content you want to load at the very end
{{% /notice %}}

Hook locations: 
  - front office

Hook type: display

Located in: 
  - [Classic Theme: templates/layouts/layout-both-columns.tpl](https://github.com/PrestaShop/classic-theme/blob/develop/templates/layouts/layout-both-columns.tpl)

## Call of the Hook in the origin file

```php
{hook h='displayBeforeBodyClosingTag'}
```