---
title: "actionValidateOrder"
weight: 3
---

# Hook example: actionValidateOrder

This hook is triggered when an `order` is validated. 

actionValidateOrder
: 
    After an order has been validated.
    Doesn't necessarily have to be paid.

    Located in: /classes/PaymentModule.php

    Parameters:
    ```php
    <?php
    array(
      'cart' => (object) Cart,
      'order' => (object) Order,
      'customer' => (object) Customer,
      'currency' => (object) Currency,
      'orderStatus' => (object) OrderState
    );
    ```
    
A classic use case for this hook could be: 

_I want to reward my customers on their n-th order_

```php
<?php
class MyModuleRewardCustomerWhenOrder extends Module 
{
    public function install()
    {
        return parent::install() && $this->registerHook('actionValidateOrder');
    }

    public function hookActionValidateOrder($params)
    {
        $orderObject = $params['order'];
        $customerObject = $params['customer'];
        $hasValidParams = Validate::isLoadedObject($orderObject) && Validate::isLoadedObject($orderObject);
        if ($hasValidParams && !$this->customerAlreadyRewarded((int) $customerObject->id)) {
            $hasConfiguredState = in_array((int) $orderObject->getCurrentState(), $this->getConfuredOrdersStatesIds());
            $hasCustomerRequiredNbrOfTheOrderToReward = $this->getCustomerValidOrdersNbr((int) $customerObject->id) == $this->getRequiredNbrOfTheOrderToReward();
            if ($hasConfiguredState && $hasCustomerRequiredNbrOfTheOrderToReward) {
                $customerReward = $this->createCustomerReward($customerObject, $orderObject);
                if (Validate::isLoadedObject($customerReward)) {
                    $this->setAlreadyRewarded($customerObject);
                    $this->notifyCustomer($customerObject, $customerReward);
            
                    // of course don't forget to log if something fails here :)
                }
            }
        }
    }

    protected function customerAlreadyRewarded(int $idCustomer): bool
    {
        // check if customer already rewarded
    }

    protected setAlreadyRewarded(): void
    {
        // set customer was rewarded
    }

    protected function getConfuredOrdersStatesIds(): array
    {
        // return array with configured states ids in your module
    }

    protected function getCustomerValidOrdersNbr(int $idCustomer): int
    {
        // return number of total order valid by customer
    }

    protected function getRequiredNbrOfTheOrderToReward(): int
    {
        // return configured number of orders required to reward the customer
    }

    protected function createCustomerReward(Customer $customer, Order $order): ?CartRule
    {
        // generate customer cart rule (according to the order amount for example)
    }

    protected function notifyCustomer(Customer $customer, CartRule $cartRule): bool
    {
        // notify the customer 
    }
}
```