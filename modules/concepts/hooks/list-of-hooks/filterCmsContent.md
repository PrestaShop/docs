---
menuTitle: filterCmsContent
Title: filterCmsContent
hidden: true
hookTitle: Filter the content page
files:
  - controllers/front/CmsController.php
locations:
  - front office
type: 
hookAliases:
---

# Hook filterCmsContent

## Information

{{% notice tip %}}
**Filter the content page:** 

This hook is called just before fetching content page
{{% /notice %}}

Hook locations: 
  - front office

Located in: 
  - [controllers/front/CmsController.php](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/controllers/front/CmsController.php)

This hook has a `$chain` parameter set to `true` (hook will chain the return of hook module, [see explaination here]({{< relref "/8/development/components/hook/dispatching-hook">}})).

## Call of the Hook in the origin file

```php
Hook::exec(
                'filterCmsContent',
                ['object' => $cmsVar],
                $id_module = null,
                $array_return = false,
                $check_exceptions = true,
                $use_push = false,
                $id_shop = null,
                $chain = true
            )
```