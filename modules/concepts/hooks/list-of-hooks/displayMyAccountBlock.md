---
menuTitle: displayMyAccountBlock
Title: displayMyAccountBlock
hidden: true
hookTitle: My account block
files:
  - themes/classic/modules/ps_customeraccountlinks/ps_customeraccountlinks.tpl
locations:
  - front office
type: display
hookAliases:
 - myAccountBlock
---

# Hook displayMyAccountBlock

Aliases: 
 - myAccountBlock



## Information

{{% notice tip %}}
**My account block:** 

This hook displays extra information within the 'my account' block"
{{% /notice %}}

Hook locations: 
  - front office

Hook type: display

Located in: 
  - [themes/classic/modules/ps_customeraccountlinks/ps_customeraccountlinks.tpl](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/themes/classic/modules/ps_customeraccountlinks/ps_customeraccountlinks.tpl)

## Call of the Hook in the origin file

```php
{hook h='displayMyAccountBlock'}
```