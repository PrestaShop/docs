---
title: Widgets
weight: 3
---

# Widgets

Widget is an advanced concept introduced on PrestaShop 1.7, extending hooks
feature.


## Limitation of hooks

In their basic use, a display hook will be shown at a specific place in the
template.
If a module wants to display the same additional content on several places,
whatever the merchant chose, it still has to register and implement all
the possible hooks.

With widgets, module developers can display content everywhere the module is
asked to do so.
When a module implements widgets in its code, it allows:

* a theme to call the module directly with `{widget name="<module_name>"}`
* the core to fallback on it if a registered hook is called but its method
`hook<hook_name>()` does not exist.


## Make a module widgets compliant

In order to be widget-compliant, a module needs to follow two steps:

### Implement interface

Before calling a module for widgets, the core must be sure your module has
this feature available. This can be done by implementing the interface
`PrestaShop\PrestaShop\Core\Module\WidgetInterface`
([Source code](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/Core/Module/WidgetInterface.php)).

### Declare mandatory methods

As soon as a module implements the `WidgetInterface`, two methods must be declared:

```php
<?php
public function renderWidget($hookName, array $configuration);
public function getWidgetVariables($hookName, array $configuration);
```

The method `renderWidget()` is the entrypoint for the core in order to get the generated view (fetch smarty template).
The method `getWidgetVariables()` returns the variables you want to assign to smarty.

The parameters sent to both functions are the same:

* `$hookName`: providing the hook name allows the module to have a different behavior according to it.
  * `null` when the module is called directly from the widget system.
  * Name of the hook when a non-implemented hook is called.
* `$configuration`: This is the equivalent of the parameter `$params` when a hook
is called.

## Call Widgets

Once the module has implemented the method `renderWidget()`, there are two ways to call it.

### The old way, with hooks

The first one is by triggering a hook manually registered to the module, but not implemented by it.

* From a PHP class

```php
<?php
Hook::exec($hook_name)
```

* From a Smarty template

```tpl
{hook h='<hook_name>'}
```

The called method will be different regarding the module content:

{{< figure src="../img/widget-example-hooks.png" title="Using widget from hooks" >}}

## With widget

The function `renderWidget()` of a specific module can be called directly:

* From a Smarty template (recommended)

```smarty
<!-- Generic call -->
{widget name='<module_name>'}

<!-- Call with a hook name -->
{widget name='<module_name>' hook='<hook_name>'}
```

* From a PHP class

```php
<?php
Hook::coreRenderWidget(Module $module, $hook_name, $params);
```

## Code example

* From a PHP class


```php
<?php

if (!defined('_PS_VERSION_')) {
    exit;
}

use PrestaShop\PrestaShop\Core\Module\WidgetInterface;
class MyModule extends Module implements WidgetInterface
{
    public function __construct()
    {
        $this->name = 'mymodule';
        $this->tab = 'front_office_features';
        $this->version = '1.0.0';
        $this->author = 'Firstname Lastname';
        $this->need_instance = 0;
        $this->ps_versions_compliancy = [
            'min' => '1.7',
            'max' => _PS_VERSION_
        ];
        $this->bootstrap = true;

        parent::__construct();

        $this->displayName = $this->l('My module');
        $this->description = $this->l('Description of my module.');

        $this->confirmUninstall = $this->l('Are you sure you want to uninstall?');
    }

    public function renderWidget($hookName, array $configuration) 
    {
        $this->smarty->assign($this->getWidgetVariables($hookName, $configuration));

        return $this->fetch('module:'.$this->name.'/views/templates/widget/mymodule.tpl');
    }
 
    public function getWidgetVariables($hookName , array $configuration)
    {
        $myParamKey = $configuration['my_param_key'] ?? null;
        
        return [
            'my_var1' => 'my_var1_value',
            'my_var2' => 'my_var2_value',
            'my_var_n' => 'my_var_n_value',
            'my_dynamic_var_by_param' => $this->getMyDynamicVarByParamKey($myParamKey),
        ];
    }
    
    public function getMyDynamicVarByParamKey(string $paramKey)
    {
        if($paramKey === 'my_param_value') {
           return 'my_dynamic_var_by_my_param_value';
        }

        return null;
    }
}

```

* From a Smarty template

```smarty
{widget name='mymodule' my_param_key='my_param_value'}
```


The hook name sent to `renderWidget` will depend on the value provided to the optional `hook` parameter.
