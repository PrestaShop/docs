---
title: Shops configuration
menuTitle: Shops configuration
summary: "Fetching shop configuration values in multistore context, using the ShopConstraint value object"
weight: 30
---

# Fetching shop configuration values in multistore context

When multistore is disabled and you fetch a configuration value, you are in a **single store context**, so you are fetching configuration values of your only store. All you have to do is use the **legacy configuration adapter** (more on that later).

But what about when you want to fetch a configuration value while having more than one activated shop ? This is where the **ShopConstraint** value object (VO) comes in handy, this is what you will use in order to specify which store(s)'s configuration value you are targetting.

{{% notice note %}}
If you don't know what is a value object, you will find out about it and its use in the [value objects]({{< ref "/1.7/development/architecture/domain/value_objects" >}}) documentation.
{{% /notice %}}

## Usage

In order to fetch a configuration value in multistore context, you will need the legacy configuration adapter service `prestashop.adapter.legacy.configuration` and a ShopConstraint instance `PrestaShop\PrestaShop\Core\Domain\Shop\ValueObject\ShopConstraint`.

Example:

```php
<?php
use PrestaShop\PrestaShop\Core\Domain\Shop\ValueObject\ShopConstraint;

class MyController
{
    // ...

    public function myAction()
    {
        // ...

        // Get the legacy configuration adapter service
        $configuration = $container->get('prestashop.adapter.legacy.configuration');

        // Instantiate a ShopConstraint value object
        $shopConstraint = new ShopConstraint(
            (int) $order->id_shop,
            (int) $order->id_shop_group
        );

        // Get the needed configuration value, passing your ShopConstraint object as a third parameter
        $roundType = (int) $this->shopConfiguration->get('PS_ROUND_TYPE', null, $shopConstraint);

        // ...
    }
}
```

{{% notice note %}}
Note that the ShopConstraint VO is not solely dedicated to being used with the configuration service. If you write a method/function that should have different behaviors depending on a given shop / shop group, then using the ShopConstraint VO is a good idea.
{{% /notice %}}