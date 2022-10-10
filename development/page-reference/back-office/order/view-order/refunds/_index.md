---
title: Refunds
menuTitle: Refunds
---

# Cancellations and refunds

{{% notice info %}}
For a full specification of how these features work, you can read [the functional specifications](https://build.prestashop-project.org/prestashop-specs/1.7/back-office/orders/orders/view-page.html#merchandise-return-has-to-be-enabled-if-the-merchant-wants-to-use-the-standard-refund-partial-refund-and-return-product-feature)
{{% /notice %}}

## Order history and corresponding cancellation types

{{% notice info %}}
Refund features are not activated by default. To activate them, go to the "Merchandise returns" page under the "Customer Service" menu, and activate the "Product returns" option at the bottom of the page. This will apply to all products and orders.
{{% /notice %}}

In the order detail page, **return product**, **cancel product**, and **standard refund** buttons can only exist exclusively, following these rules:

- If the order has been shipped, then the available action will be **return product**.

- If the order has been paid but not shipped yet, then the available action will be **standard refund**.

- In all other cases, the available action is **cancel product**.

The **Partial refund** button is available once a payment was made on the order, it can exist jointly with other refunds, and it exists even if the "Product returns" option was not enabled.


## Performing cancellation actions programmatically

### Introduction

Cancellation actions (that is to say **cancel product**, **return product**, **standard refund** and **partial refund**) are implemented following the CQRS design pattern.

{{% notice info %}}
You will find more informations about Prestashop's CQRS implementation [on this page]({{< relref "/8/development/architecture/domain/cqrs" >}}).
{{% /notice %}}

Performing these actions is always a two step process:

**1/** Instantiate the corresponding CQRS command.

**2/** Give the command to the CQRS command bus.

In the code, it looks like this:

```php
<?php

use PrestaShop\PrestaShop\Core\CommandBus\CommandBusInterface;
use PrestaShop\PrestaShop\Core\Domain\Order\Command\CancelOrderProductCommand;

// Instantiate the corresponding command
$command = new CancelOrderProductCommand(
    $cancelledProducts,
    $orderId
);

// Give it to the command bus
$this->commandBus->handle($command);
```

The following section will detail each cancellation commands and their required parameters.

### List of refunds related CQRS commands

Note that all those commands are in this namespace: `PrestaShop\PrestaShop\Core\Domain\Order\Command`<br><br>

| CQRS Command | Parameters |  Description            |
|:-------|:-------|:-----------------------|
| **CancelOrderProductCommand**  |||
|| `array $cancelledProducts`<br><br> Contains OrderDetail IDs (int) and quantities (int) to be cancelled:<br><br> `[$orderDetailId => $quantity]`| An array containing a list of products (oderDetails) to be canceled. Each cancelled product is itself an array having the **OrderDetail** ID (int) as a key, and the **quantity** (int) to be cancelled as a value|
|| `int $orderId`| The id of the order containg the products being cancelled |
| **IssueStandardRefundCommand**  |||
|| `int $orderId`| The id of the order containing the products to be refunded |
|| `array $refunds`<br><br>Contains a list of refunds, each refund is an array containing an OrderDetail ID (int) and a quantity (int) to be refunded:<br><br>`[$orderDetailId => ['quantity' => $quantity]]`| An array containing a list of products (oderDetails) to be refunded |
|| `bool $refundShippingCost`| Wether shipping cost should be refunded |
|| `bool $generateCreditSlip`| Wether a credit slip should be generated |
|| `bool $generateVoucher`| Wether a voucher should be generated |
|| `int $voucherRefundType`| Id of the voucher refund type, those can be found in the file `VoucherRefundType.php` |
| **IssueReturnProductCommand** |||
|| `int $orderId` | The id of the order containing the products to be returned |
|| `array $refunds`<br><br>Contains a list of refunds, each refund is an array containing an OrderDetail ID (int) and a quantity (int) to be refunded:<br><br>`[$orderDetailId => ['quantity' => $quantity]]`| An array containing a list of products (oderDetails) to be returned |
|| `bool $restockRefundedProducts` | Wether returned product should be put back in the stock (incrementing its quantity in stock) |
|| `bool $refundShippingCost` | Wether shipping cost should be refunded |
|| `bool $generateCreditSlip` | Wether a credit slip should be generated |
|| `bool $generateVoucher` | Wether a voucher should be generated |
|| `int $voucherRefundType`| Id of the voucher refund type, those can be found in the file `VoucherRefundType.php` |
| **IssuePartialRefundCommand** |||
|| `int $orderId`| The id of the order containing the products to be refunded |
|| `array $refunds`<br><br>Contains a list of refunds, each refund is an array containing an OrderDetail ID (int), a quantity (int) and amount (float) to be refunded:<br><br>`[$orderDetailId => [`<br>`'quantity' => $quantity,'amount' => $amount]`<br>`]`| An array containing a list of products (oderDetails) to be refunded |
|| `string $shippingCostRefundAmount` | Amount to be refunded for shipping cost |
|| `bool $restockRefundedProducts` | Wether refunded products should be put back in the stock (incrementing its quantity in stock) |
|| `bool $generateCreditSlip` | Wether a credit slip should be generated |
|| `bool $generateVoucher` | Wether a voucher should be generated |
|| `int $voucherRefundType`| Id of the voucher refund type, those can be found in the file `VoucherRefundType.php` |

### The **actionProductCancel** hook

The `actionProductCancel` hook is triggered by all refund actions.

#### How to know which action triggered the `actionProductCancel` hook ?

The `actionProductCancel` hook has an `action` parameter indicating which action was performed. Its value is one of the attributes of the `CancellationActionType` class. 

```php
<?php

public function hookActionProductCancel($params)
{
	// let's say you want to check what user action triggered the hook:

	if ($params['action'] === CancellationActionType::STANDARD_REFUND) {
	 // the hook was triggered by a "standard refund"

	} else if ($params['action'] === CancellationActionType::RETURN_PRODUCT) {
	 // the hook was triggered by a "return product"

	}
}

```
