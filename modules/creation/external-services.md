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

* [About the webservice]({{< ref "/9/webservice" >}})
* [Enable & add users to the webservice]({{< ref "/9/webservice/tutorials/creating-access" >}})

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

* [About the controllers]({{< ref "/9/modules/concepts/controllers/front-controllers.md" >}})
* [Example with Faceted Search module (Outside a controller)](https://github.com/PrestaShop/ps_facetedsearch/blob/6f7b97e77b0fca30c0acf74316996cfc82a263a9/ps_facetedsearch-clear-cache.php#L6-L8)


## Requests from a shop

HTTP requests can be triggered from a shop to an external service.

Several methods allow requests to be sent (in order of preference):

* [Symfony HTTP Client](https://symfony.com/doc/6.4/http_client.html)
  * In legacy code you can create one manually `$client = HttpClient::create();`
  * In Symfony environment (in the BO) you should rely on dependency injection as the Symfony documentation suggests
```php
use Symfony\Contracts\HttpClient\HttpClientInterface;

class SymfonyDocs
{
    public function __construct(
        private HttpClientInterface $client,
    ) {
    }

    public function fetchGitHubInformation(): array
    {
        $response = $this->client->request(
            'GET',
            'https://api.github.com/repos/symfony/symfony-docs'
        );
        
        return $response->getContent();
    }
}
```
* [\Tools::file_get_contents(...)](https://github.com/PrestaShop/PrestaShop/blob/a07a569b45ab6afc777f25aba505997004e5f70a/classes/Tools.php#L2212-L2223)
  * Will rely on `cURL` or `fopen()`, depending on what is available on the shop.
  * Exists from PrestaShop {{< minver v="1.4" >}}
* [cURL](https://www.php.net/manual/en/book.curl.php)
  * cURL is mandatory for PrestaShop {{< minver v="1.7" >}}. For older versions, the extension must be checked first to avoid fatal errors.
