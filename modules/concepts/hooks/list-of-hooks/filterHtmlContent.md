---
Title: filterHtmlContent
hidden: true
hookTitle: 'Filter HTML field before rending a page'
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/Adapter/Presenter/Object/ObjectPresenter.php'
        file: src/Adapter/Presenter/Object/ObjectPresenter.php
locations:
    - 'front office'
type: null
hookAliases: 
array_return: false
check_exceptions: false
chain: true
origin: core
description: 'This hook is called just before fetching a page on HTML field'

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

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
