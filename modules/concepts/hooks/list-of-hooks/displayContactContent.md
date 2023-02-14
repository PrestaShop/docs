---
menuTitle: displayContactContent
Title: displayContactContent
hidden: true
hookTitle: Content wrapper section of the contact page
files:
  - themes/hummingbird/templates/contact.tpl
  - themes/classic/templates/contact.tpl
locations:
  - front office
type: display
hookAliases:
---

# Hook displayContactContent {{< minver v="8.1" >}}

## Information

{{% notice tip %}}
**Content wrapper section of the contact page:** 

This hook displays new elements in the content wrapper of the contact page.
This replaces widget `contactform`.
{{% /notice %}}

Hook locations: 
  - front office

Hook type: display

Located in: 
  - [themes/hummingbird/templates/contact.tpl](https://github.com/PrestaShop/hummingbird/blob/develop/templates/contact.tpl)
  - [themes/classic/templates/contact.tpl](https://github.com/PrestaShop/classic-theme/blob/develop/templates/contact.tpl)

## Call of the Hook in the origin file

```php
{hook h='displayContactContent'}
```