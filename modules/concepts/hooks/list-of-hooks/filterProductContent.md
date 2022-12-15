---
menuTitle: filterProductContent
Title: filterProductContent
hidden: true
hookTitle: Filter the content page product
files:
  - controllers/front/ProductController.php
locations:
  - front office
type: 
hookAliases:
---

# Hook filterProductContent

## Information

{{% notice tip %}}
**Filter the content page product:** 

This hook is called just before fetching content page product
{{% /notice %}}

Hook locations: 
  - front office

Located in: 
  - [controllers/front/ProductController.php](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/controllers/front/ProductController.php)

This hook has a `$chain` parameter set to `true` (hook will chain the return of hook module, [see explaination here]({{< relref "/8/development/components/hook/dispatching-hook">}})).

## Call of the Hook in the origin file

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