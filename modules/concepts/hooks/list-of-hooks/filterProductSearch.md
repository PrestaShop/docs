---
menuTitle: filterProductSearch
Title: filterProductSearch
hidden: true
hookTitle: Filter search products result
files:
  - modules/blockwishlist/controllers/front/view.php
locations:
  - frontoffice
type:
  - 
hookAliases:
---

# Hook filterProductSearch

## Information

{{% notice tip %}}
**Filter search products result:** 

This hook is called in order to allow to modify search product result
{{% /notice %}}

Hook locations: 
  - frontoffice

Hook type: 
  - 

Located in: 
  - [https://github.com/PrestaShop/PrestaShop/blob/8.0.x/modules/blockwishlist/controllers/front/view.php](modules/blockwishlist/controllers/front/view.php)

## Hook call in codebase

```php
Hook::exec('filterProductSearch', ['searchVariables' => &$searchVariables])
```