---
title: Additional action buttons
weight: 3
aliases:
    - /1.7/modules/sample_modules/order_view_page_new_hooks/additional-action-buttons/
---

# Additional buttons in the main buttons bar

## `actionGetAdminOrderButtons` hook demo

We use this hook to display additional action buttons into the main buttons bar.

Let's add hook related code to main module class `demovieworderhooks`:

```php
<?php
    /**
     * Add buttons to main buttons bar
     */
    public function hookActionGetAdminOrderButtons(array $params)
    {
        $order = new Order($params['id_order']);

        /** @var \Symfony\Bundle\FrameworkBundle\Routing\Router $router */
        $router = $this->get('router');

        /** @var \PrestaShopBundle\Controller\Admin\Sell\Order\ActionsBarButtonsCollection $bar */
        $bar = $params['actions_bar_buttons_collection'];

        $viewCustomerUrl = $router->generate('admin_customers_view', ['customerId'=> (int)$order->id_customer]);
        $bar->add(
            new \PrestaShopBundle\Controller\Admin\Sell\Order\ActionsBarButton(
                'btn-secondary', ['href' => $viewCustomerUrl], 'View customer'
            )
        );
        $bar->add(
            new \PrestaShopBundle\Controller\Admin\Sell\Order\ActionsBarButton(
                'btn-info', ['href' => 'https://www.prestashop.com/'], 'Go to prestashop'
            )
        );
        $bar->add(
            new \PrestaShopBundle\Controller\Admin\Sell\Order\ActionsBarButton(
                'btn-dark', ['href' => 'https://github.com/PrestaShop/example-modules/tree/master/demovieworderhooks'], 'Go to GitHub'
            )
        );
        $createAnOrderUrl = $router->generate('admin_orders_create');
        $bar->add(
            new \PrestaShopBundle\Controller\Admin\Sell\Order\ActionsBarButton(
                'btn-link', ['href' => $createAnOrderUrl], 'Create an order'
            )
        );
    }
```

{{% notice note %}}
We used full path here `\PrestaShopBundle\Controller\Admin\Sell\Order\ActionsBarButton`
but a slightly better approach could be with `use` statement followed by imported class namespace
above the class declaration:
`use PrestaShopBundle\Controller\Admin\Sell\Order\ActionsBarButton;`
{{% /notice %}}

With `$router = $this->get('router');` we inject the router capable to generate url links
to controller actions from routes and their parameters. For example: 

```php
<?php
$viewCustomerUrl = $router->generate('admin_customers_view', ['customerId'=> (int)$order->id_customer]);
```

And also we use `ActionsBarButtonsCollection` to add our new `ActionsBarButton` buttons.
And just with this small function we get a nice result (`View customer` and `More actions`
buttons added):

 {{< figure src="../../img/view-order-hooks-demo/additional_action_buttons.png" title="Signature card" >}}




