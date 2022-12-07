---
menuTitle: displayHome
Title: displayHome
hidden: true
hookTitle: Homepage content
files:
  - controllers/front/IndexController.php
locations:
  - frontoffice
type:
  - display
hookAliases:
 - home
---

# Hook displayHome

Aliases: 
 - home



## Information

{{% notice tip %}}
**Homepage content:** 

This hook displays new elements on the homepage
{{% /notice %}}

Hook locations: 
  - frontoffice

Hook type: 
  - display

Located in: 
  - [https://github.com/PrestaShop/PrestaShop/blob/8.0.x/controllers/front/IndexController.php](controllers/front/IndexController.php)

## Hook call in codebase

```php
Hook::exec('displayHome')
```