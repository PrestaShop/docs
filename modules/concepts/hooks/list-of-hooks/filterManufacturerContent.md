---
menuTitle: filterManufacturerContent
Title: filterManufacturerContent
hidden: true
hookTitle: Filter the content page manufacturer
files:
  - controllers/front/listing/ManufacturerController.php
locations:
  - front office
type: 
hookAliases:
---

# Hook filterManufacturerContent

## Information

{{% notice tip %}}
**Filter the content page manufacturer:** 

This hook is called just before fetching content page manufacturer
{{% /notice %}}

Hook locations: 
  - front office

Located in: 
  - [controllers/front/listing/ManufacturerController.php](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/controllers/front/listing/ManufacturerController.php)

This hook has a `$chain` parameter set to `true` (hook will chain the return of hook module, [see explaination here]({{< relref "/8/development/components/hook/dispatching-hook">}})).

## Call of the Hook in the origin file

```php
Hook::exec(
            'filterManufacturerContent',
            ['filtered_content' => $manufacturerVar['description']],
            $id_module = null,
            $array_return = false,
            $check_exceptions = true,
            $use_push = false,
            $id_shop = null,
            $chain = true
        )
```