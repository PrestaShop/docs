---
title: Create controller
weight: 60
---

# Create the controller

Create a `Controller` in the directory which follow the menu path
> Example: Configure > Shop Parameters > Clients > Title
>

> Then you will put the new Controller, in `src/PrestaShopBundle/Controller/Admin/Configure/ShopParameters/`
>

The name of the Controller will be the English name of the page you want to migrate

> Example: Title, so your controller name will be `TitleController`
>

Your class must extend `PrestaShopBundle\Controller\Admin\FrameworkBundleAdminController`

Your class must implements `use PrestaShopBundle\Bridge\AdminController\LegacyControllerBridgeInterface;`

The previous interface needs these two method:
* `getTable`: have to return the name of the table you want to manipulate
* `getClassName`: have to return the name of the feature object you want to manipulate

To get others methods needed by `LegacyControllerBridgeInterface`, you have to use this trait: `PrestaShopBundle\Bridge\Smarty\SmartyTrait`