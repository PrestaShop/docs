***********************
JavaScript
***********************

PrestaShop 1.7 has reworked a lot of javascript code, almost rewriting everything.

It's recommended to read more about (:doc:`PrestaShop assets management <../assets/index>`)
before continuing.

A default store loads a lot less files in 1.7 compared to 1.6, there are no specific files
per page for instance. The 2 new important files you have to master are:

+----------+--------------------------------------------------------------------------------+
| File     | Content                                                                        |
+==========+================================================================================+
| core.js  | Load Jquery2, make ajax calls, define core method that all frontend should use |
+----------+--------------------------------------------------------------------------------+
| theme.js | Bundles all theme specific code and libraries                                  |
+----------+--------------------------------------------------------------------------------+

Read more (:doc:`about their priority <../assets/index>`).


.. tips::
  Jquery is loaded by the core, so each theme will have jQuery v2 available. Do not redefine it.


Events
===========================

Dispatch an event
--------------------------------

The best way to trigger an event is to use the ``prestashop`` object. Here is a
simple example:

.. code-block:: javascript

  prestashop.emit(
    'product updated',
    {
      dataForm: someSelector.serializeArray(),
      productOption: 3
    }
  );

Dispatched events
--------------------------------

PrestaShop will dispatch many events from ``core.js`` so your code can rely on it

+---------------------+----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------+
| Event Name          | Description                                                                                                                                                                                                                            |
+=====================+========================================================================================================================================================================================================================================+
| updateCart         | On the cart page, everytime something happens (change quantity, remove product and so on) the cart is reloaded by ajax call. After the cart is updated, this event is triggered.                                                       |
+---------------------+----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------+
| updatedAddressForm  | In the address form, some input will trigger ajax calls to modify the form (like country change), after the form is updated, this event is triggered.                                                                                  |
+---------------------+----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------+
| updatedDeliveryForm | During checkout, if the delivery address is modified, this event will be trigged.                                                                                                                                                      |
+---------------------+----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------+
| changedCheckoutStep | Each checkout step **submission** will fire this event.                                                                                                                                                                                |
+---------------------+----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------+
| updateProductList   | On every product list page (category, search results, pricedrop and so on), the list is updated via ajax calls if you change filters or sorting options. Each time the DOM is reloaded with new product list, this event is triggered. |
+---------------------+----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------+
| clickQuickView      | If your theme handles it, this event will be trigged when use click on the quickview link.                                                                                                                                             |
+---------------------+----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------+
| updateProduct       | On the product page, selecting a new combination will reload the DOM via ajax calls. After the update, this event is fired.                                                                                                            |
+---------------------+----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------+
| handleError       | This event is fired after a fail of POST request. Have the eventType as param.                                                                                                           |
+---------------------+----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------+
| updateFaces       | On every product list page (category, search results, pricedrop and so on), the list is updated via ajax calls if you change filters or sorting options. Each time the facets is reloaded, this event is triggered.                                                                                                           |
+---------------------+----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------+
| responsive update       | While broswer is resized, this event is fired with a "mobile" param.                                                                                                           |
+---------------------+----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------+
| More events?        | Contribute to the doc to describe more events!                                                                                                                                                                                         |
+---------------------+----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------+


Triggering delegated events
--------------------------------

We use event delegation to make sure that the events are still attached after
the DOM was modified (like after an ajax call).

Here is a simple way to trigger a delegated event.

.. code-block:: javascript

  var body = $('body'); // Our events are usually attached to the body

  var event = jQuery.Event('click');
  event.target = body.find('.js-theClassYouNeed');

  body.trigger(event);
