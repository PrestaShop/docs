---
menuTitle: filterCmsCategoryContent
Title: filterCmsCategoryContent
hidden: true
hookTitle: Filter the content page category
files:
  - controllers/front/CmsController.php
locations:
  - front office
type: 
hookAliases:
---

# Hook filterCmsCategoryContent

## Information

{{% notice tip %}}
**Filter the content page category:** 

This hook is called just before fetching content page category
{{% /notice %}}

Hook locations: 
  - front office

Located in: 
  - [controllers/front/CmsController.php](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/controllers/front/CmsController.php)

This hook has a `$chain` parameter set to `true` (hook will chain the return of hook module, [see explaination here]({{< relref "/8/development/components/hook/dispatching-hook">}})).

## Call of the Hook in the origin file

```php
Hook::exec(
                'filterCmsCategoryContent',
                ['object' => $cmsCategoryVar],
                $id_module = null,
                $array_return = false,
                $check_exceptions = true,
                $use_push = false,
                $id_shop = null,
                $chain = true
            )
```