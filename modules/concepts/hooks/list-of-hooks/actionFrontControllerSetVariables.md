---
menuTitle: actionFrontControllerSetVariables
Title: actionFrontControllerSetVariables
hidden: true
hookTitle: 'Add variables in JavaScript object and Smarty templates'
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/controller/FrontController.php'
        file: classes/controller/FrontController.php
locations:
    - 'front office'
type: action
hookAliases: 
array_return: true
check_exceptions: false
chain: false
origin: core
description: 'Add variables to javascript object that is available in Front Office. These are also available in smarty templates in modules.your_module_name.'

---

{{% hookDescriptor %}}

## Parameters details

```php
      <?php
      array(
        'templateVars' => &(array)
      );
```php
    <?php
    public function hookActionFrontControllerSetVariables()
    {
        return [
            'your_variable_name' => 'Your variable value',
        ];
    }
```

## Call of the Hook in the origin file

```php
Hook::exec(
            'actionFrontControllerSetVariables',
            [
                'templateVars' => &$templateVars,
            ],
            null,
            true
        )
```
