---
menuTitle: displayBanner
Title: displayBanner
hidden: true
hookTitle: Very top of pages
files:
  - Classic Theme: templates/_partials/header.tpl
locations:
  - front office
type: display
hookAliases:
---

# Hook displayBanner

## Information

{{% notice tip %}}
**Very top of pages:** 

Use this hook for banners on top of every pages
{{% /notice %}}

Hook locations: 
  - front office

Hook type: display

Located in: 
  - [Classic Theme: templates/_partials/header.tpl](https://github.com/PrestaShop/classic-theme/blob/develop/templates/_partials/header.tpl)

## Call of the Hook in the origin file

```php
{hook h='displayBanner'}
```