---
menuTitle: actionValidateOrder
Title: actionValidateOrder
hidden: true
hookTitle: New orders
files:
  - classes/PaymentModule.php
locations:
  - front office
type: action
hookAliases:
 - newOrder
aliases:
 - /8/modules/sample-modules/example-hooks/actionValidateOrder
hasExample: true
---

# Hook actionValidateOrder

Aliases: 
 - newOrder



## Information

{{% notice tip %}}
**New orders:** 


{{% /notice %}}

Hook locations: 
  - front office

Hook type: action

Located in: 
  - [classes/PaymentModule.php](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/PaymentModule.php)

## Parameters details

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

## Call of the Hook in the origin file

```php
Hook::exec('actionValidateOrder', [
                'cart' => $this->context->cart,
                'order' => $order,
                'customer' => $this->context->customer,
                'currency' => $this->context->currency,
                'orderStatus' => $order_status,
            ])
```

## Example implementation

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