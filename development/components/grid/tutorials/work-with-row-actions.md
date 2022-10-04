---
title: How to use Row Actions
menuTitle: Row Actions
weight: 2
---

# How to use Row actions

In addition to displaying data tables, Grid component also comes with a lot of additional features. One is Row actions.

## What is a Row action?

A Row action is an action (e.g. Edit, View & Delete) that is applicable to a specific row in the Grid.

## How to add row actions to Grid?

Let's take an example from Category grid definition. It has 3 (row) actions already:

* View;
* Edit;
* Delete;

See code example from the Core below:

```php
<?php // src/Core/Grid/Definition/Factory/CategoryGridDefinitionFactory.php

final class CategoryGridDefinitionFactory extends AbstractFilterableGridDefinitionFactory
{
    // ...

    /**
     * @return RowActionCollection
     */
    private function getRowActions()
    {
        return (new RowActionCollection())
            ->add(
                (new LinkRowAction('view'))
                ->setName($this->trans('View', [], 'Admin.Actions'))
                ->setIcon('zoom_in')
                ->setOptions([
                    'route' => 'admin_categories_index',
                    'route_param_name' => 'categoryId',
                    'route_param_field' => 'id_category',
                    'accessibility_checker' => $this->categoryForViewAccessibilityChecker,
                    // Thanks to this option a click on the row will have the same effect as this action
                    'clickable_row' => true,
                ])
            )
            ->add(
                (new LinkRowAction('edit'))
                ->setName($this->trans('Edit', [], 'Admin.Actions'))
                ->setIcon('edit')
                ->setOptions([
                    'route' => 'admin_categories_edit',
                    'route_param_name' => 'categoryId',
                    'route_param_field' => 'id_category',
                    // A grid usually has only one click action, categories are a special case because the view
                    // action may be filtered via the accessibility_checker option, in which case the edit action
                    // will be used The order is important then as the first row action is used by default
                    'clickable_row' => true,
                ])
            )
            ->add((new SubmitRowAction('delete'))
                ->setName($this->trans('Delete', [], 'Admin.Actions'))
                ->setIcon('delete')
                ->setOptions([
                    'method' => 'DELETE',
                    'route' => 'admin_categories_delete',
                    'route_param_name' => 'categoryId',
                    'route_param_field' => 'id_category',
                    'confirm_message' => $this->trans(
                        'Delete selected item?',
                        [],
                        'Admin.Notifications.Warning'
                    ),
                ])
            );
    }
}
```

As shown above, Grid stores Row actions using a `RowActionCollection` object. This means that every action needed for Grid must be added to `RowActionCollection` using `add()` method.
You'll find the list of existing actions in the documentation.

## How to add Row actions to a Grid using a module?

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
     * Use hook to add Row action for subscribing customer to newsletter
     */
    public function hookActionCustomerGridDefinitionModifier(array $params)
    {
        /** @var \PrestaShop\PrestaShop\Core\Grid\Definition\GridDefinition */
        $gridDefinition = $params['definition'];

        $gridDefinition->getGridActions()
            ->add((new SubmitRowAction('subscribe'))
                ->setName($this->trans('Subscribe', [], 'Admin.Actions'))
                ->setIcon('mail')
                ->setOptions([
                    'route' => 'admin_customer_subscribe',
                    'route_param_name' => 'customerId',
                    'route_param_field' => 'id_customer',
                    'confirm_message' => $this->trans(
                        'Subscribe to newsletter?',
                        [],
                        'Admin.Notifications.Warning'
                    ),
                ])
            )
        ;
    }
}
```

Now you should be able to see new action available into the Customers grid!

## How to create custom Row action?

PrestaShop already comes with a bunch of actions that are available for use in your Grids or for extending PrestaShop grids.
However, in some use cases you may find that the existing actions do not fit your needs.

Luckily, there is a solution, you can create and register your own custom actions.

First, you need to create a Grid action itself:

```php
<?php
// modules/mymodule/src/Grid/Action/Type/

use PrestaShop\PrestaShop\Core\Grid\Action\AbstractRowAction;

/**
 * It extends AbstractRowAction,
 * but you can also implement \PrestaShop\PrestaShop\Core\Grid\Action\RowActionInterface 
 * if for some reason you want to avoid using the abstract class
 */ 
final class MySpecificRowAction extends AbstractRowAction
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
         * options passed to the resolver will be available in the Grid Row action
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
{# mymodule/views/PrestaShop/Admin/Common/Grid/Actions/Row/my_specific.html.twig #}

{# This button should be used with LinkRowActionExtension grid extension in Javascript #}

<a class="{{ class }}"
   href="{{ path(action.options.route, action.options.route_params ) }}"
>
    {{ action.name }}
</a>
```

Last thing is to add your newly created Row action to Grid's `RowActionCollection` and then it should be available in your Grid!
