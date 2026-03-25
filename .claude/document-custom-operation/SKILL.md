Generate developer documentation for a PrestaShop Admin API custom operation class.

**Arguments:** `$0` = operation name, `$1` = PrestaShop core path

Example invocation arguments: `toggle-exchange-rate-automatization-command /home/tleone/Dev/prestashop-develop`

## Task

You are writing documentation for the PrestaShop devdocs site (https://devdocs.prestashop-project.org/9/admin-api/resource_server/api-resources/). The target page is `admin-api/resource_server/api-resources.md` in this repository. Your output will be a new section to add to that file for operation `$0`.

## Steps

### 1. Read the operation class

The PrestaShop core source is at `$1`. Find operation `$0` in `src/PrestaShopBundle/ApiPlatform/Metadata/`. Read it fully to understand:
- What it extends and what interfaces it implements
- Its constructor parameters (especially the custom ones beyond standard API Platform params)
- How it stores extra properties and what defaults it sets
- What provider/processor it enforces

### 2. Find real-world usages

Search for usages of the operation in `modules/ps_apiresources/src/` and `src/PrestaShopBundle/ApiPlatform/Resources/` inside the core repo. Pick 1–2 representative examples that cover the most important parameters.

### 3. Study the existing documentation format

Read `admin-api/resource_server/api-resources.md` in this repository to understand the current format and where the new section should be inserted (after the last existing CQRS operation section, before `## PaginatedList`).

Each custom operation follows this structure:

```
### OperationName

| HTTP Method | Action |
|---|---|
| METHOD | one-line description |

Brief paragraph explaining what the operation does and when to use it over alternatives.

```php
// full realistic example based on actual usages
```

Behavioral notes about provider/processor, response shape, caveats.

#### Custom parameters

| Parameter | Type | Required | Default | Description |
|---|---|---|---|---|
| `paramName` | `string` | Yes | — | What it does |
```

### 4. Generate the documentation section

Write a documentation section for the operation following the format above. The section must include:

- **Header**: `### OperationName`
- **HTTP method table**
- **Description paragraph**: what problem it solves, when to use it over alternatives
- **PHP code example**: realistic, based on actual usages found in step 2, showing the most important parameters with full namespace/use declarations and class body
- **Behavioral notes**: how the provider/processor works, what the response looks like, any important caveats
- **Custom parameters table**: only list parameters that are unique to this operation (not standard API Platform params). Columns: Parameter, Type, Required, Default, Description

Keep the tone consistent with the existing devdoc pages: technical and direct, no marketing language.

### 5. Insert into the file

Insert the generated section into `admin-api/resource_server/api-resources.md` at the correct location. Then confirm the insertion was successful.
