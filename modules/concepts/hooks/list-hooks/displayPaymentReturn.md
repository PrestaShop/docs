---
menuTitle: displayPaymentReturn
title: displayPaymentReturn
hidden: true
files:
  - controllers/front/OrderConfirmationController.php
types:
  - frontoffice
hookTypes:
  - legacy
---

# Hook : displayPaymentReturn

Located in :

  - controllers/front/OrderConfirmationController.php

## Parameters

```php
Hook::exec('displayPaymentReturn', ['order' => $order], $this->id_module);
    }

    /**
     * Execute the hook displayOrderConfirmation.
     */
    public function displayOrderConfirmation($order)
    {
        return Hook::exec('displayOrderConfirmation', ['order' => $order]);
    }

    /**
     * Check if an order is free and create it.
     */
    protected function checkFreeOrder()
    {
        $cart = $this->context->cart;
        if ($cart->id_customer == 0 || $cart->id_address_delivery == 0 || $cart->id_address_invoice == 0) {
            Tools::redirect($this->context->link->getPageLink('order'));
        }

        $customer = new Customer($cart->id_customer);
        if (!Validate::isLoadedObject($customer)) {
            Tools::redirect($this->context->link->getPageLink('order'));
        }

        $total = (float) $cart->getOrderTotal(true, Cart::BOTH);
        if ($total > 0) {
            Tools::redirect($this->context->link->getPageLink('order'));
        }

        $order = new PaymentFree();
        $order->validateOrder(
            $cart->id,
            (int) Configuration::get('PS_OS_PAYMENT'),
            0,
            $this->trans('Free order', [], 'Admin.Orderscustomers.Feature'),
            null,
            [],
            null,
            false,
            $cart->secure_key
        );

        // redirect back to us with rest of the data
        // note the id_module parameter with value -1
        // it acts as a marker for the module check to use "free_payment"
        // for the check
        Tools::redirect('index.php?controller=order-confirmation&id_cart=' . (int) $cart->id . '&id_module=-1&id_order=' . (int) $order->currentOrder . '&key=' . $cart->secure_key);
    }

    public function getBreadcrumbLinks()
    {
        $breadcrumb = parent::getBreadcrumbLinks();

        $breadcrumb['links'][] = [
            'title' => $this->trans('Order confirmation', [], 'Shop.Theme.Checkout'),
            'url' => $this->context->link->getPageLink('order-confirmation'),
```