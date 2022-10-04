---
title: The Position Updater component
menuTitle: Position Updater
---

# The Position updater component

## Introduction

Order elements position is a common use case in any CMS or a shop back-office. You may need to order, categories, products, modules or adds.
The use cases are endless. Which is why we developed a generic component to help you manage your position updates quickly and efficiently.
Combined with our Grid component this will help you build entity lists more easily. This component will be divided into ... components:

* `PositionDefinition`: it defined the basic information to compute and update the position( table, id field, position field, ...)
* `PositionUpdate`: this object contains all the atomic modifications that needs to be done on your list (symbolized by `PositionModification` objects)
* `PositionUpdateFactory`: this service allows you to build a `PositionUpdate` easily base on your `PositionDefinition` and basic modification data
* `GridPositionUpdater`: it is the main part of the component which gives you interfaces to perform position modifications

## PositionDefinition

The first thing, and nearly only thing, you need to create is you `PositionDefinition` which will hold the basic structure to manage the positions in your list.
To allow our component to automatically compute position updates we need a few data:

* **table**: which table is being ordered and contains the position (`ps_category`, `ps_product`, ...)
* **idField**: what is the name of the field containing the id of this table (`id_category`, `id_product`)
* **positionField**: what is the name of the field containing the position in this table (`position`, `pos`, `rank`, ...)
* **parentIdField** (optional): in some cases the position depends on a parent context and your table will contains different positions based on a different parent (`id_category`, `id_parent`, ...)

### Manual definition

You can define this `PositionDefinition` manually:

```php
<?php
use PrestaShop\PrestaShop\Core\Grid\Position\PositionDefinition;
    
$positionDefinition = new PositionDefinition(
    'product',
    'id_product',
    'position',
    'id_category_default'
);
```

### Service definition

Or you can define a service to avoid duplicating your code:

```yaml
services:
  _defaults:
    public: true

  prestashop.product.grid.position_definition:
    class: 'PrestaShop\PrestaShop\Core\Grid\Position\PositionDefinition'
    arguments:
      - 'product'
      - 'id_product'
      - 'position'
      - 'id_category_default'
```

## Building your PositionUpdate

The good news is that you now made the hardest part, all other computing and database queries will be managed by our component.
The only thing you have to do now is provide the updates you want to apply to your list positions. We provide a default `PositionUpdateFactory`
to help you build your update, it is defined as a Symfony service accessible via `prestashop.core.grid.position.position_update_factory`.

```php
<?php
use PrestaShop\PrestaShop\Core\Grid\Position\PositionUpdateFactory;
use PrestaShop\PrestaShop\Core\Grid\Position\PositionDefinition;
use PrestaShop\PrestaShop\Core\Grid\Position\PositionUpdate;
use PrestaShop\PrestaShop\Core\Grid\Position\Exception\PositionDataException;

$positionsData = [
    'positions' => [
        [
            'rowId' => 12,
            'oldPosition' => 0,
            'newPosition' => 1,
        ],
        [
            'rowId' => 15,
            'oldPosition' => 5,
            'newPosition' => 3,
        ]
    ],
    'parentId' => $categoryId,
];

/** @var PositionDefinition $positionDefinition */
$positionDefinition = $this->get('prestashop.product.grid.position_definition');

/** @var PositionUpdateFactory $positionUpdateFactory */
$positionUpdateFactory = $this->get('prestashop.core.grid.position.position_update_factory');

try {
    /** @var PositionUpdate $positionUpdate */
    $positionUpdate = $positionUpdateFactory->buildPositionUpdate($positionsData, $positionDefinition);
} catch (PositionDataException $e) {
    //An exception is thrown if the input data doesn't respect the expected format
    $errors = [$e->toArray()];
    $this->flashErrors($errors);
}
```

{{% notice note %}}
The format of the input data is not random nor fixed, it actually matches the definition of our `PositionUpdateFactory` which you can see in the service definition:

```yaml
  # In src/PrestaShopBundle/Resources/config/services/core/grid.yml
  ...
  # Grid position updater
  prestashop.core.grid.position.position_update_factory:
    class: 'PrestaShop\PrestaShop\Core\Grid\Position\PositionUpdateFactory'
    arguments:
      - 'positions'
      - 'rowId'
      - 'oldPosition'
      - 'newPosition'
      - 'parentId'
```

