---
menuTitle: displayContactLeftColumn
Title: displayContactLeftColumn
hidden: true
hookTitle: Left column blocks on the contact page
files:
  - themes/hummingbird/templates/contact.tpl
  - themes/classic/templates/contact.tpl
locations:
  - front office
type: display
hookAliases:
---

# Hook displayContactLeftColumn {{< minver v="8.1" >}}

## Information

{{% notice tip %}}
**Left column blocks on the contact page:** 

This hook displays new elements in the left-hand column of the contact page.
This replaces widget `ps_contactinfo` on hook `displayLeftColumn`.
{{% /notice %}}

Hook locations: 
  - front office

Hook type: display

Located in: 
  - [themes/hummingbird/templates/contact.tpl](https://github.com/PrestaShop/hummingbird/blob/develop/templates/contact.tpl)
  - [themes/classic/templates/contact.tpl](https://github.com/PrestaShop/classic-theme/blob/develop/templates/contact.tpl)

## Call of the Hook in the origin file

```php
{hook h='displayContactLeftColumn'}
```