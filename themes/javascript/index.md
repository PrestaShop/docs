JavaScript
==========

PrestaShop 1.7 has reworked a lot of javascript code, almost rewriting
everything.

It's recommended to read more about
(PrestaShop assets management &lt;../assets/index&gt;) before
continuing.

A default store loads a lot less files in 1.7 compared to 1.6, there are
no specific files per page for instance. The 2 new important files you
have to master are:

  ------------------------------------------------------------------------
  File     Content
  -------- ---------------------------------------------------------------
  core.js  Load Jquery2, make ajax calls, define core method that all
           frontend should use

  theme.js Bundles all theme specific code and libraries
  ------------------------------------------------------------------------

Read more (about their priority &lt;../assets/index&gt;).

> Jquery is loaded by the core, so each theme will have jQuery v2
> available. Do not redefine it.

Events
------

### Dispatch an event

The best way to trigger an event is to use the `prestashop` object. Here
is a simple example:

``` {.sourceCode .javascript}
prestashop.emit(
  'product updated',
  {
    dataForm: someSelector.serializeArray(),
    productOption: 3
  }
);
```

### Dispatched events

PrestaShop will dispatch many events from `core.js` so your code can
rely on it

+--------+-------------------------------------------------------------------+
| Event  | Description                                                       |
| Name   |                                                                   |
+========+===================================================================+
| update | On the cart page, everytime something happens (change quantity,   |
| Cart   | remove product and so on) the cart is reloaded by ajax call.      |
| |      | After the cart is updated, this event is triggered.               |
+--------+-------------------------------------------------------------------+
| update | In the address form, some input will trigger ajax calls to modify |
| dAddre | the form (like country change), after the form is updated, this   |
| ssForm | event is triggered.                                               |
+--------+-------------------------------------------------------------------+
| update | During checkout, if the delivery address is modified, this event  |
| dDeliv | will be trigged.                                                  |
| eryFor |                                                                   |
| m      |                                                                   |
+--------+-------------------------------------------------------------------+
| change | Each checkout step **submission** will fire this event.           |
| dCheck |                                                                   |
| outSte |                                                                   |
| p      |                                                                   |
+--------+-------------------------------------------------------------------+
| update | On every product list page (category, search results, pricedrop   |
| Produc | and so on), the list is updated via ajax calls if you change      |
| tList  | filters or sorting options. Each time the DOM is reloaded with    |
|        | new product list, this event is triggered.                        |
+--------+-------------------------------------------------------------------+
| clickQ | If your theme handles it, this event will be trigged when use     |
| uickVi | click on the quickview link.                                      |
| ew     |                                                                   |
+--------+-------------------------------------------------------------------+
| update | On the product page, selecting a new combination will reload the  |
| Produc | DOM via ajax calls. After the update, this event is fired.        |
| t      |                                                                   |
+--------+-------------------------------------------------------------------+
| handle | his event is fired after a fail of POST request. Have the         |
| Error  | eventType as param.                                               |
| | T    |                                                                   |
+--------+-------------------------------------------------------------------+
| update | n every product list page (category, search results, pricedrop    |
| Faces  | and so on), the list is updated via ajax calls if you change      |
| | O    | filters or sorting options. Each time the facets is reloaded,     |
|        | this event is triggered.                                          |
+--------+-------------------------------------------------------------------+
| respon | > While broswer is resized, this event is fired with a "mobile"   |
| sive   | > param.                                                          |
| update |                                                                   |
+--------+-------------------------------------------------------------------+
| More   | Contribute to the doc to describe more events!                    |
| events |                                                                   |
| ?      |                                                                   |
+--------+-------------------------------------------------------------------+

### Triggering delegated events

We use event delegation to make sure that the events are still attached
after the DOM was modified (like after an ajax call).

Here is a simple way to trigger a delegated event.

``` {.sourceCode .javascript}
var body = $('body'); // Our events are usually attached to the body

var event = jQuery.Event('click');
event.target = body.find('.js-theClassYouNeed');

body.trigger(event);
```
