---
title: prestashop:generate:apidoc
category: API & Documentation
description: Generate API documentation in OpenAPI format
weight: 20
---

# prestashop:generate:apidoc

{{< minver v="9.1" title="true" >}}

## Description

This command generates the API documentation in JSON format using API Platform's documentation generator. It produces an OpenAPI specification (formerly known as Swagger) for PrestaShop's REST API.

## Usage

```bash
php bin/console prestashop:generate:apidoc
```

## Output

The command outputs the complete API documentation in JSON format to stdout. The generated documentation includes:

- All API endpoints and their methods
- Request/response schemas
- Authentication requirements
- Parameter definitions
- Data models and relationships

## Example

```bash
$ php bin/console prestashop:generate:apidoc > api-docs.json
```

This saves the API documentation to `api-docs.json` file.

## Output format

The generated JSON follows the OpenAPI 3.1 specification and can be used with tools like:
- Swagger UI
- Postman
- Insomnia
- ReDoc
- API Platform's built-in documentation interface

**Sample output structure:**
```json
{
  "openapi": "3.1.0",
  "info": {
    "title": "Backoffice API",
    "description": "",
    "version": "0.1.0"
  },
  "servers": [
    {
      "url": "/admin-api",
      "description": ""
    }
  ],
  "paths": {
    "/addresses": {
      "get": {
        "operationId": "api_addresses_get_collection",
        "tags": ["Address"],
        "responses": {
          "200": {
            "description": "AddressList collection",
            "content": {
              "application/json": {
                "schema": {
                  "type": "array",
                  "items": {"$ref": "#/components/schemas/AddressList"}
                }
              }
            }
          }
        },
        "summary": "Retrieves the collection of AddressList resources.",
        "parameters": [
          {
            "name": "page",
            "in": "query",
            "description": "The collection page number",
            "required": false
          }
        ]
      }
    }
  },
  "components": {
    "schemas": {},
    "securitySchemes": {
      "oauth": {
        "type": "oauth2",
        "flows": {}
      }
    }
  },
  "security": [{"oauth": []}],
  "tags": [],
  "webhooks": {}
}
```

The output is a single-line JSON (not pretty-printed). The structure includes all registered API endpoints under `/admin-api`.

## Use cases

- Generate API documentation for external consumers
- Create API client libraries using code generators (e.g., OpenAPI Generator)
- Import into API testing tools
- Version control API specifications
- Compare API changes between versions
- Generate static documentation websites
- Integration with CI/CD pipelines

## Integration with API tools

### Swagger UI

View the generated documentation in Swagger UI:

```bash
php bin/console prestashop:generate:apidoc > public/api-docs.json
```

Then access it via Swagger UI at your API Platform documentation endpoint.

### Generating client SDKs

Use the generated documentation with OpenAPI Generator:

```bash
php bin/console prestashop:generate:apidoc > api-spec.json
openapi-generator-cli generate -i api-spec.json -g php -o ./api-client
```

## Related documentation

- [Admin API documentation]({{< relref "/9/admin-api" >}})
- [API Platform documentation](https://api-platform.com/docs/)

## Technical details

- Uses API Platform's `DocumentationAction` to generate the specification
- Generates documentation for all registered API resources
- Includes all configured API endpoints, serialization groups, and validations
- Output format is JSON (OpenAPI 3.0)
