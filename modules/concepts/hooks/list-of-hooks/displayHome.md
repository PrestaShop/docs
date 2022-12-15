---
menuTitle: displayHome
Title: displayHome
hidden: true
hookTitle: Homepage content
files:
  - controllers/front/IndexController.php
locations:
  - front office
type: display
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
  - front office

Hook type: display

Located in: 
  - [controllers/front/IndexController.php](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/controllers/front/IndexController.php)

## Call of the Hook in the origin file

```php
Hook::exec('displayHome')
```