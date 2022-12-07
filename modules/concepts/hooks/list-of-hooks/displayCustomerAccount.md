---
menuTitle: displayCustomerAccount
Title: displayCustomerAccount
hidden: true
hookTitle: Customer account displayed in Front Office
files:
  - themes/classic/templates/customer/my-account.tpl
locations:
  - frontoffice
type:
  - display
hookAliases:
 - customerAccount
---

# Hook displayCustomerAccount

Aliases: 
 - customerAccount



## Information

{{% notice tip %}}
**Customer account displayed in Front Office:** 

This hook displays new elements on the customer account page
{{% /notice %}}

Hook locations: 
  - frontoffice

Hook type: 
  - display

Located in: 
  - [https://github.com/PrestaShop/PrestaShop/blob/8.0.x/themes/classic/templates/customer/my-account.tpl](themes/classic/templates/customer/my-account.tpl)

## Hook call in codebase

```php
{hook h='displayCustomerAccount'}
```