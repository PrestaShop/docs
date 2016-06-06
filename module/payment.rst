********************
Payment module
********************


Look and this example and write some doc :D
https://github.com/PrestaShop/paymentexample

Hooks
---------

The params passed to the following hooks have been modified:

* hookPaymentReturn
* hookDisplayOrderConfirmation

**BEFORE**

+--------------+------------------------------------------+ 
| Key          | Value                                    |
+==============+==========================================+ 
| total_to_pay | result of `$order->getOrdersTotalPaid()` |
+--------------+------------------------------------------+ 
| currency     | currency sign (string)                   |
+--------------+------------------------------------------+ 
| currencyObj  | The loaded currency (Currency class)     |
+--------------+------------------------------------------+ 
| objOrder     | The current order object (Order class)   |
+--------------+------------------------------------------+ 


**AFTER**

+------------+-----------------------------------------+ 
| Key        | Value                                   |
+============+=========================================+ 
| order      | The current order object (Order class)  |
+------------+-----------------------------------------+ 


Everything can be retrieved, for example:

.. code-block:: php

  $currency = new Currency($params['order']->id_currency);
  $total_to_pay = $params['order']->getOrdersTotalPaid();
  

Real life example
^^^^^^^^^^^^^^^^^^^

See bankwire module example: https://github.com/PrestaShop/bankwire/pull/18
