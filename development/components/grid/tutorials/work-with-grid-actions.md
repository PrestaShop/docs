---
title: How to use Grid Actions
menuTitle: Grid Actions
weight: 2
---

# How to use Grid actions

In addition to displaying data tables, Grid component also comes with a lot of additional features. One is the Grid actions.

## What is a Grid action?

A Grid action is an action (e.g. Import, Export & Show SQL query) that is applicable to the entire Grid.

## How to add actions to Grid?

Let's take an example from Customers grid definition. It has 5 (grid) actions already:

* Import;
* Export;
* Refresh;
* Show SQL query;
* Export to the SQL Manager;

See code example from the Core below:

```php
<?php // src/Core/Grid/Definition/Factory/CustomerGridDefinitionFactory.php

final class CustomerGridDefinitionFactory extends AbstractGridDefinitionFactory
{
    // ...

    /**
     * {@inheritdoc}
     */
    protected function getGridActions()
    {
        return (new GridActionCollection())
            ->add(
                (new LinkGridAction('import'))
                ->setName($this->trans('Import', [], 'Admin.Actions'))
                ->setIcon('cloud_upload')
                ->setOptions([
                    'route' => 'admin_import',
                    'route_params' => [
                        'import_type' => 'customers',
                    ],
                ])
            )
            ->add(
                (new LinkGridAction('export'))
                ->setName($this->trans('Export', [], 'Admin.Actions'))
                ->setIcon('cloud_download')
                ->setOptions([
                    'route' => 'admin_customers_export',
                ])
            )
            ->add(
                (new SimpleGridAction('common_refresh_list'))
                ->setName($this->trans('Refresh list', [], 'Admin.Advparameters.Feature'))
                ->setIcon('refresh')
            )
            ->add(
                (new SimpleGridAction('common_show_query'))
                ->setName($this->trans('Show SQL query', [], 'Admin.Actions'))
                ->setIcon('code')
            )
            ->add(
                (new SimpleGridAction('common_export_sql_manager'))
                ->setName($this->trans('Export to SQL Manager', [], 'Admin.Actions'))
                ->setIcon('storage')
            );
    }
}
```

As you see, Grid stores Grid actions using a `GridActionCollection` object. This means that every action needed for Grid must be added to `GridActionCollection` using `add()` method.
You'll find the list of existing actions in the documentation.

## How to add Grid actions to a Grid using a module?

You can add additional actions to any Grid by hooking to the Grid workflow. You have to follow these steps:

1. Register hook `action{gridId}GridDefinitionModifier` where `{gridId}` is Grid id (e.g. `customer` for Customers grid, this means that hook name would be `actionCustomerGridDefinitionModifier`).
2. Implement hook method in your module:

```php
<?php
// modules/mymodule/mymodule.php

class Mymodule extends Module
{
    // ...

    /**
     * Use hook to add Grid action for subscribing multiple customers to newsletter
     */
    public function hookActionCustomerGridDefinitionModifier(array $params)
    {
        /** @var \PrestaShop\PrestaShop\Core\Grid\Definition\GridDefinition */
        $gridDefinition = $params['definition'];

        $gridDefinition->getGridActions()
            ->add(
                (new LinkGridAction('new_action'))
                    ->setName($this->trans('New action', [], 'MyModule.Admin.Actions'))
                    ->setIcon('add_circle') // icon from https://materializecss.com/icons.html by default
                    ->setOptions([
                        'route' => 'my_module_specific_route',
                    ])
            )
        ;
    }
}
```

Now you should be able to see new action available into the Customers grid!

## How to create custom Grid action?

PrestaShop already comes with a bunch of actions that are available for use in your Grids or for extending PrestaShop grids.
However, in some use cases you may find that the existing actions do not fit your needs.

Luckily, there is a solution, you can create and register your own custom actions.

First, you need to create a Grid action itself:

```php
<?php
// modules/mymodule/src/Grid/Action/Type/

use PrestaShop\PrestaShop\Core\Grid\Action\AbstractGridAction;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * It extends AbstractGridAction,
 * but you can also implement \PrestaShop\PrestaShop\Core\Grid\Action\GridActionInterface 
 * if for some reason you want to avoid using the abstract class
 */ 
final class MySpecificAction extends AbstractGridAction
{
    /**
     * {@inheritdoc}
     */
    public function getType()
    {
        return 'my_specific';
    }

    /**
     * {@inheritdoc}
     */
    protected function configureOptions(OptionsResolver $resolver)
    {
        /**
         * options passed to the resolver will be available in the Grid action
         * and also in the template responsible of rendering the action.
         */
        $resolver
            ->setRequired([
                'route',
            ])
            ->setDefaults([
                'route_params' => [],
            ])
            ->setAllowedTypes('route', 'string')
            ->setAllowedTypes('route_params', 'array');
    }
}
```

Then you need to create template so it can render nicely in your grid.

```twig
{# mymodule/views/PrestaShop/Admin/Common/Grid/Actions/Grid/my_specific.html.twig #}

<a id="{{ '%s_grid_action_%s'|format(grid.id, action.id) }}" href="{{ path(action.options.route, action.options.route_params) }}" class="dropdown-item">
  {% if action.icon is not empty %}
    <i class="material-icons">{{ action.icon }}</i>
  {% endif %}
  {{ action.name }}
</a>
```

Last thing is to add your newly created Grid action to Grid's `GridActionCollection` and then it should be available in your Grid!
