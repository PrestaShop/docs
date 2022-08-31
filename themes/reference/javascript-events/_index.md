---
title: Javascript events
aliases:
  - /1.7/themes/javascript_events/
  - /themes/javascript/index.html
weight: 4
---

# JavaScript events

## Javascript architecture

PrestaShop 1.7 has reworked a lot of javascript code, almost rewriting everything.

{{% notice info %}}
It's recommended to read more about [PrestaShop asset management]({{< ref "1.7/themes/getting-started/asset-management/" >}}) before continuing.
{{% /notice %}}

A default store loads a lot less files in 1.7 compared to 1.6, there are no specific files per page for instance. The 2 new important files you have to master are:

  File      | Content
  ----------| ------------------------------------------------------------------------------
  `core.js` | Loads jQuery2 or jQuery3, makes ajax calls, defines core methods that all frontend should use
  `theme.js`| Bundles all theme specific code and libraries

{{% notice tip %}}
  jQuery is loaded by the core, so each theme will have jQuery v2 or v3 (since `1.7.7.0`) available. Do not redefine it.
{{% /notice %}}

## Events

### Dispatch an event

The best way to trigger an event is to use the `prestashop` object. Here is a simple example:

```js
prestashop.emit(
  'myEventName',
  {
    myData1: 1,
    myData2: 3
  }
);
```

### Listening to events

You can also react to an event emitted by `prestashop.emit`. Here is a simple example:

```js
if (typeof prestashop !== 'undefined') {
  prestashop.on(
    'myEventName',
    function (event) {
      var eventDatas = {};
      if (event && event.reason) {
        eventDatas = {
          my_data_1: event.reason.myData1,
          my_data_2: event.reason.myData2
        };
      }
    }
  );
}
```

### Dispatched events

PrestaShop will dispatch many events from `core.js` so your code can rely on it:

Event Name            | Description
----------------------|------------------------------------------------------------------------------------------
 `updateCart`         | On the cart page, everytime something happens (change quantity, remove product and so on) the cart is reloaded by ajax call. After the cart is updated, this event is triggered.
 `updatedAddressForm`  | In the address form, some input will trigger ajax calls to modify the form (like country change), after the form is updated, this event is triggered.
 `updateDeliveryForm` | During checkout, if the delivery address is modified, this event will be trigged.
 `changedCheckoutStep` | Each checkout step **submission** will fire this event.
 `updateProductList`  | On every product list page (category, search results, pricedrop and so on), the list is updated via ajax calls if you change filters or sorting options. Each time the DOM is reloaded with new product list, this event is triggered.
 `clickQuickView`     | If your theme handles it, this event will be trigged when you click on the quickview link.
 `updateProduct`      | On the product page, selecting a new combination will reload the DOM via ajax calls. This event will fire after modifying the combination, but before the ajax call.
 `updatedProduct`      | On the product page, selecting a new combination will reload the DOM via ajax calls. After the update, this event is fired.
 `handleError`        | This event is fired after a fail of POST request. Have the `eventType` as first parameter.
 `updateFacets`        | On every product list page (category, search results, pricedrop and so on), the list is updated via ajax calls if you change filters or sorting options. Each time the facets is reloaded, this event is triggered.
 `responsive update`  | While browser is resized, this event is fired with a `mobile` parameter.

### Triggering delegated events

We use event delegation to make sure that the events are still attached
after the DOM was modified (like after an ajax call).

Here is a simple way to trigger a delegated event.

```js
const body = $('body'); // Our events are usually attached to the body

const event = jQuery.Event('click');
event.target = body.find('.js-theClassYouNeed');

body.trigger(event);
```
