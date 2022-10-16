---
title: "actionValidateOrder"
weight: 3
---

# Hook example : actionValidateOrder

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
    
A classic use-case for this hook could be : 

> I want to reward my customers on their _n-th_ order

:
{{% notice info %}}
Insert here contribution from Pululuk
{{% /notice %}}