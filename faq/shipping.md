---
title: Shipping FAQ
---

# Shipping FAQ

- [Shipping information](#shipping-information)
- [How do I add a service fee to an order?](#how-do-i-add-a-service-fee-to-an-order)


## Shipping information

**Q:** Where and how should I read and write the following informations to be sure that my module is compatible with every shipping modules:

- Tracking number
- Carrier name
- Estimated delivery date
- Real delivery date

**A:** These details are stored at different places.

### Carrier details

Information related to a shipping (= delivery method) may be found / stored with the class `Carrier`.
* You may call `Carrier::getCarriers(...)` to retrieve all the carriers existing on the shop, with the details about their name, the module related, the delay...
* If you need to update one of these carriers, you may use the `Carrier` (ObjectModel) class. Instantiate the carrier you need with:

```php
<?php
// From the carrier ID stored in the var $carrierId

$carrier = new \Carrier($carrierId);

// Apply changes to the $carrier object, then save.
$carrier->save();
```

### Order specific details

Some other details are specific to each order, like the tracking number. Regarding the required fields in your question, there is no place to store the real delivery date in the core tables.

You may reach the order delivery details with the following example:

```php
<?php
// From an Order ID you have
$order = new Order($orderId);
$orderCarrier = new OrderCarrier($order->getIdOrderCarrier());

// 1- Get tracking number
$trackingNumber = $orderCarrier->tracking_number;

// 2- Set tracking number
$orderCarrier->tracking_number = 'ABDC00F';
$orderCarrier->save();
```

## How do I add a service fee to an order? 

I want to create a module that provides an additional service (insurance, tracking, …) to an order. The service is billed to the buyer not the merchant.

How do I add a service fee to an order ?

TODO:write answer
