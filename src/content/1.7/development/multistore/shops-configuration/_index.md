---
title: Shops configuration
menuTitle: Shops configuration
summary: "Fetching shop configuration values in multistore context, using the ShopConstraint value object"
weight: 30
---

# Fetching shop configuration values in multistore context
{{< minver v="1.7.7" title="true" >}}

When multistore is disabled and you fetch a configuration value, you are in a **single store context**, so you are fetching configuration values of your only store. All you have to do is use the **legacy configuration adapter** (more on that later).

But what if you want to fetch a configuration value with more than one activated shop? This is where the **ShopConstraint** value object (VO) comes in handy, this is what you will use in order to specify which store(s) configuration value you are targeting.

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
        $roundType = (int) $configuration->get('PS_ROUND_TYPE', null, $shopConstraint);

        // ...
    }
}
```

{{% notice note %}}
Note that the ShopConstraint VO is not solely dedicated to being used with the configuration service. If you write a method/function that should have different behaviors depending on a given shop / shop group, then using the ShopConstraint VO is a good idea.
{{% /notice %}}

## Fetched configuration values depending on context

This is how configuration values are stored in database, depending on the current shop context (in the table `ps_configuration`): 

| Current context | configuration name | id_shop |  id_shop_group  | value |
|:-------|:-------|:--------|-----------------------|:-------|
|All shops context | PS_SHOP_ENABLE | NULL | NULL | 'all shops value' |
|Group shop context (ex: shop group's id is 2)  | PS_SHOP_ENABLE | NULL | 2 | 'group shop value' |
|Single shop context (ex: shop's id is 3 and its group id is 2 ) | PS_SHOP_ENABLE | 3 | 2 | 'single shop value' |

{{% notice note %}}
 Note that setting the value of a parent context does not override the values for children contexts that were set before. For example, if a configuration value is set for a **single shop**, setting a configuration value in **all shops context** will not override it.
{{% /notice %}}

When fetching a configuration value, the configuration service will look for the corresponding value for the current context, if there is none, you will get the configuration value for the next parent context having a configuration value, it goes from the most precise to the most generic context:<br>
**Single shop => Group shop => All shops**

For example, if you are in single shop context but no configuration value is set for this shop, then if there is a configuration value for the shop group, you will get it, otherwise you will get the "all shops" value as a default.
