---
menuTitle: displayMyAccountBlock
Title: displayMyAccountBlock
hidden: true
hookTitle: My account block
files:
  - themes/classic/modules/ps_customeraccountlinks/ps_customeraccountlinks.tpl
locations:
  - frontoffice
type:
  - display
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
  - frontoffice

Hook type: 
  - display

Located in: 
  - [https://github.com/PrestaShop/PrestaShop/blob/8.0.x/themes/classic/modules/ps_customeraccountlinks/ps_customeraccountlinks.tpl](themes/classic/modules/ps_customeraccountlinks/ps_customeraccountlinks.tpl)

## Hook call in codebase

```php
{hook h='displayMyAccountBlock'}
```