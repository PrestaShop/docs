---
menuTitle: filterProductContent
Title: filterProductContent
hidden: true
hookTitle: Filter the content page product
files:
  - controllers/front/ProductController.php
locations:
  - frontoffice
type:
  - 
hookAliases:
---

# Hook filterProductContent

## Information

{{% notice tip %}}
**Filter the content page product:** 

This hook is called just before fetching content page product
{{% /notice %}}

Hook locations: 
  - frontoffice

Located in: 
  - [https://github.com/PrestaShop/PrestaShop/blob/8.0.x/controllers/front/ProductController.php](controllers/front/ProductController.php)

This hook has a `$chain` parameter set to `true` (hook will chain the return of hook module, [see explaination here]({{< relref "/8/modules/concepts/hooks">}})).

## Hook call in codebase

```php
Hook::exec(
                'filterProductContent',
                ['object' => $product_for_template],
                null,
                false,
                true,
                false,
                null,
                true
            )
```