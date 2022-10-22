---
title: Carrier modules
weight: 31
---

# Creating a carrier module

## Principles

A carrier module is a regular PrestaShop module, except that it extends the CarrierModule class instead of the Module class:

```php
class MyOwnCarrier extends CarrierModule
```

A carrier module must use the following methods:

* `getOrderShippingCost()`: to compute the shipping price depending on the ranges that were set in the back office.
* `getOrderShippingCostExternal()`: to compute the shipping price without using the ranges.

The `getPackageShippingCost()` method can also be used to compute the shipping price depending on the products:

```php
$shipping_cost = $module->getPackageShippingCost($cart, $shipping_cost, $products);
```

{{% notice tip %}}
One module can be used to create more than one carrier.
{{% /notice %}}

{{% notice tip %}}
Watch out! Every time a Back Office user edits a carrier, what actually happens is that the carrier is duplicated, the copy is edited and the original is edited. Consequently, the field `id_carrier` of the new entry is different from the original . If you want to create a module related to a specific carrier, make sure to use the `id_reference` field which does not change upon edition. If you need to monitor the changes of the id of this carrier, make sure to read "Controlling the change of the carrier's ID" section.
{{% /notice %}}

## Installing and uninstalling the module

The module must handle:

* Its own installation, and the installation of one or more carriers.
* Its own uninstallation, and the "deletion" of one or more of its carriers.

Note about deletion:

* Deleting a carrier simply means its deactivation (deleted=true).
* The module must keep the link between an old order and a carrier that is not available anymore.
* Careful: the default carrier must exist and be enabled.

## Controlling the change of the carrier's ID

To control the change of the carrier's ID (id_carrier), the module must use the `actionCarrierUpdate` hook.

For instance:

```php
public function hookActionCarrierUpdate($params)
{
    $id_carrier_old = (int) $params['id_carrier'];
    $id_carrier_new = (int) $params['carrier']->id;
    if ($id_carrier_old === (int) Configuration::get('MYCARRIER_CARRIER_ID')) {
        Configuration::updateValue('MYCARRIER_CARRIER_ID', $id_carrier_new);
    }
}
```

## Computing the shipping price

To compute the shipping price, PrestaShop needs to call the module's `getOrderShippingCost()` or `getOrderShippingCostExternal()`.

The returned value must be a float or false if the carrier is not known or disabled.

For instance:

```php
public function getOrderShippingCost($params, $shipping_cost)
{
  if (
        $this->id_carrier === (int)(Configuration::get('MYCARRIER_CARRIER_ID'))
        && Configuration::get('MYCARRIER_OVERCOST') > 1
    ) {
        return (float)(Configuration::get('MYCARRIER1_OVERCOST'));
    }
    return false; // carrier is not known
}
```
