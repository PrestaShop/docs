---
menuTitle: displayCustomerAccount
Title: displayCustomerAccount
hidden: true
hookTitle: Customer account displayed in Front Office
files:
  - themes/classic/templates/customer/my-account.tpl
locations:
  - front office
type: display
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
  - front office

Hook type: display

Located in: 
  - [themes/classic/templates/customer/my-account.tpl](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/themes/classic/templates/customer/my-account.tpl)

## Call of the Hook in the origin file

```php
{hook h='displayCustomerAccount'}
```