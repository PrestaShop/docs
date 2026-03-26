---
title: API Resources
menuTitle: API Resources
weight: 2
useMermaid: true
---------

# API Resources

API Platform has many different ways to configure and define APIs (PHP, YAML, XML). We chose the PHP approach relying on [PHP attributes](https://www.php.net/manual/en/language.attributes.overview.php) to simplify and centralize the configuration in a single file, which is why:

- Use of **PHP attributes** to be closer to the code
- We tried to keep the configuration to the minimum
- **Scopes** are defined directly on the endpoint, they are transformed into **roles** for Symfony behind the scene
- The scopes specified on each endpoint are **extracted and used dynamically** in the back office for edition
- All the API Platform configuration is still usable

## Automatic loading from folders

We configured PrestaShop so that it automatically loads API resource classes from the core AND from the modules (handled by `PrestaShopExtension`) as long as the following convention is respected:

- resources in the core project are in the `src/PrestaShopBundle/ApiPlatform/Resources`
- resources in modules are in the `src/ApiPlatform/Resources`

The endpoints defined in modules resources are only usable when the module is **installed and enabled**. However, the scopes defined in the modules are scanned as long as the module is installed, this allows assigning them to clients before you enable the module and its endpoints.

## CQRS operations

The core API is based on CQRS integration, to simplify the configuration we created custom operations that can be used to configure the endpoints.

The following examples display each operation separately, but you can define them all in the same class (as long as they share the same fields and a common DTO makes sense).

{{% notice note %}}
You can have some fields that are not common to all operations, the API Platform framework will only normalize present fields the others are ignored.
{{% /notice %}}

### CQRSGet

| HTTP Method | Action                 |
|-------------|------------------------|
| GET         | Read a single resource |

```php
<?php
declare(strict_types=1);

namespace PrestaShop\Module\APIResources\ApiPlatform\Resources\ApiClient;

use ApiPlatform\Metadata\ApiProperty;
use ApiPlatform\Metadata\ApiResource;
use PrestaShop\PrestaShop\Core\Domain\ApiClient\Exception\ApiClientNotFoundException;
use PrestaShop\PrestaShop\Core\Domain\ApiClient\Query\GetApiClientForEditing;
use PrestaShopBundle\ApiPlatform\Metadata\CQRSGet;

#[ApiResource(
    operations: [
        new CQRSGet(
            uriTemplate: '/api-client/{apiClientId}',
            requirements: ['apiClientId' => '\d+'],
            CQRSQuery: GetApiClientForEditing::class,
            scopes: ['api_client_read']
        ),
    ],
    exceptionToStatus: [ApiClientNotFoundException::class => 404],
)]
class ApiClient
{
    #[ApiProperty(identifier: true)]
    public int $apiClientId;

    public string $clientId;

    public string $clientName;

    public string $description;

    public ?string $externalIssuer;

    public bool $enabled;

    public int $lifetime;

    public array $scopes;
}
```

### CQRSCreate

| HTTP Method | Action                |
|-------------|-----------------------|
| POST        | Create a new resource |

In this example `AddApiClientCommand` returns a `CreatedApiClient` object, so the response will be built based on this returned object.
If you want the endpoint to fetch and return the whole object you can specify a `CQRSQuery` parameter (see the following update example).

```php
<?php
declare(strict_types=1);

namespace PrestaShop\Module\APIResources\ApiPlatform\Resources\ApiClient;

use ApiPlatform\Metadata\ApiProperty;
use ApiPlatform\Metadata\ApiResource;
use PrestaShop\PrestaShop\Core\Domain\ApiClient\Command\AddApiClientCommand;
use PrestaShop\PrestaShop\Core\Domain\ApiClient\Exception\ApiClientNotFoundException;
use PrestaShopBundle\ApiPlatform\Metadata\CQRSCreate;

#[ApiResource(
    operations: [
        new CQRSCreate(
            uriTemplate: '/api-client',
            CQRSCommand: AddApiClientCommand::class,
            scopes: ['api_client_write']
        ),
    ],
)]
class ApiClient
{
    #[ApiProperty(identifier: true)]
    public int $apiClientId;

    public string $clientId;

    public string $clientName;

    public string $description;

    public ?string $externalIssuer;

    public bool $enabled;

    public int $lifetime;

    public array $scopes;

    /**
     * Only used for the return of created API Client, it is the only endpoint where the secret is returned.
     *
     * @var string
     */
    public string $secret;
}
```

### CQRSPartialUpdate

| HTTP Method | Action                                                                                                   |
|-------------|----------------------------------------------------------------------------------------------------------|
| PATCH       | Update a resource partially (not all fields are required, the missing ones are ignored and not modified) |

In this example we want the endpoint to return the state of the updated resource, so we define `CQRSQuery` parameter with the CQRS query that fetches it, the result will we serialized in the same format as the GET operation above.

```php
<?php
declare(strict_types=1);

namespace PrestaShop\Module\APIResources\ApiPlatform\Resources\ApiClient;

use ApiPlatform\Metadata\ApiProperty;
use ApiPlatform\Metadata\ApiResource;
use PrestaShop\PrestaShop\Core\Domain\ApiClient\Command\EditApiClientCommand;
use PrestaShop\PrestaShop\Core\Domain\ApiClient\Exception\ApiClientNotFoundException;
use PrestaShop\PrestaShop\Core\Domain\ApiClient\Query\GetApiClientForEditing;
use PrestaShopBundle\ApiPlatform\Metadata\CQRSPartialUpdate;

#[ApiResource(
    operations: [
        new CQRSPartialUpdate(
            uriTemplate: '/api-client/{apiClientId}',
            read: false,
            CQRSCommand: EditApiClientCommand::class,
            CQRSQuery: GetApiClientForEditing::class,
            scopes: ['api_client_write']
        ),
    ],
    exceptionToStatus: [ApiClientNotFoundException::class => 404],
)]
class ApiClient
{
    #[ApiProperty(identifier: true)]
    public int $apiClientId;

    public string $clientId;

    public string $clientName;

    public string $description;

    public ?string $externalIssuer;

    public bool $enabled;

    public int $lifetime;

    public array $scopes;
}
```

### CQRSUpdate

| HTTP Method | Action                                                                                                              |
|-------------|---------------------------------------------------------------------------------------------------------------------|
| PUT         | Update a resource by replacing its whole content (you must specify all the fields or they will be considered empty) |

```php
<?php
declare(strict_types=1);

namespace PrestaShop\Module\APIResources\ApiPlatform\Resources\ApiClient;

use ApiPlatform\Metadata\ApiProperty;
use ApiPlatform\Metadata\ApiResource;
use PrestaShop\PrestaShop\Core\Domain\ApiClient\Command\EditApiClientCommand;
use PrestaShop\PrestaShop\Core\Domain\ApiClient\Exception\ApiClientNotFoundException;
use PrestaShop\PrestaShop\Core\Domain\ApiClient\Query\GetApiClientForEditing;
use PrestaShopBundle\ApiPlatform\Metadata\CQRSUpdate;

#[ApiResource(
    operations: [
        new CQRSUpdate(
            uriTemplate: '/api-client/{apiClientId}',
            read: false,
            CQRSCommand: EditApiClientCommand::class,
            CQRSQuery: GetApiClientForEditing::class,
            scopes: ['api_client_write']
        ),
    ],
    exceptionToStatus: [ApiClientNotFoundException::class => 404],
)]
class ApiClient
{
    #[ApiProperty(identifier: true)]
    public int $apiClientId;

    public string $clientId;

    public string $clientName;

    public string $description;

    public ?string $externalIssuer;

    public bool $enabled;

    public int $lifetime;

    public array $scopes;
}
```

### CQRSDelete

| HTTP Method | Action                   |
|-------------|--------------------------|
| DELETE      | Delete a single resource |

```php
<?php
declare(strict_types=1);

namespace PrestaShop\Module\APIResources\ApiPlatform\Resources\ApiClient;

use ApiPlatform\Metadata\ApiProperty;
use ApiPlatform\Metadata\ApiResource;
use PrestaShop\PrestaShop\Core\Domain\ApiClient\Command\DeleteApiClientCommand;
use PrestaShop\PrestaShop\Core\Domain\ApiClient\Exception\ApiClientNotFoundException;
use PrestaShopBundle\ApiPlatform\Metadata\CQRSDelete;

#[ApiResource(
    operations: [
        new CQRSDelete(
            uriTemplate: '/api-client/{apiClientId}',
            requirements: ['apiClientId' => '\d+'],
            output: false,
            CQRSCommand: DeleteApiClientCommand::class,
            scopes: ['api_client_write']
        ),
    ],
    exceptionToStatus: [ApiClientNotFoundException::class => 404],
)]
class ApiClient
{
    #[ApiProperty(identifier: true)]
    public int $apiClientId;
}
```

### CQRSPaginate

| HTTP Method | Action                      |
|-------------|-----------------------------|
| GET         | Read a paginated collection |

`CQRSPaginate` is the CQRS-based equivalent of `PaginatedList` for endpoints backed by a CQRS query instead of a `GridDataFactory`. Use it when you have a CQRS query that handles pagination internally and returns a result object containing both an items list and a total count. Use `PaginatedList` instead when you need to reuse an existing grid data factory.

```php
<?php
declare(strict_types=1);

namespace PrestaShop\Module\APIResources\ApiPlatform\Resources\Product;

use ApiPlatform\Metadata\ApiProperty;
use ApiPlatform\Metadata\ApiResource;
use PrestaShop\PrestaShop\Core\Domain\Product\Combination\Query\GetEditableCombinationsList;
use PrestaShop\PrestaShop\Core\Domain\Product\Exception\ProductNotFoundException;
use PrestaShop\PrestaShop\Core\Search\Filters\ProductCombinationFilters;
use PrestaShopBundle\ApiPlatform\Metadata\CQRSPaginate;
use Symfony\Component\HttpFoundation\Response;

#[ApiResource(
    operations: [
        new CQRSPaginate(
            uriTemplate: '/products/{productId}/combinations',
            CQRSQuery: GetEditableCombinationsList::class,
            scopes: [
                'product_read',
            ],
            CQRSQueryMapping: [
                '[_context][langId]' => '[languageId]',
                '[_context][shopConstraint]' => '[shopConstraint]',
            ],
            ApiResourceMapping: [
                '[combinationName]' => '[name]',
                '[attributesInformation]' => '[attributes]',
                '[impactOnPrice]' => '[impactOnPriceTaxExcluded]',
            ],
            filtersClass: ProductCombinationFilters::class,
            filtersMapping: [
                '[_context][shopId]' => '[shopId]',
            ],
            itemsField: 'combinations',
            countField: 'totalCombinationsCount',
        ),
    ],
    exceptionToStatus: [
        ProductNotFoundException::class => Response::HTTP_NOT_FOUND,
    ],
)]
class CombinationList
{
    public int $productId;
    public int $combinationId;
    public string $name;
    public bool $default;
    public string $reference;
    public array $attributes;
}
```

The provider (`QueryListProvider`) builds a `Filters` object from the request query parameters (`offset`, `limit`, `orderBy`, `sortOrder`, `filters`), executes the CQRS query, and returns a `PaginationElements` object with pagination metadata alongside the items. The default page size is 50 items.

The CQRS query receives pagination parameters plus URI variables and context parameters automatically. The normalized query result must expose the items array and total count as top-level fields, identified by `itemsField` and `countField`.

#### Custom parameters

| Parameter | Type | Required | Default | Description |
|---|---|---|---|---|
| `CQRSQuery` | `string` | Yes | — | Fully qualified class name of the CQRS query to execute. The query must handle pagination internally. |
| `scopes` | `string[]` | No | `[]` | OAuth scopes required to access the endpoint. |
| `CQRSQueryMapping` | `array` | No | `null` | Field mapping applied when denormalizing the query object and normalizing the query result. See [Custom Mapping](#custom-mapping). |
| `ApiResourceMapping` | `array` | No | `null` | Field mapping applied when denormalizing each item from the query result into the API resource DTO. See [Custom Mapping](#custom-mapping). |
| `filtersClass` | `string` | No | `Filters::class` | Fully qualified class name of the `Filters` subclass to use. Specify a custom class to enforce default ordering or filtering constraints. |
| `filtersMapping` | `array` | No | `null` | Maps API field names to the internal names used by the `Filters` class. Applied to `filters` and `orderBy` query parameters. See [Custom Mapping](#custom-mapping). |
| `itemsField` | `string` | No | `'items'` | Name of the field in the normalized CQRS query result that holds the list of items. |
| `countField` | `string` | No | `'count'` | Name of the field in the normalized CQRS query result that holds the total item count. |

## PaginatedList

For listing operations we provided a custom operation based on the core grid system based on two settings:

- **gridDataFactory**: service ID implementing the `GridDataFactoryInterface` (also used in all migrated pages listing)
- **filtersClass**: the `Filters` class to used, it is optional but if you specify a custom one then you can force the default values

{{% notice note %}}
You can see this example also defines some custom mapping, you can read more about this bellow.
{{% /notice %}}

```php
<?php
declare(strict_types=1);

namespace PrestaShop\Module\APIResources\ApiPlatform\Resources\ApiClient;

use ApiPlatform\Metadata\ApiProperty;
use ApiPlatform\Metadata\ApiResource;
use PrestaShop\PrestaShop\Core\Search\Filters\ApiClientFilters;
use PrestaShopBundle\ApiPlatform\Metadata\PaginatedList;

#[ApiResource(
    operations: [
        new PaginatedList(
            uriTemplate: '/api-clients',
            scopes: [
                'api_client_read',
            ],
            ApiResourceMapping: [
                '[id_api_client]' => '[apiClientId]',
                '[client_id]' => '[clientId]',
                '[client_name]' => '[clientName]',
                '[external_issuer]' => '[externalIssuer]',
            ],
            gridDataFactory: 'prestashop.core.grid.data_factory.api_client',
            filtersClass: ApiClientFilters::class,
            filtersMapping: [
                '[apiClientId]' => '[id_api_client]',
                '[clientId]' => '[client_id]',
                '[clientName]' => '[client_name]',
                '[externalIssuer]' => '[external_issuer]',
            ],
        ),
    ],
    normalizationContext: ['skip_null_values' => false],
)]
class ApiClientList
{
    #[ApiProperty(identifier: true)]
    public int $apiClientId;

    public string $clientId;

    public string $clientName;

    public string $description;

    public ?string $externalIssuer;

    public bool $enabled;

    public int $lifetime;
}
```

## Custom Mapping

The API Platform DTO allows you to define the expected format of your API endpoint, including the format of each field name (snake case, camel case, etc.) and any field you want to rename because it seems better.

However, the CQRS or Grid implementation may not match the format or naming you expected, which is why you can define some mapping to explain how to match the fields between your DTO and the underlying implementation.

Each mapping is an associative array. The keys are the original naming, and the value is the target mapping (the renamed key if you prefer). You can customize different mappings that are used at different moments of normalization in the workflow.

| Mapping field      | Usage                                                                         |
|--------------------|-------------------------------------------------------------------------------|
| CQRSQueryMapping   | Used to normalize/denormalize CQRS query objects AND CQRS QueryResult objects |
| CQRSCommandMapping | Used to normalize/denormalize CQRS command objects                            |
| ApiResourceMapping | Used to normalize/denormalize Api Resource DTO objects                        |
| filtersMapping     | Used to normalize the Filters object                                          |

To clarify when each mapping is used for normalization or denormalization here are the details of each workflow:

### Query Provider

<div class="mermaid">
stateDiagram-v2
  state "Query Parameters" as query_parameters
  state "CQRS Query" as cqrs_query
  state "CQRS Query Result" as query_result
  state "API Resource" as api_resource
  state "Flat array" as flat_array
  state "JSON output data" as json_output
  query_parameters --> cqrs_query
  note right of cqrs_query: Deormalized using CQRSQueryMapping
  cqrs_query --> query_result: Query handler returns result
  query_result --> flat_array
  note right of flat_array: Normalized using CQRSQueryMapping
  flat_array --> api_resource
  note left of api_resource: Denormalized using ApiResourceMapping
  api_resource --> json_output: Normalized by API Platform
</div>

### Command Processor

<div class="mermaid">
stateDiagram-v2
  state "Query Parameters" as query_parameters
  state "JSON input data" as json
  state "JSON output data" as json_command_output
  state "JSON output data" as json_query_output
  state "Api Resource" as api_resource
  state "Api Resource" as api_resource_command_result
  state "Api Resource" as api_resource_query_result
  state "Flat array" as flat_array_input
  state "Flat array" as flat_array_output
  state "CQRS Command" as cqrs_command
  state "Command Result" as command_result
  state "Normalized Result" as normalized_result
  state "Normalized Result" as normalized_result_query
  state "No content" as no_content
  state "Check Command Result" as check_cqrs_query
  state "Check Command Result" as check_command_result
  state "Query Parameters" as query_parameters_fallback
  state "CQRS Query" as cqrs_query
  state "CQRS Query Result" as query_result
  json --> api_resource: Denormalized by API Platform
  api_resource --> flat_array_input
  note right of flat_array_input : Normalized using ApiResourceMapping
  query_parameters --> cqrs_command
  note right of cqrs_command : Denormalized using CQRSCommandMapping
  flat_array_input --> cqrs_command
  cqrs_command --> command_result: Command handler returns result
  command_result --> check_command_result: If CQRSQuery not defined
  check_command_result --> normalized_result: If command result not null
  check_command_result --> no_content
  note right of normalized_result : Normalized using CQRSCommandMapping
  normalized_result --> api_resource_command_result
  note right of api_resource_command_result : Denormalized using ApiResourceMapping
  api_resource_command_result --> json_command_output: Normalized by API Platform
  command_result --> check_cqrs_query: If CQRSQuery defined
  check_cqrs_query --> normalized_result_query: If command returned result
  note right of normalized_result_query : Normalized using CQRSCommandMapping
  check_cqrs_query --> query_parameters_fallback: If command returned nothing
  note right of cqrs_query: Deormalized using CQRSQueryMapping
  query_parameters_fallback --> cqrs_query
  normalized_result_query --> cqrs_query
  cqrs_query --> query_result: Query handler returns result
  query_result --> flat_array_output
  note right of flat_array_output: Normalized using CQRSQueryMapping
  flat_array_output --> api_resource_query_result
  note right of api_resource_query_result : Denormalized using ApiResourceMapping
  api_resource_query_result --> json_query_output: Normalized by API Platform
</div>

### Query List Provider

<div class="mermaid">
stateDiagram-v2
  state "Query parameters" as query_parameters
  state "Filters class" as filters_class
  state "Filters object" as filters_object
  state "Grid data" as grid_data
  state "Collection of Api Resource" as api_resource_collection
  state "JSON output data" as json_output
  query_parameters --> filters_object
  filters_class --> filters_object
  note right of filters_object: Normalized using filtersMapping
  filters_object --> grid_data: Fetch grid data via Grid Data Factory
  grid_data --> api_resource_collection
  note right of api_resource_collection: Denormalized using ApiResourceMapping
  api_resource_collection --> json_output: Normalized by API Platform
</div>
