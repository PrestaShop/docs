---
title: Multi-shop context
menuTitle: Multi-shop
weight: 150
---

# Multi-shop context

PrestaShop can run several shops (and shop groups) from a single installation. When the multistore feature is enabled, the Admin API needs to know which shop(s) each request applies to. This page describes how to pass that context, and how the related `shopIds` response field works.

## When multistore is disabled

You don't need to do anything special. The API uses the default shop automatically and no extra parameter is required on any request.

## When multistore is enabled

{{% notice warning %}}
**Feature flag required.** Admin API support for multistore is still considered experimental and is gated behind the `admin_api_multistore` feature flag. Before calling the API in a multistore installation, enable it in the back office under **Advanced Parameters → New & Experimental Features**. Without this flag, the Admin API will not honor the shop context parameters described below.
{{% /notice %}}

Every API request **must** include a shop context parameter. If you don't, the API returns `400 Bad Request` — there is no implicit default shop in multistore mode.

Four parameters are accepted, and exactly one of them should be present per request:

| Parameter     | Type                                     | Description                                                                                              |
|---------------|------------------------------------------|----------------------------------------------------------------------------------------------------------|
| `shopId`      | integer                                  | Target a single specific shop.                                                                           |
| `shopGroupId` | integer                                  | Target every shop in the given shop group.                                                               |
| `shopIds`     | array (or comma-separated string)        | Target a specific set of shops.                                                                          |
| `allShops`    | flag                                     | Target every shop in the installation. The value is ignored; the presence of the parameter is enough.    |

The context can be passed via the query string (any method) or in the JSON body (for `POST`, `PATCH`, `PUT`).

### Query string examples

```bash
# Single shop
curl --location 'http://yourdomain.test/admin-api/contacts/1?shopId=2' \
--header 'Authorization: Bearer YOUR_ACCESS_TOKEN'

# A specific set of shops
curl --location 'http://yourdomain.test/admin-api/contacts/1?shopIds=2,3' \
--header 'Authorization: Bearer YOUR_ACCESS_TOKEN'

# Every shop in a group
curl --location 'http://yourdomain.test/admin-api/contacts/1?shopGroupId=1' \
--header 'Authorization: Bearer YOUR_ACCESS_TOKEN'

# All shops
curl --location 'http://yourdomain.test/admin-api/contacts/1?allShops=1' \
--header 'Authorization: Bearer YOUR_ACCESS_TOKEN'
```

### Request body example

```bash
curl --location --request PATCH 'http://yourdomain.test/admin-api/contacts/1' \
--header 'Content-Type: application/json' \
--header 'Authorization: Bearer YOUR_ACCESS_TOKEN' \
--data '{
    "shopId": 2,
    "name": "Customer service"
}'
```

{{% notice warning %}}
The shop context is enforced for **every** endpoint when multistore is enabled. Forgetting it always returns `400 Bad Request`, even on read operations.
{{% /notice %}}

## Shop association property

Many resources that can belong to one or more shops expose a `shopIds` field in their response body, and accept it on create/update. Examples include contacts, attribute groups, categories, and customer groups.

```json
{
    "contactId": 1,
    "name": "Customer service",
    "shopIds": [1, 2, 3]
}
```

This list represents the shops the entity is associated with — it is **distinct from** the request-level context parameters described above:

- **Request parameters** (`shopId`, `shopGroupId`, `shopIds`, `allShops`) tell the API *which shop(s) the operation runs against*. They live in the query string or request body alongside any other input.
- **`shopIds` body property** is part of the resource itself. On read it tells you which shops the entity belongs to; on create/update it sets that association.

A resource with no concept of shop association simply has no `shopIds` property in its payload.
