---
menuTitle: displayCustomerLoginFormAfter
Title: displayCustomerLoginFormAfter
hidden: true
hookTitle: Display elements after login form
files:
  - themes/classic/templates/customer/authentication.tpl
locations:
  - frontoffice
type:
  - display
hookAliases:
---

# Hook displayCustomerLoginFormAfter

## Information

{{% notice tip %}}
**Display elements after login form:** 

This hook displays new elements after the login form
{{% /notice %}}

Hook locations: 
  - frontoffice

Hook type: 
  - display

Located in: 
  - [https://github.com/PrestaShop/PrestaShop/blob/8.0.x/themes/classic/templates/customer/authentication.tpl](themes/classic/templates/customer/authentication.tpl)

## Hook call in codebase

```php
{hook h='displayCustomerLoginFormAfter'}
```