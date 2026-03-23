---
title: Create new API endpoints using CQRS
menuTitle: Contribute to Core API
showOnHomepage: true
weight: 200
---

# Create new API endpoints using CQRS

This guide explains how to create new endpoints for an entity. In this case we chose `AttributeGroup`  as an example, and you can check this [pull request as an example](https://github.com/PrestaShop/ps_apiresources/pull/55) in PrestaShop's `ps_apiresources` module.

{{% notice note %}}
For the new Admin API, although the whole architecture is inside the core of PrestaShop the definition of all the endpoints are in the [ps_apiresources](https://github.com/PrestaShop/ps_apiresources) module, externalizing the endpoints in a module allows us to make them evolve outside the core release cycle, so it can be updated and improved more frequently.
{{% /notice %}}

{{% notice warning %}}
This documentation is based on the most recent modifications and bugfixes done for PrestaShop `9.0.2`, so to contribute new core endpoints please make sure you use at least this version, or the `9.0.x` branch which should be even more up-to-date.
{{% /notice %}}

{{% notice info %}}
**Automated CI Checks**

Your contribution will be automatically validated by CI to ensure code quality and consistency. To help your PR get approved quickly, please follow these important guidelines:
- **No custom normalizers** in the module (use mapping instead)
- **No custom processors** in the module (core processors are sufficient)
- **No Value Objects (VOs)** in API Resources (only scalar types allowed)
- Integration tests must use **full data assertions** (not field-by-field checks)

If any issues are detected, the CI will provide helpful comments to guide you on how to fix them. If you believe your use case requires core improvements (e.g., a new generic normalizer or mapping capability), please reach out to the team - we're here to help!
{{% /notice %}}

## 📋 Prerequisites

- Basic knowledge of PHP and OOP
- PrestaShop development environment configured
- Git installed and configured
- PHPUnit knowledge for testing
- Understanding of [CQRS (Command Query Responsibility Segregation) pattern]({{< relref "/9/development/architecture/domain/cqrs">}})
- Understanding of the [Grid component]({{< relref "/9/development/components/grid">}})
- Understanding of [OAuth2]({{< relref "/9/admin-api/oauth">}})
- Understanding of how our [CQRS architecture integrates with API Platform]({{< relref "/9/admin-api/resource_server/api-platform">}})
- Understanding of [API Resources and our customer operations]({{< relref "/9/admin-api/resource_server/api-resources">}})
- Understanding the conventions defined in our [CQRS API guidelines ADR](https://github.com/PrestaShop/ADR/blob/master/0023-cqrs-api-guidelines.md) (Architecture Decision Record)

## 🎯 Objective

Create REST API endpoints to manage attribute groups (AttributeGroup) with complete CRUD operations and comprehensive PHPUnit integration test coverage.

## 🏗️ Project Structure

```
ps_apiresources/
├── src/
│   └── ApiPlatform/
│       └── Resources/
│           └── Attribute/                      # The namespace contains the larger domain Attribute (that combines AttributeGroup and AttributeValue)
│               ├── AttributeGroup.php          # Resource for single operations
│               ├── AttributeGroupList.php      # Resource for listing
│               └── BulkAttributeGroups.php     # Resource for bulk operation
                └── BulkAttribute.php           # Resource for bulk operation on Attribute Values
├── tests/
│   └── Integration/
│       └── ApiPlatform/
│           └── Resources/
│               └── AttributeGroupEndpointTest.php
```

## 🎨 API Design Principles

Before implementing endpoints, you must follow the conventions defined in the [CQRS API guidelines ADR](https://github.com/PrestaShop/ADR/blob/master/0023-cqrs-api-guidelines.md). Here are the fundamental rules:

#### URI Path Conventions

- **Base on the CQRS domain name** from `PrestaShop/PrestaShop/Core/Domain` (matches ObjectModel entity name)
- **Use plural form** for URIs (e.g., `/hooks`, `/products`, `/attribute-groups`)
- **Use domain name + "Id" suffix** for identifiers (e.g., `hookId`, `productId`, `attributeGroupId`)
- **Use kebab-case** for compound names and actions (e.g., `/assign-to-category`, `/bulk-delete`)
- **Sub-parts follow the parent path** (e.g., `/products/{productId}/combinations`, `/hooks/{hookId}/status`)

#### HTTP Methods and Custom Operations

- **GET**: Read operations → use `CQRSGet` or `CQRSGetCollection`
- **POST**: Creation and duplication → use `CQRSCreate`
- **PUT**: Full update → use `CQRSUpdate`
- **PATCH**: Partial update → use `CQRSPartialUpdate`
- **DELETE**: Delete operations → use `CQRSDelete`
- **PaginatedList**: For paginated collections

#### Multilang Field Conventions

For entities with multilang values:
- **Single entity endpoints**: Return ALL languages as an associative array indexed by locale, for example:
```json
{"names": {"en-US": "english name", "fr-FR": "nom français"}}
```

- **List endpoints**: Return only one language as strings (default shop language, or specify `langId` query parameter)

#### API Resource Properties Rules

All API resource class fields must follow these strict rules:
- **All fields must be strictly typed** (e.g., `public string $name;`, not `public $name;`)
- **Only scalar types and arrays are allowed** - NO Value Objects (VOs) in API Resources (enforced by CI/Rector)
- **Localized properties do NOT start with "localized"** (e.g., `public array $names;`, not `public array $localizedNames;`)
  - Use the `#[LocalizedValue]` attribute for automatic locale conversion
- **Boolean fields should NOT start with "is"** (e.g., `public bool $ready;`, not `public bool $isReady;`)
- **Status field must use "enabled"** to homogenize naming (e.g., `public bool $enabled;`, not `$active`, `$enable`, etc.)
- **Use internal mapping attributes**: `CQRSQueryMapping`, `CQRSCommandMapping`, `ApiResourceMapping` instead of `SerializedName`
- **Document array fields properly** for OpenAPI schema generation (use `#[ApiProperty(openapiContext: ...)]` for nested structures)

#### Scope Naming Convention

- Use **singular form** of the entity domain name
- **snake_case** format
- Append the action: `{entity}_read` or `{entity}_write`
- Examples: `order_read`, `order_write`, `product_read`, `product_write`
- Detailed sub-scopes may be defined later (e.g., `order_update_address`, `order_create_invoice`)

#### Bulk Operations Convention

- Always use `bulk-` prefix for the action (e.g., `/products/bulk-delete`, `/products/bulk-update-status`)
- Use plural form of domain + "Ids" for parameter names (e.g., `productIds`, `attributeGroupIds`)
- Default to POST method if no HTTP method consensus exists
- Examples:
  - `DELETE /products/bulk-delete` with `productIds` in body
  - `POST /products/bulk-duplicate` with `productIds` in body
  - `PUT /products/bulk-update-status` with `productIds` in body

{{% notice tip %}}
For complete details, always refer to the [CQRS API guidelines ADR](https://github.com/PrestaShop/ADR/blob/master/0023-cqrs-api-guidelines.md).
{{% /notice %}}

## 🚫 What NOT to do

The following practices are **forbidden** and will be automatically blocked by CI:

#### NO Custom Normalizers

{{% notice info %}}
**Custom normalizers are NOT allowed in the `ps_apiresources` module.**

- Normalization should be handled by the core's generic normalization system
- Use **mapping** (`CQRSQueryMapping`, `CQRSCommandMapping`, `ApiResourceMapping`) instead of normalizers
- If a command/query has a specific structure that can't be normalized with current tools, the **core must be improved** with a generic solution
- This ensures reusability and avoids code duplication

**CI Check**: A whitelist system exists for exceptional cases, but exceptions are only granted when no generic approach is possible. The CI will block PRs with normalizers and provide guidance.

**Need Help?** If you encounter a situation where mapping isn't sufficient and believe a new generic normalizer is needed in the core, please reach out to the team. We can work together to add the functionality to the core in a reusable way.
{{% /notice %}}

#### NO Custom Processors

{{% notice info %}}
**Custom processors are NOT allowed in the `ps_apiresources` module.**

- The core already contains generic processors that handle all common cases
- Core processors combined with proper normalization and mapping are sufficient
- Adding custom processors creates maintenance overhead and inconsistency

**CI Check**: PRs containing custom processors will be automatically blocked.

**Need Help?** If you encounter a situation where existing core processors don't cover your use case, please reach out to the team. We can evaluate whether a new generic processor should be added to the core.
{{% /notice %}}

#### NO Value Objects in API Resources

{{% notice info %}}
**Value Objects (VOs) are forbidden in API Resources.**

- Only **scalar types** (`string`, `int`, `float`, `bool`) and **arrays** are allowed in API Resource properties
- This ensures proper serialization and OpenAPI documentation generation
- Complex structures should be represented as arrays with proper documentation

**CI Check**: A Rector rule enforces this and will block PRs with VOs in API Resources.

**Need Help?** If you have a complex data structure that's difficult to represent with scalars and arrays, please reach out to the team. We can discuss alternative approaches or potential core enhancements.
{{% /notice %}}

## 📝 Implementation Steps

The new admin API is based on APIPlatform, we use some API Resources which are classes used to define our endpoint configuration:
- the field names used in API resources will define the format of our API ant its json field names
- a READ operation on a single entity is linked to a CQRS query
- a WRITE operation on a single entity (or multiple) is linked to a CQRS command
- a LIST operation is linked to a [Grid data factory]({{< relref "/9/development/components/grid/#grid-data">}}) service

### 1. Create and fetch a single resource

#### Create the API Resource object that defines our expected format

Create the file `src/ApiPlatform/Resources/Attribute/AttributeGroup.php`, here is the simple DTO with the naming we are expecting:

{{% notice warning %}}
**IMPORTANT**: Follow the [API Resource Properties Rules](#api-resource-properties-rules) from the ADR:
- All fields must be strictly typed
- Localized properties do NOT start with "localized" (use `$names`, not `$localizedNames`)
- Boolean fields should NOT start with "is" (use `$ready`, not `$isReady`)
- Status field must use "enabled" (not `$active`, `$enable`, etc.)
{{% /notice %}}

```php
<?php
declare(strict_types=1);

namespace PrestaShop\Module\APIResources\ApiPlatform\Resources\AttributeGroup;

use ApiPlatform\Metadata\ApiProperty;

class AttributeGroup
{
    #[ApiProperty(identifier: true)]
    public int $attributeGroupId;

    public array $names;

    public array $publicNames;

    public string $groupType;

    public int $position;
}
```

#### Add POST and GET endpoints

We will now add two endpoints (for `POST` and `GET` methods) that will allow:
- creating the AttributeGroup, we will use the `AddAttributeGroupCommand` mapped with a `CQRSCreate` operation, it requires a scope `attribute_group_write` to be used
  - by default the command will only return the created ID if you want to return the full object you need to define the `CQRSQuery` option on the operation, this way the full object is read and returned in the response
- fetching the AttributeGroup, we will use the `GetAttributeGroupForEditing` mapped with a `CQRSGet` operation, it requires a scope `attribute_group_read` to be used

{{% notice note %}}
**URI Convention**: Following the ADR, we use:
- Plural form: `/attributes/groups` (not `/attribute/group`)
- Domain name + "Id" suffix for identifier: `attributeGroupId` (not `id` or `attribute_group_id`)
- Scope naming: `attribute_group_read` and `attribute_group_write` (singular, snake_case)
{{% /notice %}}

```php
<?php
declare(strict_types=1);

namespace PrestaShop\Module\APIResources\ApiPlatform\Resources\AttributeGroup;

use ApiPlatform\Metadata\ApiProperty;
use ApiPlatform\Metadata\ApiResource;
use PrestaShop\PrestaShop\Core\Domain\AttributeGroup\Command\AddAttributeGroupCommand;
use PrestaShop\PrestaShop\Core\Domain\AttributeGroup\Query\GetAttributeGroupForEditing;
use PrestaShopBundle\ApiPlatform\Metadata\CQRSCreate;
use PrestaShopBundle\ApiPlatform\Metadata\CQRSGet;

#[ApiResource(
    operations: [
        // GET /attributes/groups/{attributeGroupId}
        new CQRSGet(
            uriTemplate: '/attributes/groups/{attributeGroupId}',
            requirements: ['attributeGroupId' => '\d+'],
            CQRSQuery: GetAttributeGroupForEditing::class,
            scopes: ['attribute_group_read']
        ),
        // POST /attributes/group
        new CQRSCreate(
            uriTemplate: '/attributes/group',
            CQRSCommand: AddAttributeGroupCommand::class,
            # Define a CQRSQuery to use after the command has been executed to return a response with the updated data
            CQRSQuery: GetAttributeGroupForEditing::class,
            scopes: ['attribute_group_write']
        ),
    ],
)]
class AttributeGroup
{
    #[ApiProperty(identifier: true)]
    public int $attributeGroupId;

    public array $names;

    public array $publicNames;

    public string $groupType;

    public int $position;
}
```

#### Define custom mapping

Now we face a problem, the name of the fields in our API resource are not identical with the CQRS objects they are mapped to:
- the command `AddAttributeGroupCommand` use `localizedNames` and `localizedPublicNames` instead of `names` and `publicNames` respectively
- the query result `EditableAttributeGroup` (returned by our query) uses `name` and `publicName`

So we have to explain to our core architecture how to map these data if we want to keep the target naming on our API resource. This is done using mapping (you can read more about [custom mapping]({{< relref "/9/admin-api/resource_server/api-resources#custom-mapping">}})), here is the API resource adapted with the proper mapping, we use class protected const to reuse the mapping in several operations more easily:

{{% notice tip %}}
**ADR Requirement**: Use the internal mapping attributes (`CQRSQueryMapping`, `CQRSCommandMapping`, `ApiResourceMapping`) instead of the `SerializedName` attribute, as it is not applied everywhere appropriately for the documentation.
{{% /notice %}}

```php
#[ApiResource(
    operations: [
        new CQRSGet(
            uriTemplate: '/attributes/group/{attributeGroupId}',
            CQRSQuery: GetAttributeGroupForEditing::class,
            scopes: [
                'attribute_group_read',
            ],
            CQRSQueryMapping: self::QUERY_MAPPING,
        ),
        new CQRSCreate(
            uriTemplate: '/attributes/group',
            CQRSCommand: AddAttributeGroupCommand::class,
            CQRSQuery: GetAttributeGroupForEditing::class,
            scopes: [
                'attribute_group_write',
            ],
            CQRSQueryMapping: self::QUERY_MAPPING,
            CQRSCommandMapping: self::COMMAND_MAPPING,
        ),
    ],
)]
class AttributeGroup
{
    #[ApiProperty(identifier: true)]
    public int $attributeGroupId;

    public array $names;

    public array $publicNames;

    public string $type;

    public array $shopIds;

    public int $position;

    public const QUERY_MAPPING = [
        '[name]' => '[names]',
        '[publicName]' => '[publicNames]',
        '[associatedShopIds]' => '[shopIds]',
    ];

    public const COMMAND_MAPPING = [
        '[names]' => '[localizedNames]',
        '[publicNames]' => '[localizedPublicNames]',
        '[shopIds]' => '[associatedShopIds]',
    ];
}
```

#### Handle localized values

One last thing to handle for our API to be easy to use, at this point you'll notice that the localize values are indexed by `Language ID` using the value in the DB. These Ids can change on each shop depending on when they were installed, which other languages are present and so on.

```json
{
  "names": {
    "1": "english value",
    "3": "french value"
  }
}
```

You can find which ID is associated to which language by using the `/admin-api/languages` API, but it's not very convenient as you will still need to handle the mapping yourself when posting/fetching some date.
It is much more convenient if the localized values are index by locale value like this:

```json
{
  "names": {
    "en-US": "english value",
    "fr-FR": "french value"
  }
}
```

That's why we introduced a customer PHP attribute `PrestaShopBundle\ApiPlatform\Metadata\LocalizedValue` that you can simply add on the field that must be handled specifically, and internally the core will handle the automatic convertion of `locale-to-id` and `id-to-locale` for both read and write operations:

{{% notice note %}}
**ADR Convention**: Following the [Multilang Field Conventions](#multilang-field-conventions):
- Single entity endpoints return ALL languages indexed by locale
- List endpoints return only one language as a string (default shop language or `langId` parameter)
- Localized property names do NOT start with "localized" (use `$names`, not `$localizedNames`)
{{% /notice %}}

```php
...
use PrestaShopBundle\ApiPlatform\Metadata\LocalizedValue;
...

#[ApiResource(
    ...
)]
class AttributeGroup
{
    ...

    #[LocalizedValue]
    public array $names;

    #[LocalizedValue]
    public array $publicNames;

    ...
}
```

You now have two endpoints that allow you to create and fetch an AttributeGroup, and the format looks like this:

```json
{
  "attributeGroupId": 1,
  "names": {
    "en-US": "Size",
    "fr-FR": "Taille"
  },
  "publicNames": {
    "en-US": "Size",
    "fr-FR": "Taille"
  },
  "type": "select",
  "shopIds": [
    1
  ]
}
```

### 2. Update and delete a single resource

For update and delete endpoints the principle is similar, we are creating a `DELETE` and `PATCH` endpoint:
- to update the AttributeGroup, we will use the `EditAttributeGroupCommand` mapped with a `CQRSPartialUpdate` operation, it requires a scope `attribute_group_write` to be used
  - the `CQRSPartialUpdate` is used for `PATCH` requests that can update the entity partially, in opposition with a `PUT` request that updates the whole entity so the full JSON must be provided at each time
  - if you want to create a `PUT` request use the `CQRSUpdate` instead
  - to know which HTTP method you should use you will need to check the implementation of the CQRS commands to see if it allows optional values
- to delete the AttributeGroup, we will use the `DeleteAttributeGroupCommand` mapped with a `CQRSDelete` operation, it requires a scope `attribute_group_write` to be used

{{% notice info %}}
**HTTP Methods per ADR**:
- `PATCH` for partial updates → use `CQRSPartialUpdate`
- `PUT` for full updates → use `CQRSUpdate`
- `DELETE` for deletions → use `CQRSDelete`
{{% /notice %}}

```php
...
use PrestaShopBundle\ApiPlatform\Metadata\CQRSPartialUpdate;
use PrestaShopBundle\ApiPlatform\Metadata\CQRSDelete;
...

#[ApiResource(
    operations: [
        ...
        new CQRSPartialUpdate(
            uriTemplate: '/attributes/group/{attributeGroupId}',
            CQRSCommand: EditAttributeGroupCommand::class,
            CQRSQuery: GetAttributeGroupForEditing::class,
            scopes: [
                'attribute_group_write',
            ],
            CQRSQueryMapping: self::QUERY_MAPPING,
            CQRSCommandMapping: self::COMMAND_MAPPING,
        ),
        new CQRSDelete(
            uriTemplate: '/attributes/group/{attributeGroupId}',
            CQRSCommand: DeleteAttributeGroupCommand::class,
            scopes: [
                'attribute_group_write',
            ],
        ),
    ],
)]
class AttributeGroup
{
    ...
}
```

### 3. Bulk deletion

For bulk action we create a new dedicated resource with only one array field `$attributeGroupIds`, create the file `src/ApiPlatform/Resources/Attribute/BulkAttributeGroups.php`:

{{% notice warning %}}
**ADR Bulk Operations Convention**:
- Use `bulk-` prefix for the action in the URI (e.g., `/attributes/groups/delete`, not `/attributes/groups/bulk-delete`)
- Use plural domain name + "Ids" for parameter names (e.g., `attributeGroupIds`)
- The example uses `PUT` method, but you could also use `DELETE` method depending on the operation
{{% /notice %}}

```php
<?php
declare(strict_types=1);

namespace PrestaShop\Module\APIResources\ApiPlatform\Resources\Attribute;

use ApiPlatform\Metadata\ApiProperty;
use ApiPlatform\Metadata\ApiResource;
use PrestaShop\PrestaShop\Core\Domain\AttributeGroup\Command\BulkDeleteAttributeGroupCommand;
use PrestaShop\PrestaShop\Core\Domain\AttributeGroup\Exception\AttributeGroupNotFoundException;
use PrestaShopBundle\ApiPlatform\Metadata\CQRSDelete;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\Constraints as Assert;

#[ApiResource(
    operations: [
        new CQRSDelete(
            uriTemplate: '/attributes/groups/bulk-delete',
            CQRSCommand: BulkDeleteAttributeGroupCommand::class,
            scopes: [
                'attribute_group_write',
            ],
            allowEmptyBody: false,
        ),
    ],
    exceptionToStatus: [
        AttributeGroupNotFoundException::class => Response::HTTP_NOT_FOUND,
    ],
)]
class BulkAttributeGroups
{
    /**
     * @var int[]
     */
    #[ApiProperty(openapiContext: ['type' => 'array', 'items' => ['type' => 'integer'], 'example' => [1, 3]])]
    #[Assert\NotBlank]
    public array $attributeGroupIds;
}
```

### 4. Errors and validation

#### Exception returned

The CQRS layer include some internal check and validation that ensures the consistency of the domain, when an error or a constraint is detected it throws an exception. But such exception is displayed automatically by API Platform and returned as a server error with a 500 HTTP code, whereas depending on the exception there is no problem the API does exactly what it's supposed to but the HTTP code is not adapted.

To adapt such cases API Platform allows defining a mapping between an exception and an HTTP code, CQRS handlers usually follow a naming convention so you should be able to find the proper exception easily, for example:
- `{Domain}NotFoundException` is triggered when we try to access or modify an entity that doesn't exist in the database, it should match a 404 Not Found code
- `{Domain}ConstraintException` is triggered when the data used for creation or udpate is not valid with the domain rules and constraints, it should match with a 422 Unprocessable Entity code

The mapping can be defined on the API resource with the `exceptionToStatus`:

```php

...
use PrestaShop\PrestaShop\Core\Domain\AttributeGroup\Exception\AttributeGroupConstraintException;
use PrestaShop\PrestaShop\Core\Domain\AttributeGroup\Exception\AttributeGroupNotFoundException;
use Symfony\Component\HttpFoundation\Response;
...

#[ApiResource(
    operations: [
        ...
    ],
    exceptionToStatus: [
        AttributeGroupConstraintException::class => Response::HTTP_UNPROCESSABLE_ENTITY,
        AttributeGroupNotFoundException::class => Response::HTTP_NOT_FOUND,
    ],
)]
class AttributeGroup
{
    ...
}
```

#### API Resource validation

The exception mapping is convenient to get proper HTTP code, with it's not ideal regarding the data validation. Luckily API Platform includes data validation in their internal process (based on the Symfony validator), to do that you can use `Constraints` attributes on each field (like you may have done on Doctrine entities).
You can also use validation groups, which is very convenient when your constraint are different on creation and on update for example (especially when you handle partial update). You can find more about validation:
- on the [Symfony documentation](https://symfony.com/doc/6.4/validation.html)
- on the [API Platform documentation](https://api-platform.com/docs/symfony/validation/)

And here is an example with our `AttributeGroup` example that now includes validation:

```php
...
use PrestaShop\PrestaShop\Core\ConstraintValidator\Constraints\DefaultLanguage;
use PrestaShop\PrestaShop\Core\ConstraintValidator\Constraints\TypedRegex;
...
use Symfony\Component\Validator\Constraints as Assert;
...

#[ApiResource(
    operations: [
        ...
        new CQRSCreate(
            uriTemplate: '/attributes/group',
            validationContext: ['groups' => ['Default', 'Create']],
            CQRSCommand: AddAttributeGroupCommand::class,
            CQRSQuery: GetAttributeGroupForEditing::class,
            scopes: [
                'attribute_group_write',
            ],
            CQRSQueryMapping: self::QUERY_MAPPING,
            CQRSCommandMapping: self::COMMAND_MAPPING,
        ),
        new CQRSPartialUpdate(
            uriTemplate: '/attributes/group/{attributeGroupId}',
            validationContext: ['groups' => ['Default', 'Update']],
            CQRSCommand: EditAttributeGroupCommand::class,
            CQRSQuery: GetAttributeGroupForEditing::class,
            scopes: [
                'attribute_group_write',
            ],
            CQRSQueryMapping: self::QUERY_MAPPING,
            CQRSCommandMapping: self::COMMAND_MAPPING,
        ),
        ...
    ],
)]
class AttributeGroup
{
    #[ApiProperty(identifier: true)]
    public int $attributeGroupId;

    #[LocalizedValue]
    #[DefaultLanguage(groups: ['Create'], fieldName: 'names')]
    #[DefaultLanguage(groups: ['Update'], fieldName: 'names', allowNull: true)]
    #[Assert\All(constraints: [
        new TypedRegex([
            'type' => TypedRegex::TYPE_CATALOG_NAME,
        ]),
    ])]
    public array $names;

    #[LocalizedValue]
    #[DefaultLanguage(groups: ['Create'], fieldName: 'publicNames')]
    #[DefaultLanguage(groups: ['Update'], fieldName: 'publicNames', allowNull: true)]
    #[Assert\All(constraints: [
        new TypedRegex([
            'type' => TypedRegex::TYPE_CATALOG_NAME,
        ]),
    ])]
    public array $publicNames;

    #[Assert\Choice(choices: [AttributeGroupType::ATTRIBUTE_GROUP_TYPE_COLOR, AttributeGroupType::ATTRIBUTE_GROUP_TYPE_SELECT, AttributeGroupType::ATTRIBUTE_GROUP_TYPE_RADIO])]
    public string $type;

    #[ApiProperty(openapiContext: ['type' => 'array', 'items' => ['type' => 'integer'], 'example' => [1, 3]])]
    #[Assert\NotBlank(allowNull: true)]
    public array $shopIds;

    public int $position;
    ...
}
```

{{% notice note %}}
When you need to know which constraint apply on your entity you can search for its associated form type which usually already contain some for form inline errors, and you can adapt them on your API resource. In our `AttributeGroup` example this [form type](https://github.com/PrestaShop/PrestaShop/blob/2b035743b75e04a8ca1ea7a9c7212a93f5ed6892/src/PrestaShopBundle/Form/Admin/Sell/Catalog/AttributeGroupType.php) was used for reference.
{{% /notice %}}

### 5. Create the List API Resource (AttributeGroupList.php)

For the listing API we use the Grid component that is used on Symfony migrated pages, so any migrated page should already have the appropriate Grid data factory.

#### How to find the Grid Data factory service name

To find the service name you need to look into the Symfony controller related to the entity you are targeting:
1. Find the `AttributeGroupController` and check which [Grid factory service it relies on](https://github.com/PrestaShop/PrestaShop/blob/c5102424bc44c8fabbdfa1477bbb275fd75d4efe/src/PrestaShopBundle/Controller/Admin/Sell/Catalog/AttributeGroupController.php#L66)
2. In our case it is `prestashop.core.grid.factory.attribute_group` now we need to search for its service definition
3. In this service definition you can find the associated [Grid Data factory service](https://github.com/PrestaShop/PrestaShop/blob/f3d3a87a16e8bb36df151727f2f135ae2fd8dfb1/src/PrestaShopBundle/Resources/config/services/core/grid/grid_factory.yml#L327)
4. In our case `prestashop.core.grid.data.factory.attribute_group_decorator` is the **Grid data factory service name that we'll need** to configure our endpoint
5. You can check that [this service](https://github.com/PrestaShop/PrestaShop/blob/f3d3a87a16e8bb36df151727f2f135ae2fd8dfb1/src/PrestaShopBundle/Resources/config/services/core/grid/grid_data_factory.yml#L416) is based on the [AttributeGroupGridDataFactory](https://github.com/PrestaShop/PrestaShop/blob/a5d084be8476afc856e9306db7a9b4e94836a252/src/Core/Grid/Data/Factory/AttributeGroupGridDataFactory.php#L36) that implements the `GridDataFactoryInterface`

#### Extra information on internal services

- From the factory [service definition](https://github.com/PrestaShop/PrestaShop/blob/653e2a8a86f6df52e33f7b126f777d7400974872/src/PrestaShopBundle/Resources/config/services/core/grid/grid_factory.yml#L318) you can also deduce [Grid definition service](https://github.com/PrestaShop/PrestaShop/blob/29af08841c8bb66bc552b1339c8d594c1d9b7ef8/src/Core/Grid/Definition/Factory/AttributeGroupGridDefinitionFactory.php#L50) which can help you understand which [filters](https://github.com/PrestaShop/PrestaShop/blob/29af08841c8bb66bc552b1339c8d594c1d9b7ef8/src/Core/Grid/Definition/Factory/AttributeGroupGridDefinitionFactory.php#L181) are usable on this endpoint.
- In this special case, for AttributeGroup, the factory decorates another one [`prestashop.core.grid.data.factory.attribute_group`](https://github.com/PrestaShop/PrestaShop/blob/653e2a8a86f6df52e33f7b126f777d7400974872/src/PrestaShopBundle/Resources/config/services/core/grid/grid_data_factory.yml#L400), if you check its definition you will see that is uses the `prestashop.core.grid.query_builder.attribute_group`
- From there you can find the `prestashop.core.grid.query_builder.attribute_group` service which is the [Query builder](https://github.com/PrestaShop/PrestaShop/blob/6b28c32d9355a2e99f42f50ee302a95ca2cb32ea/src/Core/Grid/Query/AttributeGroupQueryBuilder.php#L37) that builds the SQL query

#### Create the AttributeGroupList API resource

Now you can create the file `src/ApiPlatform/Resources/Attribute/AttributeGroupList.php`, we usually use another API resource class for the listing because the returned data is usually smaller than on the single point:
- to list the AttributeGroups we use the `prestashop.core.grid.data.factory.attribute_group_decorator` service mapped with a `PaginatedList` operation

```php
<?php
declare(strict_types=1);

namespace PrestaShop\Module\APIResources\ApiPlatform\Resources\Attribute;

use ApiPlatform\Metadata\ApiProperty;
use ApiPlatform\Metadata\ApiResource;
use PrestaShopBundle\ApiPlatform\Metadata\PaginatedList;

#[ApiResource(
    operations: [
        new PaginatedList(
            uriTemplate: '/attributes/groups',
            scopes: [
                'attribute_group_read',
            ],
            ApiResourceMapping: self::MAPPING,
            gridDataFactory: 'prestashop.core.grid.data.factory.attribute_group_decorator',
            filtersMapping: [
                '[attributeGroupId]' => '[id_attribute_group]',
            ],
        ),
    ]
)]
class AttributeGroupList
{
    #[ApiProperty(identifier: true)]
    public int $attributeGroupId;

    public string $name;

    public int $values;

    public int $position;

    public const MAPPING = [
        '[id_attribute_group]' => '[attributeGroupId]',
    ];
}
```

Note that here we also use two different mappings:
- `ApiResourceMapping` to map the grid data (usually in snake case from the DB) into our API resource (usually in camel case)
- `filtersMapping` to map the filters and order parameter in the request, this allows us using `orderBy=attributeGroupId` (consistent with our API contract), instead of `orderBy=id_attribute_group` (DB format expected by the Grid data factory)

This API returns a paginated list which base format is consistent with all other APIs (of course the item themselves vary):

```json
{
  "totalItems": 4,
  "sortOrder": "asc",
  "limit": 50,
  "filters": [],
  "items": [
    {
      "attributeGroupId": 1,
      "name": "Size",
      "values": 4,
      "position": 0
    },
    {
      "attributeGroupId": 2,
      "name": "Color",
      "values": 14,
      "position": 1
    },
    {
      "attributeGroupId": 3,
      "name": "Dimension",
      "values": 3,
      "position": 2
    },
    {
      "attributeGroupId": 4,
      "name": "Paper Type",
      "values": 4,
      "position": 3
    }
  ]
}
```

## 🧪 PHPUnit Testing Strategy

{{% notice warning %}}
**Critical Testing Requirements** (enforced by CI):

1. **Full Data Assertions**: Tests MUST assert the complete response data, not individual fields
   - ✅ Good: `$this->assertEquals(['id' => 1, 'name' => 'Test', 'enabled' => true], $response);`
   - ❌ Bad: `$this->assertEquals(1, $response['id']); $this->assertEquals('Test', $response['name']);`

2. **Skip Null Values**: Always use `'skip_null_values' => false` in test assertions
   - This will be enforced globally via core configuration (no need to add everywhere)
   - Ensures all fields are returned and tested, even when null

3. **Integration Tests Are Sufficient**: With accurate full-data assertions, manual QA can often be avoided
   - Tests must cover all CRUD operations
   - Tests must verify complete API contract
{{% /notice %}}

### Test Configuration and Setup

To run the tests locally you can clone the module repository, and you can run the tests from its root folder

{{% notice note %}}
The following step sets-up an environment to run the tests, it needs a working database to install all the default fixtures, and of course persist the data that will be read/written by the API.
Keep in mind that the default fixtures are inserted in the database (like for our other integration tests), so you already have a few products, categories and so on inside it.
{{% /notice %}}

#### Module only

To run the test the module needs a PrestaShop core base to be executed into, we provide some tools to install a shop in a `/tmp` folder

```bash
composer install
# Setup your tests in local, it will:
# - clone the repository
# - build the assets
# - install a shop with fixtures data (a working DB is needed), you can edit your DB access in the parameters.php.dist file (or in parameters.php once you have installed your local env)
composer setup-local-tests
```

If the DB setting is not adapted to your environment, you can modify them in the `tests/local-parameters/parameters.yml` and `tests/local-parameters/parameters.php` files.

```bash
# To test with your parameters
composer setup-local-tests -- --update-local-parameters
```

By default, the branch clone is the `develop` branch, in case you want to use another one you can use additional parameters:

```bash
# To test with 9.0.x branch
composer setup-local-tests -- --force --core-branch=9.0.x

# To test with a branch from your fork (in this example fork: jolelievre branch: product-api)
composer setup-local-tests -- --force --core-branch=jolelievre:product-api
```

To run the full suite of tests you can use this command:
```bash
composer run-module-tests
```

When you need to run one test class specifically (convenient while developing) you can run this command:

```bash
# Only run tests for AttributeGroupEndpointTest
php -d date.timezone=UTC ./vendor/bin/phpunit -c tests/Integration/phpunit-local.xml --filter=AttributeGroupEndpointTest
```

*Note* When you modify the API resource some part may be cached and are not updated, the you don't understand why your tests are failing, in those cases you can try and clear the cache:

```bash
composer clear-test-cache
```

#### Run tests from the core

You'll need a clone of the PrestaShop repository with a working dev environment (not described here).
By default, you already have the `ps_apiresources` module in your `modules` folder, but if you plan on contributing on the module you should remove the initial folder (installed by composer) and clone the [module repository](https://github.com/PrestaShop/ps_apiresources) in the `modules` folder. This way you can create branches, commits and push to your fork.

We don't recommend using symbolic links as it will create some errors, the module folder must really be in the `modules` folder.

Then you can use the composer command:

```bash
# This command performs several tasks
# - prepare the test DB
# - prepare the autoloader of the module
# - runs the integration tests from the module
composer api-module-tests
```

When you need to run one test class specifically (convenient while developing) you can run this command:
```bash
# Only run tests for AttributeGroupEndpointTest
php -d date.timezone=UTC ./vendor/phpunit/phpunit/phpunit -c modules/ps_apiresources/tests/Integration/phpunit-ci.xml --filter=AttributeGroupEndpointTest
```

### Integration Tests

Integration tests **must** test the actual API endpoints and their behavior with the PrestaShop system. To help build them we created a base class `PsApiResourcesTest\Integration\ApiPlatform\ApiTestCase` the provides some helper methods:

| Method name         | Action                                                                                            | Parameters                                                                                                                                                                                                                                                                                                                                                                            |
|---------------------|---------------------------------------------------------------------------------------------------|---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `getItem`           | Performs a `GET` request, by default check that a 200 code is returned and parse JSON response    | `string $endpointUrl`: URL of the API endpoint<br>`array $scopes = []`: List of scopes to use in the token<br>`?int $expectedHttpCode = null` HTTP code expected after request, default value is deducted automatically<br>`?array $requestOptions = null` Additional options for the request (special headers, extra parameters)                                                     |
| `createItem`        | Performs a `POST` request, by default checks that a 201 code is returned and parse JSON response  | `string $endpointUrl`: URL of the API endpoint<br>`array $data` Data of the created entity<br>`array $scopes = []`: List of scopes to use in the token<br>`?int $expectedHttpCode = null` HTTP code expected after request, default value is deducted automatically<br>`?array $requestOptions = null` Additional options for the request (special headers, extra parameters)         |
| `updateItem`        | Performs a `PUT` request, by default checks that a 200 code is returned and parse JSON response   | `string $endpointUrl`: URL of the API endpoint<br>`array $data` Full data of the updated entity<br>`array $scopes = []`: List of scopes to use in the token<br>`?int $expectedHttpCode = null` HTTP code expected after request, default value is deducted automatically<br>`?array $requestOptions = null` Additional options for the request (special headers, extra parameters)    |
| `partialUpdateItem` | Performs a `PATCH` request, by default check that a 200 code is returned and parse JSON response  | `string $endpointUrl`: URL of the API endpoint<br>`array $data` Partial data of the updated entity<br>`array $scopes = []`: List of scopes to use in the token<br>`?int $expectedHttpCode = null` HTTP code expected after request, default value is deducted automatically<br>`?array $requestOptions = null` Additional options for the request (special headers, extra parameters) |
| `deleteItem`        | Performs a `DELETE` request, by default check that a 204 code is returned and response is empty   | `string $endpointUrl`: URL of the API endpoint<br>`array $scopes = []`: List of scopes to use in the token<br>`?int $expectedHttpCode = null` HTTP code expected after request, default value is deducted automatically<br>`?array $requestOptions = null` Additional options for the request (special headers, extra parameters)                                                     |
| `listItems`         | Performs a `GET` request to list entities, parse the JSON response and check the paginated format | `string $listUrl`: URL of the API endpoint<br>`array $scopes = []`: List of scopes to use in the token<br>`array $filters = []` List of filters                                                                                                                                                                                                                                       |
| `countItems`        | Performs a `GET` request to list entities, but only returns the count                             | `string $listUrl`: URL of the API endpoint<br>`array $scopes = []`: List of scopes to use in the token<br>`array $filters = []` List of filters                                                                                                                                                                                                                                       |

These helper methods make testing easier because they handle internally the creation of an `APIClient` with the required scopes, then they request an access token with the scopes and automatically include it in the header of the request, they also perform basic check and decode the JSON response.

You will also have to implement the abstract `getProtectedEndpoints` method (see below), it returns the list of endpoints protected via scopes (with the associated HTTP method), the class will automatically loop through them try to access them with a bearer token but without the required scopes, and it excepts to have a 401 response.
It ensures that you didn't forget to setup the appropriate scopes, adn that they will not be removed by mistake in the future.

### CRUD Integration Test

Create `tests/Integration/ApiPlatform/Resources/AttributeGroupEndpointTest.php`:

```php
<?php
declare(strict_types=1);

namespace PsApiResourcesTest\Integration\ApiPlatform;

use Symfony\Component\HttpFoundation\Response;
use Tests\Resources\DatabaseDump;
use Tests\Resources\Resetter\LanguageResetter;

class AttributeGroupEndpointTest extends ApiTestCase
{
    public static function setUpBeforeClass(): void
    {
        parent::setUpBeforeClass();
        // Add the fr-FR language to test multi lang values accurately
        LanguageResetter::resetLanguages();
        self::addLanguageByLocale('fr-FR');
        self::resetTables();
        // Pre-create the API Client with the needed scopes, this way we reduce the number of created API Clients
        self::createApiClient(['attribute_group_write', 'attribute_group_read']);
    }

    public static function tearDownAfterClass(): void
    {
        parent::tearDownAfterClass();
        // Reset DB as it was before this test
        LanguageResetter::resetLanguages();
        self::resetTables();
    }

    protected static function resetTables(): void
    {
        DatabaseDump::restoreTables([
            'attribute_group',
            'attribute_group_lang',
            'attribute_group_shop',
        ]);
    }

    public function getProtectedEndpoints(): iterable
    {
        yield 'get endpoint' => [
            'GET',
            '/attributes/group/1',
        ];

        yield 'create endpoint' => [
            'POST',
            '/attributes/group',
        ];

        yield 'patch endpoint' => [
            'PATCH',
            '/attributes/group/1',
        ];

        yield 'delete endpoint' => [
            'DELETE',
            '/attributes/group/1',
        ];

        yield 'list endpoint' => [
            'GET',
            '/attributes/groups',
        ];

        yield 'bulk delete endpoint' => [
            'PUT',
            '/attributes/groups/delete',
        ];
    }

    public function testAddAttributeGroup(): int
    {
        $itemsCount = $this->countItems('/attributes/groups', ['attribute_group_read']);

        $postData = [
            'names' => [
                'en-US' => 'name en',
                'fr-FR' => 'name fr',
            ],
            'publicNames' => [
                'en-US' => 'public name en',
                'fr-FR' => 'public name fr',
            ],
            'type' => 'select',
            'shopIds' => [1],
        ];

        // Create an attribute group, the POST endpoint returns the created item as JSON
        $attributeGroup = $this->createItem('/attributes/group', $postData, ['attribute_group_write']);
        $this->assertArrayHasKey('attributeGroupId', $attributeGroup);
        $attributeGroupId = $attributeGroup['attributeGroupId'];

        // IMPORTANT: Assert the FULL response data, not individual fields (CI requirement)
        // This ensures the complete API contract is tested
        $this->assertEquals(
            ['attributeGroupId' => $attributeGroupId] + $postData,
            $attributeGroup
        );

        $newItemsCount = $this->countItems('/attributes/groups', ['attribute_group_read']);
        $this->assertEquals($itemsCount + 1, $newItemsCount);

        return $attributeGroupId;
    }

    /**
     * @depends testAddAttributeGroup
     *
     * @param int $attributeGroupId
     *
     * @return int
     */
    public function testGetAttributeGroup(int $attributeGroupId): int
    {
        $attributeGroup = $this->getItem('/attributes/group/' . $attributeGroupId, ['attribute_group_read']);
        $this->assertEquals([
            'attributeGroupId' => $attributeGroupId,
            'names' => [
                'en-US' => 'name en',
                'fr-FR' => 'name fr',
            ],
            'publicNames' => [
                'en-US' => 'public name en',
                'fr-FR' => 'public name fr',
            ],
            'type' => 'select',
            'shopIds' => [1],
        ], $attributeGroup);

        return $attributeGroupId;
    }

    /**
     * @depends testGetAttributeGroup
     *
     * @param int $attributeGroupId
     *
     * @return int
     */
    public function testPartialUpdateAttributeGroup(int $attributeGroupId): int
    {
        $patchData = [
            'names' => [
                'en-US' => 'updated name en',
                'fr-FR' => 'updated name fr',
            ],
            'publicNames' => [
                'en-US' => 'updated public name en',
                'fr-FR' => 'updated public name fr',
            ],
            'type' => 'radio',
            'shopIds' => [1],
        ];

        $updatedAttributeGroup = $this->partialUpdateItem('/attributes/group/' . $attributeGroupId, $patchData, ['attribute_group_write']);
        $this->assertEquals(['attributeGroupId' => $attributeGroupId] + $patchData, $updatedAttributeGroup);

        // We check that when we GET the item it is updated as expected
        $attributeGroup = $this->getItem('/attributes/group/' . $attributeGroupId, ['attribute_group_read']);
        $this->assertEquals(['attributeGroupId' => $attributeGroupId] + $patchData, $attributeGroup);

        // Test partial update
        $partialUpdateData = [
            'names' => [
                'fr-FR' => 'updated nom fr',
            ],
            'publicNames' => [
                'en-US' => 'updated public nom en',
            ],
        ];
        $expectedUpdatedData = [
            'attributeGroupId' => $attributeGroupId,
            'names' => [
                'en-US' => 'updated name en',
                'fr-FR' => 'updated nom fr',
            ],
            'publicNames' => [
                'en-US' => 'updated public nom en',
                'fr-FR' => 'updated public name fr',
            ],
            'type' => 'radio',
            'shopIds' => [1],
        ];
        $updatedAttributeGroup = $this->partialUpdateItem('/attributes/group/' . $attributeGroupId, $partialUpdateData, ['attribute_group_write']);
        $this->assertEquals($expectedUpdatedData, $updatedAttributeGroup);

        return $attributeGroupId;
    }

    /**
     * @depends testPartialUpdateAttributeGroup
     *
     * @param int $attributeGroupId
     *
     * @return int
     */
    public function testListAttributeGroups(int $attributeGroupId): int
    {
        // List by attributeGroupId in descending order so the created one comes first (and test ordering at the same time)
        $paginatedAttributeGroups = $this->listItems('/attributes/groups?orderBy=attributeGroupId&sortOrder=desc', ['attribute_group_read']);
        $this->assertGreaterThanOrEqual(1, $paginatedAttributeGroups['totalItems']);

        // Check the details to make sure filters mapping is correct
        $this->assertEquals('attributeGroupId', $paginatedAttributeGroups['orderBy']);

        // Test attribute should be the first returned in the list
        $testAttributeGroup = $paginatedAttributeGroups['items'][0];

        // Position should be at least 3 since there are three groups in the default fixtures data
        $this->assertGreaterThanOrEqual(3, $testAttributeGroup['position']);
        $position = $testAttributeGroup['position'];
        $expectedAttributeGroup = [
            'attributeGroupId' => $attributeGroupId,
            'name' => 'updated name en',
            'values' => 0,
            'position' => $position,
        ];
        $this->assertEquals($expectedAttributeGroup, $testAttributeGroup);

        $filteredAttributeGroups = $this->listItems('/attributes/groups', ['attribute_group_read'], [
            'attributeGroupId' => $attributeGroupId,
        ]);
        $this->assertEquals(1, $filteredAttributeGroups['totalItems']);

        $testAttributeGroup = $filteredAttributeGroups['items'][0];
        $this->assertEquals($expectedAttributeGroup, $testAttributeGroup);

        // Check the filters details
        $this->assertEquals([
            'attributeGroupId' => $attributeGroupId,
        ], $filteredAttributeGroups['filters']);

        return $attributeGroupId;
    }

    /**
     * @depends testListAttributeGroups
     *
     * @param int $attributeGroupId
     */
    public function testRemoveAttributeGroup(int $attributeGroupId): void
    {
        // Delete the item
        $return = $this->deleteItem('/attributes/group/' . $attributeGroupId, ['attribute_group_write']);
        // This endpoint return empty response and 204 HTTP code
        $this->assertNull($return);

        // Getting the item should result in a 404 now
        $this->getItem('/attributes/group/' . $attributeGroupId, ['attribute_group_read'], Response::HTTP_NOT_FOUND);
    }

    public function testBulkRemoveAttributeGroups(): void
    {
        $attributeGroups = $this->listItems('/attributes/groups', ['attribute_group_read']);

        // There are four attribute groups in default fixtures
        $this->assertEquals(4, $attributeGroups['totalItems']);

        // We remove the first two attribute groups
        $removeAttributeGroupIds = [
            $attributeGroups['items'][0]['attributeGroupId'],
            $attributeGroups['items'][2]['attributeGroupId'],
        ];

        $this->updateItem('/attributes/groups/delete', [
            'attributeGroupIds' => $removeAttributeGroupIds,
        ], ['attribute_group_write'], Response::HTTP_NO_CONTENT);

        // Assert the provided attribute groups have been removed
        foreach ($removeAttributeGroupIds as $attributeGroupId) {
            $this->getItem('/attributes/group/' . $attributeGroupId, ['attribute_group_read'], Response::HTTP_NOT_FOUND);
        }

        // Only two attribute group remain
        $this->assertEquals(2, $this->countItems('/attributes/groups', ['attribute_group_read']));
    }

    public function testInvalidAttributeGroup(): void
    {
        $attributeGroupInvalidData = [
            'names' => [
                // en-US (default language) value is missing
                // < character is forbidden
                'fr-FR' => 'name fr<',
            ],
            'publicNames' => [
                // en-US (default language) value is missing
                // < character is forbidden
                'fr-FR' => 'public name fr<',
            ],
            // Type is not in the expected choices
            'type' => 'random',
            // ShopId must not be empty
            'shopIds' => [],
        ];

        // Creating with invalid data should return a response with invalid constraint messages and use an http code 422
        $validationErrorsResponse = $this->createItem('/attributes/group', $attributeGroupInvalidData, ['attribute_group_write'], Response::HTTP_UNPROCESSABLE_ENTITY);
        $this->assertIsArray($validationErrorsResponse);
        $this->assertValidationErrors([
            [
                'propertyPath' => 'names',
                'message' => 'The field names is required at least in your default language.',
            ],
            [
                'propertyPath' => 'names[fr-FR]',
                'message' => '"name fr<" is invalid',
            ],
            [
                'propertyPath' => 'publicNames',
                'message' => 'The field publicNames is required at least in your default language.',
            ],
            [
                'propertyPath' => 'publicNames[fr-FR]',
                'message' => '"public name fr<" is invalid',
            ],
            [
                'propertyPath' => 'type',
                'message' => 'The value you selected is not a valid choice.',
            ],
            [
                'propertyPath' => 'shopIds',
                'message' => 'This value should not be blank.',
            ],
        ], $validationErrorsResponse);

        // Now create a valid attribute group to test the validation on PATCH request
        $validAttributeGroup = $this->createItem('/attributes/group', [
            'names' => [
                'en-US' => 'name en',
                'fr-FR' => 'name fr',
            ],
            'publicNames' => [
                'en-US' => 'name en',
                'fr-FR' => 'name fr',
            ],
            'type' => 'select',
            'shopIds' => [1],
        ], ['attribute_group_write']);

        $attributeGroupId = $validAttributeGroup['attributeGroupId'];
        $invalidUpdateData = [
            // Only the provided data is validated (we only get one invalid error)
            [
                'data' => [
                    'names' => [
                        'en-US' => 'name en<',
                    ],
                ],
                'expectedErrors' => [
                    [
                        'propertyPath' => 'names[en-US]',
                        'message' => '"name en<" is invalid',
                    ],
                ],
            ],
            // We can partially update only one language, the DefaultLanguage constraint doesn't block because en-US is not specified
            [
                'data' => [
                    'names' => [
                        'fr-FR' => 'name fr<',
                    ],
                ],
                'expectedErrors' => [
                    [
                        'propertyPath' => 'names[fr-FR]',
                        'message' => '"name fr<" is invalid',
                    ],
                ],
            ],
            // However trying to force empty value is forbidden
            [
                'data' => [
                    'names' => [
                        'en-US' => '',
                    ],
                ],
                'expectedErrors' => [
                    [
                        'propertyPath' => 'names',
                        'message' => 'The field names is required at least in your default language.',
                    ],
                ],
            ],
            // SAme for publicNames
            [
                'data' => [
                    'publicNames' => [
                        'en-US' => '',
                    ],
                ],
                'expectedErrors' => [
                    [
                        'propertyPath' => 'publicNames',
                        'message' => 'The field publicNames is required at least in your default language.',
                    ],
                ],
            ],
            [
                'data' => [
                    'shopIds' => [
                    ],
                ],
                'expectedErrors' => [
                    [
                        'propertyPath' => 'shopIds',
                        'message' => 'This value should not be blank.',
                    ],
                ],
            ],
            [
                'data' => [
                    'type' => 'toto',
                ],
                'expectedErrors' => [
                    [
                        'propertyPath' => 'type',
                        'message' => 'The value you selected is not a valid choice.',
                    ],
                ],
            ],
        ];
        foreach ($invalidUpdateData as $updateData) {
            $validationErrorsResponse = $this->partialUpdateItem('/attributes/group/' . $attributeGroupId, $updateData['data'], ['attribute_group_write'], Response::HTTP_UNPROCESSABLE_ENTITY);
            $this->assertValidationErrors($updateData['expectedErrors'], $validationErrorsResponse);
        }
    }
}
```

## 🔍 Key Points to Remember

### Naming Conventions
- **camelCase** for API Resource properties
- **snake_case** for database mapping and scope names
- **PascalCase** for class names
- **kebab-case** for compound URI actions (e.g., `/assign-to-category`)

### Data Mapping
- `ApiResourceMapping`: transforms DB data to API format
- `filtersMapping`: transforms API filters to grid format
- `CQRSQueryMapping`: for CQRS queries
- `CQRSCommandMapping`: for CQRS commands
- **Use internal mapping attributes** (NOT `SerializedName`)

### Security Scopes (per ADR)
- Use **singular** entity name + action: `{entity}_read` or `{entity}_write`
- Examples: `attribute_group_read`, `attribute_group_write`, `order_read`, `order_write`
- Format: **snake_case**

### URI Templates (per ADR)
- Use **plural form** for base URIs (e.g., `/hooks`, `/products`)
- Use domain name + "Id" suffix for identifiers (e.g., `hookId`, `productId`)
- Follow REST conventions:
    - `GET /resources/{resourceId}`: retrieve single item
    - `GET /resources`: list items
    - `POST /resources`: create item
    - `PUT /resources/{resourceId}`: full update
    - `PATCH /resources/{resourceId}`: partial update
    - `DELETE /resources/{resourceId}`: delete item
    - `POST /resources/{resourceId}/duplicate`: duplicate item
    - `DELETE /resources/bulk-delete`: bulk operations (with `resourceIds` in body)

### API Resource Properties (per ADR)
- **All fields must be strictly typed**
- **Only scalar types and arrays allowed** - NO Value Objects (VOs)
- **Localized properties**: Use `$names` (not `$localizedNames`) with `#[LocalizedValue]` attribute
- **Boolean fields**: Use `$ready` (not `$isReady`)
- **Status field**: Always use `$enabled` (not `$active`, `$enable`, etc.)
- **Document array fields** with `#[ApiProperty(openapiContext: ...)]`

### Forbidden Practices (CI-Enforced)
- ❌ **NO custom normalizers** - use mapping instead
- ❌ **NO custom processors** - core processors are sufficient
- ❌ **NO Value Objects in API Resources** - only scalars and arrays
- ❌ **NO field-by-field assertions** - test full response data

### Testing Requirements (CI-Enforced)
- ✅ **Assert complete response data** in one call
- ✅ **Test all CRUD operations** comprehensively
- ✅ **Use `skip_null_values => false`** for accurate validation
- ✅ **Integration tests should eliminate need for manual QA**

## 📚 Useful Resources

- **[CQRS API Guidelines ADR](https://github.com/PrestaShop/ADR/blob/master/0023-cqrs-api-guidelines.md)** ⭐ **Required reading** - Architecture Decision Record defining all API conventions
- [PrestaShop API Resources Documentation]({{< relref "/9/admin-api/resource_server/api-resources">}})
- [API Platform Documentation](https://api-platform.com/docs/)
- [PHPUnit Documentation](https://phpunit.de/documentation.html)
- [CQRS Pattern](https://martinfowler.com/bliki/CQRS.html)
- [PrestaShop Contributing Guidelines]({{< relref "/9/contribute">}})
- [Symfony Testing Best Practices](https://symfony.com/doc/6.4/testing.html)

## 🎉 Conclusion

Following this guide will help you create a comprehensive PR for adding API endpoints to PrestaShop with proper test coverage. Remember to:

1. **Follow the [CQRS API Guidelines ADR](https://github.com/PrestaShop/ADR/blob/master/0023-cqrs-api-guidelines.md)** - this is mandatory
2. **Follow PrestaShop coding standards** and API Resource property rules
3. **Write comprehensive tests** with full data assertions
4. **Avoid forbidden practices**:
   - No custom normalizers (use mapping)
   - No custom processors (core handles this)
   - No Value Objects in API Resources (only scalars and arrays)
5. **Ensure CI checks pass** - automated checks will block PRs that violate these rules
6. **Document your changes properly** (especially array fields for OpenAPI)
7. **Follow the team's review process**

{{% notice tip %}}
With proper full-data integration tests, your contribution should require minimal to no manual QA, accelerating the review process!
{{% /notice %}}

Good luck with your contribution! 🚀
