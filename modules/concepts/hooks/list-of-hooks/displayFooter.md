---
menuTitle: displayFooter
Title: displayFooter
hidden: true
hookTitle: Footer
files:
  - Classic Theme: templates/_partials/footer.tpl
locations:
  - front office
type: display
hookAliases:
 - footer
origin: theme
---

# Hook displayFooter

## Aliases
 
 - footer

## Information

{{% notice tip %}}
**Footer:** 

This hook displays new blocks in the footer
{{% /notice %}}

Hook locations: 
  - front office

Hook type: display

Hook origin: theme

Located in: 
  - [Classic Theme: templates/_partials/footer.tpl](https://github.com/PrestaShop/classic-theme/blob/develop/templates/_partials/footer.tpl)

## Call of the Hook in the origin file

```php
{hook h='displayFooter'}
```