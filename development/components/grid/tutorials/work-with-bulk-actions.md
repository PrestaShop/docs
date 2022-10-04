---
title: How to use Bulk actions in Grid
menuTitle: Bulk Actions
weight: 1
---

# How to use Bulk actions in Grid?

In addition to displaying data tables, Grid component also comes with a lot of additional functionality. One of it is Bulk actions.

## What is Bulk action?

Bulk action is action (e.g. Delete, Change status & etc) that can be performed on multiple entries in table. This is a common task when using Grid (e.g. Delete multiple selected Suppliers with a single click).

## How to add Bulk actions to Grid?

Let's take an example from Customers grid definition. It has 3 bulk actions: Enable, Disable & Delete multiple customers. See code example below:

```php
<?php // src/Core/Grid/Definition/Factory/CustomerGridDefinitionFactory.php

final class CustomerGridDefinitionFactory extends AbstractGridDefinitionFactory
{
    // ...

    protected function getBulkActions()
    {
        return (new BulkActionCollection())
            ->add(
                (new SubmitBulkAction('enable_selection'))
                ->setName($this->trans('Enable selection', [], 'Admin.Actions'))
                ->setOptions([
                    'submit_route' => 'admin_customers_enable_bulk',
                ])
            )
            ->add(
                (new SubmitBulkAction('disable_selection'))
                ->setName($this->trans('Disable selection', [], 'Admin.Actions'))
                ->setOptions([
                    'submit_route' => 'admin_customers_disable_bulk',
                ])
            )
            ->add((new DeleteCustomersBulkAction('delete_selection'))
                ->setName($this->trans('Delete selected', [], 'Admin.Actions'))
                ->setOptions([
                    'customers_bulk_delete_route' => 'admin_customers_delete_bulk',
                ])
            )
        ;
    }
}
```

As you see, Grid stores Bulk actions in `BulkActionCollection` object. This means that every Bulk action needed for Grid must be added to `BulkActionCollection` using `add()` method.

## How to add Bulk actions from module?

You can add additional Bulk actions to any Grid using hook. You have to follow these steps:

1. Register hook `action{gridId}GridDefinitionModifier` where `{gridId}` is Grid id (e.g. `customer` for Customers grid, this means that hook name would be `actionCustomerGridDefinitionModifier`).
2. Implement hook method in your module:

```php
<?php
// modules/mymodule/mymodule.php

class MyModule extends Module
{
    // ...

    /**
     * Use hook to add Bulk action for subscribing multiple customers to newsletter
     */
    public function hookActionCustomerGridDefinitionModifier(array $params)
    {
        // $params['definition'] is instance of \PrestaShop\PrestaShop\Core\Grid\Definition\GridDefinition
        $params['definition']->getBulkActions()->add(
                (new SubmitBulkAction('subscribe_newsletter'))
                    ->setName('Subscribe newsletter')
                    ->setOptions([
                        // in most cases submit action should be implemented by module
                        'submit_route' => 'admin_my_module_customers_bulk_subscribe_newsletter',
                    ]) 
            );
    }
}
```

Now you should be able to see new Bulk action available in Customers grid!

## How to create custom Bulk action?

PrestaShop already comes with a bunch of Bulk actions that are available for use in your Grids or for extending PrestaShop grids. However, in some use cases you may find that existing Bulk actions do not fit your needs. Luckily, there is a solution, you can create custom Bulk actions.

First, you need to create Bulk action itself:

```php
<?php
// modules/mymodule/src/Grid/Action/Bulk

use PrestaShop\PrestaShop\Core\Grid\Action\Bulk\AbstractBulkAction;
use Symfony\Component\OptionsResolver\OptionsResolver;

// It extends AbstractBulkAction,
// but you can also implement \PrestaShop\PrestaShop\Core\Grid\Action\Bulk\BulkActionInterface 
// if for some reason you want to avoid using abstract class
final class ExportBulkAction extends AbstractBulkAction
{
    public function getType()
    {
        return 'export';
    }

    protected function configureOptions(OptionsResolver $resolver)
    {
        $resolver
            ->setDefaults([
                // fictional action implemented by module to export only selected customers
                'submit_route' => 'admin_my_module_customers_bulk_export',
            ])
        ;
    }
}
```

Then you need to create template so it can render nicely in your grid.

```twig
{# mymodule/views/PrestaShop/Admin/Common/Grid/Actions/Bulk/export.html.twig #}

{# This button should be used with SubmitBulkActionExtension grid extension in Javascript #}

<button id="{{ '%s_grid_bulk_action_%s'|format(grid.id, action.id) }}"
        class="dropdown-item js-bulk-action-submit-btn"
        type="button"
        data-form-url="{{ path(action.options.submit_route) }}"
        data-form-method="GET"
>
  {{ action.name }}
</button>
```

Last thing is to add your newly created Bulk action to Grid's `BulkActionCollection` and then it should be available in your Grid!