If you need this component to match another input format you can instanciate your own factory with the appropriate settings.
{{% /notice %}}


## Update your positions

Now that you built your `PositionUpdate` object all you need to do is perform the modification, to do this you can use
the `GridPositionUpdater` service which id is `PrestaShop\PrestaShop\Core\Grid\Position\GridPositionUpdater`

```php
<?php
use PrestaShop\PrestaShop\Core\Grid\Position\PositionUpdate;
use PrestaShop\PrestaShop\Core\Grid\Position\GridPositionUpdaterInterface;
use PrestaShop\PrestaShop\Core\Grid\Position\Exception\PositionUpdateException;

/** @var PositionUpdate $positionUpdate */
$positionUpdate = buildPositionUpdate();

/** @var GridPositionUpdaterInterface $updater */
$updater = $this->get('prestashop.core.grid.position.doctrine_grid_position_updater');
try {
    $updater->update($positionUpdate);
    $this->clearModuleCache();
    $this->addFlash('success', $this->trans('Successful update.', 'Admin.Notifications.Success'));
} catch (PositionUpdateException $e) {
    $errors = [$e->toArray()];
    $this->flashErrors($errors);
}
```

## Example

This is a example to sum up what you just learnt, here is a simple controller used in a grid in the [ps_linklist](https://github.com/PrestaShop/ps_linklist) module.

```yaml
# Route definition for the controller
admin_link_block_update_positions:
  path: /link-widget/update-positions/{hookId}
  methods: [POST]
  defaults:
    _controller: 'PrestaShop\Module\LinkList\Controller\Admin\Improve\Design\LinkBlockController::updatePositionsAction'
    _legacy_controller: AdminLinkWidget
  requirements:
    hookId: \d+
```

```php
<?php
namespace PrestaShop\Module\LinkList\Controller\Admin\Improve\Design;

use PrestaShop\PrestaShop\Core\Grid\Position\Exception\PositionDataException;
use PrestaShop\PrestaShop\Core\Grid\Position\Exception\PositionUpdateException;
use PrestaShop\PrestaShop\Core\Grid\Position\GridPositionUpdaterInterface;
use PrestaShop\PrestaShop\Core\Grid\Position\PositionUpdateFactory;
use PrestaShop\PrestaShop\Core\Grid\Position\PositionDefinition;
use PrestaShop\PrestaShop\Core\Grid\Position\PositionUpdate;
use PrestaShopBundle\Controller\Admin\FrameworkBundleAdminController;
use PrestaShopBundle\Security\Annotation\AdminSecurity;
use PrestaShopBundle\Security\Annotation\ModuleActivated;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class LinkBlockController.
 *
 * @ModuleActivated(moduleName="ps_linklist", redirectRoute="admin_module_manage")
 */
class LinkBlockController extends FrameworkBundleAdminController {
    /**
     * @AdminSecurity("is_granted('update', request.get('_legacy_controller'))", message="Access denied.")
     *
     * @param Request $request
     * @param int $hookId
     *
     * @throws \Exception
     *
     * @return RedirectResponse
     */
    public function updatePositionsAction(Request $request, $hookId)
    {
        $positionsData = [
            'positions' => $request->request->get('positions', null),
            'parentId' => $hookId,
        ];

        /** @var PositionDefinition $positionDefinition */
        $positionDefinition = $this->get('prestashop.module.link_block.grid.position_definition');
        /** @var PositionUpdateFactory $positionUpdateFactory */
        $positionUpdateFactory = $this->get('prestashop.core.grid.position.position_update_factory');
        try {
            /** @var PositionUpdate $positionUpdate */
            $positionUpdate = $positionUpdateFactory->buildPositionUpdate($positionsData, $positionDefinition);
        } catch (PositionDataException $e) {
            $errors = [$e->toArray()];
            $this->flashErrors($errors);

            return $this->redirectToRoute('admin_link_block_list');
        }

        /** @var GridPositionUpdaterInterface $updater */
        $updater = $this->get('prestashop.core.grid.position.doctrine_grid_position_updater');
        try {
            $updater->update($positionUpdate);
            $this->clearModuleCache();
            $this->addFlash('success', $this->trans('Successful update.', 'Admin.Notifications.Success'));
        } catch (PositionUpdateException $e) {
            $errors = [$e->toArray()];
            $this->flashErrors($errors);
        }

        return $this->redirectToRoute('admin_link_block_list');
    }
}
```
