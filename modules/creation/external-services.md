---
title: Interacting with APIs
---

# Interacting with APIs

There are different options to transfer data between your shop and any external service.
The method you choose will depend on the usecase:

* if data must be pulled or pushed to the shop,
* if one specific application (the shop or an external service) must initiate the calls,
* if there are constraints on the implementation (i.e a cron job scheduler is required).

## Requests to a shop

You may retrieve and update data from a shop using different methods:

### The native webservice

The webservice is a REST API allowing you to interact with most of the database tables used by the core.
It uses Basic access authentication to allow requests.

**Resources:**

* [About the webservice]({{< ref "8/webservice" >}})
* [Enable & add users to the webservice]({{< ref "8/webservice/tutorials/creating-access" >}})

**Adding a module ObjectModel to the list of resources available**

The hook `addWebserviceResources` must be registered by your module.

Then an array containing all the ressources (= Object Model subclasses) you want to add should be returned.
For instance, in the module blockreassurance we have an ObjectModel class, called `reassuranceClass`. If we wanted to make it available in the webservice, it would look like this:

```php
<?php
/**
 * Add an entity in the Webservice
 *
 * @param array $params All existing resources from the core
 * @return array New resources
 */
public function hookAddWebserviceResources($params)
{
    return array(
        'reassurance' => array(
            'description' => 'Module Reassurance example',
            'class' => 'reassuranceClass',
            'forbidden_method' => array('PUT', 'POST', 'DELETE')),
    );
}
```

This will add the resource `reassurance` available into the permissions list, based on the key.

### Module controllers 

As the webservice is only an interface to get and update objects on the database, it does not allow to run complex actions.
Module controller may be implemented to allow any external service to reach your shop, then trigger specific actions or retrieve content.

You should implement a method that filters non-authenticated calls. This prevents guests accessing private content, or trigger actions on your behalf.
This can be done by generating your own token and checking it everytime the controller is called. `Tools::encrypt($token)` may be useful.

**Resources:**

* [About the controllers]({{< ref "8/modules/concepts/controllers/front-controllers" >}})
* [Example with Faceted Search module (Outside a controller)](https://github.com/PrestaShop/ps_facetedsearch/blob/6f7b97e77b0fca30c0acf74316996cfc82a263a9/ps_facetedsearch-clear-cache.php#L6-L8)


## Requests from a shop

HTTP requests can be triggered from a shop to an external service.

Several methods allows requests to be sent (in order of preference):

* [Guzzle](https://github.com/guzzle/guzzle). The version 7.4 is included from PrestaShop {{< minver v="8.0" >}} (version 5 in {{< minver v="1.7.0" >}}), but can be included in your module as well for older PS versions.
  * Loading in memory another version of guzzle in the same namespace will trigger errors on the shop.
  * Example with PS Checkout module: [Inclusion in composer.json](https://github.com/PrestaShopCorp/ps_checkout/blob/578135d8bef2d99b8056ebc0bd709e9a87d661e6/composer.json#L28) & [implementation](https://github.com/PrestaShopCorp/ps_checkout/blob/ef48da09735e6e64b42364a703b5a74d41cd24d9/classes/Api/Payment/Dispute.php)
* [\Tools::file_get_contents(...)](https://github.com/PrestaShop/PrestaShop/blob/a07a569b45ab6afc777f25aba505997004e5f70a/classes/Tools.php#L2212-L2223)
  * Will rely on `cURL` or `fopen()`, depending on what is available on the shop.
  * Exists from PrestaShop {{< minver v="1.4" >}}
* [cURL](https://www.php.net/manual/en/book.curl.php)
  * cURL is mandatory for PrestaShop {{< minver v="1.7" >}}. For older versions, the extension must be checked first to avoid fatal errors.
