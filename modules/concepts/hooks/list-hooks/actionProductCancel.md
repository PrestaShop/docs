---
menuTitle: actionProductCancel
title: actionProductCancel
hidden: true
files:
  - src/Adapter/Order/CommandHandler/IssueStandardRefundHandler.php
types:
  - frontoffice
hookTypes:
  - legacy
---

# Hook : actionProductCancel

Located in :

  - src/Adapter/Order/CommandHandler/IssueStandardRefundHandler.php

## Parameters

```php
Hook::exec('actionProductCancel', ['order' => $order, 'id_order_detail' => (int) $orderDetailId, 'cancel_quantity' => $productRefund['quantity'], 'action' => CancellationActionType::STANDARD_REFUND], null, false, true, false, $order->id_shop);
        }

        // Update order carrier weight
        $orderCarrier = new OrderCarrier((int) $order->getIdOrderCarrier());
        if (Validate::isLoadedObject($orderCarrier)) {
            $orderCarrier->weight = (float) $order->getTotalWeight();
            if ($orderCarrier->update()) {
                $order->weight = sprintf('%.3f %s', $orderCarrier->weight, $this->configuration->get('PS_WEIGHT_UNIT'));
            }
        }

        // Create order slip
        if ($command->generateCreditSlip()) {
            $this->orderSlipCreator->create($order, $orderRefundSummary);
        }

        // Update refund details (standard refund only happen for an order not delivered, so it can't return products)
        $this->refundUpdater->updateRefundData(
            $orderRefundSummary,
            false,
            true
        );

        // Generate voucher if needed
        if ($command->generateVoucher() && $orderRefundSummary->getRefundedAmount() > 0) {
            $this->voucherGenerator->generateVoucher(
                $order,
                $orderRefundSummary->getRefundedAmount(),
                Context::getContext()->currency->iso_code,
                $orderRefundSummary->isTaxIncluded()
            );
```