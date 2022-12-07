---
menuTitle: filterHtmlContent
Title: filterHtmlContent
hidden: true
hookTitle: Filter HTML field before rending a page
files:
  - src/Adapter/Presenter/Object/ObjectPresenter.php
locations:
  - frontoffice
type:
  - 
hookAliases:
---

# Hook filterHtmlContent

## Information

{{% notice tip %}}
**Filter HTML field before rending a page:** 

This hook is called just before fetching a page on HTML field
{{% /notice %}}

Hook locations: 
  - frontoffice

Located in: 
  - [https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/Adapter/Presenter/Object/ObjectPresenter.php](src/Adapter/Presenter/Object/ObjectPresenter.php)

This hook has a `$chain` parameter set to `true` (hook will chain the return of hook module, [see explaination here]({{< relref "/8/modules/concepts/hooks">}})).

## Hook call in codebase

```php
Hook::exec(
                'filterHtmlContent',
                [
                    'type' => $type,
                    'htmlFields' => $htmlFields,
                    'object' => $presentedObject,
                ],
                null,
                false,
                true,
                false,
                null,
                true
            )
```