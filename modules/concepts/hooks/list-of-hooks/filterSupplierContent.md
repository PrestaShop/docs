---
menuTitle: filterSupplierContent
Title: filterSupplierContent
hidden: true
hookTitle: Filter the content page supplier
files:
  - controllers/front/listing/SupplierController.php
locations:
  - frontoffice
type:
  - 
hookAliases:
---

# Hook filterSupplierContent

## Information

{{% notice tip %}}
**Filter the content page supplier:** 

This hook is called just before fetching content page supplier
{{% /notice %}}

Hook locations: 
  - frontoffice

Located in: 
  - [https://github.com/PrestaShop/PrestaShop/blob/8.0.x/controllers/front/listing/SupplierController.php](controllers/front/listing/SupplierController.php)

This hook has a `$chain` parameter set to `true` (hook will chain the return of hook module, [see explaination here]({{< relref "/8/modules/concepts/hooks">}})).

## Hook call in codebase

```php
Hook::exec(
            'filterSupplierContent',
            ['object' => $supplierVar],
            $id_module = null,
            $array_return = false,
            $check_exceptions = true,
            $use_push = false,
            $id_shop = null,
            $chain = true
        )
```