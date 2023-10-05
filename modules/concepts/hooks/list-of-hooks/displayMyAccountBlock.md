---
menuTitle: displayMyAccountBlock
Title: displayMyAccountBlock
hidden: true
hookTitle: My account block
files:
  - Classic Theme: modules/ps_customeraccountlinks/ps_customeraccountlinks.tpl
locations:
  - front office
type: display
hookAliases:
 - myAccountBlock
origin: theme
---

# Hook displayMyAccountBlock

## Information

{{% notice tip %}}
**My account block:** 

This hook displays extra information within the 'my account' block"
{{% /notice %}}

| Hook | displayMyAccountBlock |
| --- | --- |
| Locations | front office |
| Type | display |
| Origin | theme |
| Aliases | myAccountBlock |

Located in: 
  - [Classic Theme: modules/ps_customeraccountlinks/ps_customeraccountlinks.tpl](https://github.com/PrestaShop/classic-theme/blob/develop/modules/ps_customeraccountlinks/ps_customeraccountlinks.tpl)

## Call of the Hook in the origin file

```php
{hook h='displayMyAccountBlock'}
```