---
menuTitle: actionObjectProductInCartDeleteBefore
Title: actionObjectProductInCartDeleteBefore
hidden: true
hookTitle: Cart product removal
files:
  - controllers/front/CartController.php
locations:
  - backoffice
  - frontoffice
type:
  - action
hookAliases:
---

# Hook actionObjectProductInCartDeleteBefore

## Information

{{% notice tip %}}
**Cart product removal:** 

This hook is called before a product is removed from a cart
{{% /notice %}}

Hook locations: 
  - backoffice
  - frontoffice

Hook type: 
  - action

Located in: 
  - [https://github.com/PrestaShop/PrestaShop/blob/8.0.x/controllers/front/CartController.php](controllers/front/CartController.php)

This hook has an `$array_return` parameter set to `true` (module output will be set by name in an array, [see explaination here]({{< relref "/8/development/components/hook/dispatching-hook">}})).

## Hook call in codebase

```php
Hook::exec('actionObjectProductInCartDeleteBefore', $data, null, true)
```