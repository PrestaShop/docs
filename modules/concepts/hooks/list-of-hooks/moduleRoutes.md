---
menuTitle: moduleRoutes
Title: moduleRoutes
hidden: true
hookTitle: 
files:
  - classes/Dispatcher.php
locations:
  - front office
type: 
hookAliases:
hasExample: true
---

# Hook moduleRoutes

## Information

{{% notice tip %}}
**Adds route to the PrestaShop router** 

This hook allows your module to extend default PrestaShop routes with custom ones and map them to your module front controllers.
{{% /notice %}}


Hook locations: 
  - front office

Located in: 
  - [classes/Dispatcher.php](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/Dispatcher.php)

This hook has an `$array_return` parameter set to `true` (module output will be set by name in an array, [see explaination here]({{< relref "/8/development/components/hook/dispatching-hook">}})).

This hook has a `$check_exception` parameter set to `false` (check permission exception, [see explaination here]({{< relref "/8/development/components/hook/dispatching-hook">}})).

## Call of the Hook in the origin file

```php
Hook::exec('moduleRoutes', ['id_shop' => $id_shop], null, true, false)
```

## Example implementation

This hook must return an `array` of routes, keyed by the names of the routes, and each route structured by:

```php
array(
  'rule' => string,
  'keywords' => array(),
  'controller' => string,
  'params' => array(
    'fc' => string,
    'module' => string
  )
)
```

### `rule` and `keywords` parameters

`rule` is the URL that will be matched by the router. `rule` can contain parameters, enclosed with `{}`. 
For example, to add an `id` parameter in your route, use the following `rule`: 

`myrule/{id}`

Multiple parameters can be used, for example: 

`myrule/{id}/{slug}`

Each parameter in your `rule` must be declared in the `keywords` array.

In our example, `id` must be an integer and `slug` a string, and will be forwarded to the controller with `id` and `slug` parameter names: 

```php
[
  'rule' => 'myrule/{id}/{slug}',
  'keywords' => [
    'id' => [
      'regexp' => '[0-9]*',
      'param' => 'id'
    ],
    'slug' => [
      'regexp' => '.*',
      'param' => 'slug'
    ]
  ],
  'controller' => 'myrulecontroller',
  'params' => [
    'fc' => 'module',
    'module' => 'mymodulename'
  ]
]
```

### Implementation

This example creates two `ModuleFrontController` controllers, and extends PrestaShop routes to map 2 routes to those controllers: one for listing items, the other one for showing one specific item.

Create a `list.php` `ModuleFrontController` in `mymoduleaddingroutes/controllers/front/`:

```php
class MyModuleAddingRoutesListModuleFrontController extends ModuleFrontController
{
    public function initContent()
    {
        $this->setTemplate('module:mymoduleaddingroutes/views/templates/front/list.tpl');
    }
}
```

and a `show.php` `ModuleFrontController` in `mymoduleaddingroutes/controllers/front/`:

```php
class MyModuleAddingRoutesShowModuleFrontController extends ModuleFrontController
{
    public function initContent()
    {
        // It is just an example. Remember to always validate the input data!
        $this->context->smarty->assign(
            [
              'id' => Tools::getValue('id'),
              'slug' => Tools::getValue('slug')
            ]
        );
        
        $this->setTemplate('module:mymoduleaddingroutes/views/templates/front/show.tpl');
    }
}
```

Now, create two templates in `mymoduleaddingroutes/views/templates/front/`: 

`list.tpl`: 

```html
<h1>List template</h1>
```

`show.tpl`:

```html
<h1>Show template</h1>
Id: {$id}
Slug: {$slug}
```

Now we have 2 controllers, rendering 2 templates, we can create our routes with `moduleRoutes` hook, in `mymoduleaddingroutes/mymoduleaddingroutes.php`:

```php
<?php
class MyModuleAddingRoutes extends Module 
{
    public function install()
    {
        return parent::install() && $this->registerHook('moduleRoutes');
    }

    public function hookModuleRoutes()
    {
        return [
          'module-mymoduleaddingroutes-list' => [
            'rule' => 'mymoduleaddingroutes/list',
            'keywords' => [],
            'controller' => 'list',
            'params' => [
                'fc' => 'module',
                'module' => 'mymoduleaddingroutes'
            ]
          ],
          'module-mymoduleaddingroutes-show' => [
            'rule' => 'mymoduleaddingroutes/show/{id}/{slug}',
            'keywords' => [
              'id' => [
                'regexp' => '[0-9]*',
                'param' => 'id'
              ],
              'slug' => [
                'regexp' => '.*',
                'param' => 'slug'
              ]
            ],
            'controller' => 'show',
            'params' => [
                'fc' => 'module',
                'module' => 'mymoduleaddingroutes'
            ]
          ]
        ];
    }
}
```

The complete implementation example is available in our [example modules repository](https://github.com/PrestaShop/example-modules/demomoduleroutes).