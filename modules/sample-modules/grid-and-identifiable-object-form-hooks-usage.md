---
title: Grid and identifiable object form hooks usage example
weight: 1
---

# Grid and identifiable object form hooks usage example
{{< minver v="1.7.6" title="true" >}}

## Introduction

In this tutorial we are going to build module which extends customers list with one extra column
which can be toggled. It can have two states - turned on or off. In customer creation and edit
form we will add switch which will also manage the same state. By following this tutorial you will learn
how to:

- extend modern grids. [Grid component]({{< relref "/8/development/components/grid/" >}}) 
- extend identifiable object form. [identifiable object form]({{< relref "/8/development/architecture/migration-guide/forms/CRUD-forms" >}}) 

The module created within this tutorial can be found [here](https://github.com/PrestaShop/demo-cqrs-hooks-usage-module)

## Prerequisites

- To be familiar with basic module creation.

## Register hooks

On module installation the following hooks are being registered:

- `action`**Customer**`GridDefinitionModifier` - for adding new column to customers grid.
- `action`**Customer**`GridQueryBuilderModifier` - for modifying customers grid sql.
- `action`**Customer**`FormBuilderModifier` - for adding new field to customers create or edit form field.
- `actionAfterCreate`**Customer**`FormHandler` - to execute the saving process of added field from the module.
- `actionAfterUpdate`**Customer**`FormHandler` - to execute the update process of added field from the module.

```php
<?php
public function install()
{
    return parent::install() &&
        $this->registerHook('actionCustomerGridDefinitionModifier') &&
        $this->registerHook('actionCustomerGridQueryBuilderModifier') &&
        $this->registerHook('actionCustomerFormBuilderModifier') &&
        $this->registerHook('actionAfterCreateCustomerFormHandler') &&
        $this->registerHook('actionAfterUpdateCustomerFormHandler') &&
        $this->installTables()
    ;
}
```

{{% notice note %}}
Hooks `action`**Customer**`GridDefinitionModifier` and `action`**Customer**`GridQueryBuilderModifier` are built
using grid id which in this case is **Customer**. If you want to use hook for any other grid 
You can check any definition factory service in `PrestaShop\PrestaShop\Core\Grid\Definition\Factory` to see available grid ids. Grid id is returned by `getId()` method.
<br />
<br />
Hooks `action`**Customer**`FormBuilderModifier`,`actionAfterCreate`**Customer**`FormHandler` and `actionAfterUpdate`**Customer**`FormHandler` are built using unique identifier which
in this case is **Customer** is retrieved from its form type **CustomerType**. E.g id retrieved from **ManufacturerType** will be **Manufacturer**. Some types might use
function `getBlockPrefix` to retrieve the unique id
{{% /notice %}}

## Adding new column to customers grid

### Extending grid definition and filters

```php
<?php

use PrestaShop\PrestaShop\Core\Grid\Definition\GridDefinitionInterface;
use PrestaShop\PrestaShop\Core\Grid\Column\Type\Common\ToggleColumn;
use PrestaShopBundle\Form\Admin\Type\YesAndNoChoiceType;

class Ps_DemoCQRSHooksUsage extends Module
{
    // ...
    
    /**
     * Hook allows to modify Customers grid definition.
     * This hook is a right place to add/remove columns or actions (bulk, grid).
     *
     * @param array $params
     */
    public function hookActionCustomerGridDefinitionModifier(array $params)
    {
        /** @var GridDefinitionInterface $definition */
        $definition = $params['definition'];

        $translator = $this->getTranslator();

        $definition
            ->getColumns()
            ->addAfter(
                'optin',
                (new ToggleColumn('is_allowed_for_review'))
                    ->setName($translator->trans('Allowed for review', [], 'Modules.Ps_DemoCQRSHooksUsage'))
                    ->setOptions([
                        'field' => 'is_allowed_for_review',
                        'primary_field' => 'id_customer',
                        'route' => 'ps_democqrshooksusage_toggle_is_allowed_for_review',
                        'route_param_name' => 'customerId',
                    ])
            )
        ;

        $definition->getFilters()->add(
            (new Filter('is_allowed_for_review', YesAndNoChoiceType::class))
            ->setAssociatedColumn('is_allowed_for_review')
        );
    }
    
    // ...
}
```

This hook, through `$params` array, received `GridDefinition` that defines how the grid is rendered. See [Grid definition]({{< relref "/8/development/components/grid/#grid-definition" >}}) for more information.  
In this sample a new toggable column which determines if the customer is eligible to review products is added just after another column which has id `optin`. The sample code also demonstrates how add new filter.

### Creating route for toggle column

`ToggleColumn` - used to display booleans, it will display an icon instead of the value. If user clicks on it, this triggers a toggle of the boolean value. More information about this column and all available parameters can be found [here]({{< relref "/8/development/components/grid/columns-reference/toggle" >}}).  
As in this sample module we are creating `ToggleColumn` we need to configure the route in which the toggling action will be performed. Indeed when the end-user clicks on this column, an ajax request is performed and must reach one new controller to handle the action (here: toggle a value on and off).  
If you only want to display data then this step can be skipped. E.g you are creating `DataColumn`. See [Column references]({{< relref "/8/development/components/grid/columns-reference/" >}}) for full list of grid columns available.

- Create controller `DemoCQRSHooksUsage\Controller\Admin\CustomerReviewController`:

```php
<?php
namespace DemoCQRSHooksUsage\Controller\Admin;

use PrestaShopBundle\Controller\Admin\FrameworkBundleAdminController;

class CustomerReviewController extends FrameworkBundleAdminController
{
}
```

- Create controller `action`:

{{% notice note %}}
**This example has been simplified for practical reasons.** 

You can find full implementation [here](https://github.com/PrestaShop/demo-cqrs-hooks-usage-module) which uses CQRS pattern to toggle the reviewer state. [More about it here]({{< relref "/8/development/architecture/domain/cqrs" >}}).
{{% /notice %}}

```php
<?php
namespace DemoCQRSHooksUsage\Controller\Admin;

use PrestaShopBundle\Controller\Admin\FrameworkBundleAdminController;

class CustomerReviewController extends FrameworkBundleAdminController
{
    public function toggleIsAllowedForReviewAction($customerId)
    {
        //  updating reviewer state can be handled here
        return $this->redirectToRoute('admin_customers_index');
    }
}
```

- As this is a Symfony controller, we must configure the related routing (read more about [symfony routing](https://symfony.com/doc/current/routing.html)), which means create a route in `ps_democqrshooksusage/config/routes.yml` file:

```yml
ps_democqrshooksusage_toggle_is_allowed_for_review:
  path: demo-cqrs-hook-usage/{customerId}/toggle-is-allowed-for-review
  methods: [POST]
  defaults:
    _controller: 'DemoCQRSHooksUsage\Controller\Admin\CustomerReviewController::toggleIsAllowedForReviewAction'
  requirements:
    customerId: \d+
```

Route name `ps_democqrshooksusage_toggle_is_allowed_for_review` matches the one that was passed as mandatory option when creating the
`ToggleColumn`. 

### Extending grid query builder

By just extending grid definition we won't be able to display any data since we need to fetch it first. Luckily, we can add additional sql
conditions by extending [doctrine's query builder](https://www.doctrine-project.org/projects/doctrine-orm/en/2.7/reference/query-builder.html).

```php
<?php
use Doctrine\DBAL\Query\QueryBuilder;
use PrestaShop\PrestaShop\Core\Search\Filters\CustomerFilters;

class Ps_DemoCQRSHooksUsage extends Module
{

    // ...

    /**
     * Hook allows to modify Customers query builder and add custom sql statements.
     *
     * @param array $params
     */
    public function hookActionCustomerGridQueryBuilderModifier(array $params)
    {
        /** @var QueryBuilder $searchQueryBuilder */
        $searchQueryBuilder = $params['search_query_builder'];

        /** @var CustomerFilters $searchCriteria */
        $searchCriteria = $params['search_criteria'];

        $searchQueryBuilder->addSelect(
            'IF(dcur.`is_allowed_for_review` IS NULL,0,dcur.`is_allowed_for_review`) AS `is_allowed_for_review`'
        );

        $searchQueryBuilder->leftJoin(
            'c',
            '`' . pSQL(_DB_PREFIX_) . 'democqrshooksusage_reviewer`',
            'dcur',
            'dcur.`id_customer` = c.`id_customer`'
        );

        if ('is_allowed_for_review' === $searchCriteria->getOrderBy()) {
            $searchQueryBuilder->orderBy('dcur.`is_allowed_for_review`', $searchCriteria->getOrderWay());
        }

        foreach ($searchCriteria->getFilters() as $filterName => $filterValue) {
            if ('is_allowed_for_review' === $filterName) {
                $searchQueryBuilder->andWhere('dcur.`is_allowed_for_review` = :is_allowed_for_review');
                $searchQueryBuilder->setParameter('is_allowed_for_review', $filterValue);

                if (!$filterValue) {
                    $searchQueryBuilder->orWhere('dcur.`is_allowed_for_review` IS NULL');
                }
            }
        }
    }
    
    // ...
}
```

This sample demonstrates how to extend sql of the customers grid. From our custom database table `democqrshooksusage_reviewer` we fetch the result of field `is_allowed_for_review`. This name must match the id we added in the grid definition. In order for sorting to work we also add `orderBy` condition and finally, in order
for filters to work `where` conditions are added if the filter exists in `$searchCriteria->getFilters()`.

### Result

After completing the steps above by going to customers list you should see new column "allowed for review" added.

{{< figure src="../img/extended_customers_grid.png" title="Allowed for review column added to customers list" >}}


## Adding new form field to customer form

### Modifying customers form builder

In this step we are appending to the customers form a new `SwitchType` form field - its one of many form types which already exist in PrestaShop. More information
about it can be found [here]({{< relref "/8/development/components/form/types-reference/" >}}).

{{% notice note %}}
**This example has been simplified for practical reasons.** 

You can find full implementation [here](https://github.com/PrestaShop/demo-cqrs-hooks-usage-module) which uses CQRS pattern to get reviewer state. [More about it here]({{< relref "/8/development/architecture/domain/cqrs" >}}).
{{% /notice %}}

```php
<?php
// modules/ps_democqrshooksusage/ps_democqrshooksusage.php

use Symfony\Component\Form\FormBuilderInterface;
use PrestaShopBundle\Form\Admin\Type\SwitchType;

class Ps_DemoCQRSHooksUsage extends Module
{
    
    // ...

    public function hookActionCustomerFormBuilderModifier(array $params)
    {
        /** @var FormBuilderInterface $formBuilder */
        $formBuilder = $params['form_builder'];
        $formBuilder->add('is_allowed_for_review', SwitchType::class, [
            'label' => $this->getTranslator()->trans('Allow reviews', [], 'Modules.Ps_DemoCQRSHooksUsage'),
            'required' => false,
        ]);

        $customerId = $params['id'];

        $params['data']['is_allowed_for_review'] = $this->getIsAllowedForReview($customerId);

        $formBuilder->setData($params['data']);
    }

    private function getIsAllowedForReview($customerId)
    {
        // implement your data retrieval logic here

        return true;
    }
    
    // ...
}
```

In this sample by using [Symfony form builder](https://symfony.com/doc/current/forms.html) we just added another Form type. To determine if its
on or off we also need to reset its form data by assigning `is_allowed_for_review` value to `true` or `false`.

### Result

By completing the steps above newly added switch is now visible in the customers form.

{{< figure src="../img/allow_for_review_switch.png" title="Allowed for review switch added to customers form" >}}

## Extending customers form after create and update actions

In the previous example we have added a switch field ! But when we want to save its state (on or off) nothing happens. The data is not modified. This is because we have not used the hooks
dedicated to handle this topic - lets do that!

{{% notice note %}}
**This example has been simplified for practical reasons.** 

You can find full implementation [here](https://github.com/PrestaShop/demo-cqrs-hooks-usage-module) which uses CQRS pattern to create or update reviewer state. [More about it here]({{< relref "/8/development/architecture/domain/cqrs" >}}).
{{% /notice %}}

```php
<?php

public function hookActionAfterUpdateCustomerFormHandler(array $params)
{
    $this->updateCustomerReviewStatus($params);
}

public function hookActionAfterCreateCustomerFormHandler(array $params)
{
    $this->updateCustomerReviewStatus($params);
}

private function updateCustomerReviewStatus(array $params)
{
    $customerId = $params['id'];
    /** @var array $customerFormData */
    $customerFormData = $params['form_data'];
    $isAllowedForReview = (bool) $customerFormData['is_allowed_for_review'];
    
    // implement review status saving here
}

```

when we created the switch type form we named it `is_allowed_for_review`. By using the same name we can get the state (on or off).
This hook receives from `$params` the form data, that you can retrieve like this: `$params['form_data']`.
All the form data is available here, including `is_allowed_for_review` data which comes from the switch.
