---
menuTitle: actionFrontControllerSetVariables
Title: actionFrontControllerSetVariables
hidden: true
hookTitle: Add variables in JavaScript object and Smarty templates
files:
  - classes/controller/FrontController.php
locations:
  - frontoffice
type:
  - action
hookAliases:
---

# Hook actionFrontControllerSetVariables

## Information

{{% notice tip %}}
**Add variables in JavaScript object and Smarty templates:** 

Add variables to javascript object that is available in Front Office. These are also available in smarty templates in modules.your_module_name.
{{% /notice %}}

Hook locations: 
  - frontoffice

Hook type: 
  - action

Located in: 
  - [https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/controller/FrontController.php](classes/controller/FrontController.php)

This hook has an `$array_return` parameter set to `true` (module output will be set by name in an array, [see explaination here]({{< relref "/8/modules/concepts/hooks">}})).

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

## Hook call in codebase

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