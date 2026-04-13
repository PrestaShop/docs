---
Title: actionPresentCategory
hidden: true
hookTitle: 'Category Presenter'
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/9.1.x/src/Adapter/Presenter/Category/CategoryPresenter.php'
        file: src/Adapter/Presenter/Category/CategoryPresenter.php
locations:
    - 'front office'
type: action
hookAliases: 
array_return: false
check_exceptions: false
chain: false
origin: core
description: 'This hook is called before a category is presented'

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
Hook::exec('actionPresentCategory',
            ['presentedCategory' => &$categoryLazyArray]
        );
```
