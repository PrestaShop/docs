---
menuTitle: filterCategoryContent
Title: filterCategoryContent
hidden: true
hookTitle: Filter the content page category
files:
  - controllers/front/listing/CategoryController.php
locations:
  - frontoffice
type:
  - 
hookAliases:
---

# Hook filterCategoryContent

## Information

{{% notice tip %}}
**Filter the content page category:** 

This hook is called just before fetching content page category
{{% /notice %}}

Hook locations: 
  - frontoffice

Located in: 
  - [https://github.com/PrestaShop/PrestaShop/blob/8.0.x/controllers/front/listing/CategoryController.php](controllers/front/listing/CategoryController.php)

This hook has a `$chain` parameter set to `true` (hook will chain the return of hook module, [see explaination here]({{< relref "/8/modules/concepts/hooks">}})).

## Parameters details

```php
    <?php
    array(
        'object' => (object) Category object
    ),
```

## Hook call in codebase

```php
Hook::exec(
            'filterCategoryContent',
            ['object' => $categoryVar],
            $id_module = null,
            $array_return = false,
            $check_exceptions = true,
            $use_push = false,
            $id_shop = null,
            $chain = true
        )
```