---
title: Extra properties
menuTitle: Extra properties
chapter: true
---

# Extra properties {{< minver v="9.2" title="true" >}}

Extra properties let you attach typed fields to existing PrestaShop entities (Product, Category, Customer, Order, Combination, and more) without creating your own tables, overriding core classes or writing persistence code. You declare a field once, and PrestaShop stores it, validates it and exposes it in the Back Office forms and grids, on the Front Office and in the Admin API.

Typical use cases:

- A module needs a "Dangerous product" flag on products, shown in the product form and grid.
- A theme needs a per-language video link or a color per category, read from Smarty templates.
- An ERP integration needs a per-store note on combinations, readable and writable through the Admin API.
- A merchant needs an internal reference on customers, created from the Back Office without any code.

{{% notice info %}}
The extra properties code is marked as `@experimental` in PrestaShop 9.2. This leaves room for a backward compatibility break if there is absolutely no other option. See [Changes in PrestaShop 9.2.x]({{< relref "/9/modules/core-updates/9.2.md" >}}).
{{% /notice %}}

A definition can be owned by a module, registered from its `install()` method, or by the core, created by a merchant from the Back Office:

- [Register extra properties from a module]({{< relref "/9/development/components/extra-properties/register-from-module" >}})
- [Manage extra properties from the Back Office]({{< relref "/9/development/components/extra-properties/register-from-back-office" >}})

The rest of this page describes the behavior shared by both.

## Storage

Extra properties use **column-based storage**: each property is one SQL column, not a row in a generic key/value (EAV) table. Values are typed by the database, can be indexed, and are joined 1:1 with the entity, so grids can filter and sort on them.

### Value tables

PrestaShop creates the value tables the first time a property is registered on an entity, one table per scope. `{entity}` is the physical table of the entity (see [Supported entities](#supported-entities-and-naming)).

| Scope | Table | One value per | Mirrors the primary key of |
|-------|-------|---------------|----------------------------|
| `common` | `{entity}_extra` | entity | `{entity}` |
| `lang` | `{entity}_extra_lang` | entity and language | `{entity}_lang` |
| `shop` | `{entity}_extra_shop` | entity and store | `{entity}_shop` |

Each value table copies the primary key of its base table. For example, `product_extra_lang` has the same primary key as `product_lang` (`id_product`, `id_shop`, `id_lang`), while `contact_extra_lang` only has `id_contact` and `id_lang` because `contact_lang` has no `id_shop` column.

Choose the scope like you would for a native field:

- `common`: a single value shared by all languages and stores, like a product reference.
- `lang`: a translated value, like a product name. The entity must have a `{entity}_lang` table.
- `shop`: a value that can differ per store, like a product price. The entity must have a `{entity}_shop` table.

Each property adds one column named `{module}_{property}` (or `{property}` for core-owned properties) to the table of its scope. Hyphens are converted to underscores. When the column is dropped and only primary key columns remain, the table itself is dropped.

### Definition registry

Definitions are stored in two tables created at install time:

| Table | Content |
|-------|---------|
| `extra_property_definition` | One row per property: entity, owning module (`NULL` for core-owned properties), property name, type, scope, index, size, default value, constraints, placements, labels. Unique on `(entity_name, module_name, property_name)`. |
| `extra_property_definition_shop` | The stores a definition is restricted to. No row means no explicit restriction (see [Multistore](#multistore)). |

The `constraints` column holds the [constraint DSL](#validation) as text. `nullable` and the choice values are not stored in the registry: they are read from the live column definition.

## Types

| Type (`ExtraPropertyType`) | SQL column | Default BO form type | BO grid column |
|------|------------|----------------------|----------------|
| `INT` | `INT(11)` | `IntegerType` | `DataColumn` |
| `BOOL` | `TINYINT(1) UNSIGNED` | `SwitchType` | `ToggleColumn` |
| `STRING` | `VARCHAR(size)`, 255 by default | `TextType` | `DataColumn` |
| `FLOAT` | `DECIMAL(20,6)` | `NumberType` (scale 6) | `DataColumn` |
| `DATE` | `DATETIME` | `DatePickerType` | `DateTimeColumn` |
| `HTML` | `TEXT` | `FormattedTextareaType` | `DataColumn` |
| `JSON` | `LONGTEXT` | `TextareaType` | Not displayed |
| `CHOICE` | `ENUM(...)` of the choice values, `VARCHAR(64)` without values | `ChoiceType` built from the choice values | `DataColumn` |

- The form type can be replaced by any Symfony form type (`formType`), with extra options (`formOptions`). The grid column type always follows the property type.
- `JSON` values are stored encoded and returned decoded: PHP code and Smarty templates get arrays, the Admin API returns JSON objects.
- `HTML` and `JSON` columns cannot carry an SQL `DEFAULT` clause. Their default value is kept in the registry and applied when values are read.
- A `BOOL` grid column can be toggled from the grid. The toggle requires the edit permission on the entity's Back Office page.

## Where values surface

Values are always grouped by owning module, then by property name. Core-owned properties use the `_core` key.

### PHP (ObjectModel)

Every `ObjectModel` exposes an `extra_properties` bag, loaded lazily on first access. Values you set are validated and saved by `add()`, `update()` and `save()`.

```php
$product = new Product($productId);
$isDangerous = $product->extra_properties['demoextraproperty']['is_dangerous'];

$product->extra_properties['demoextraproperty']['is_dangerous'] = true;
$product->update();
```

For `lang` properties, an object loaded without a language returns an array keyed by language ID, and an object loaded with a language returns a single value for that language.

On the Front Office, the bag only contains properties with `displayFront` enabled. In the Back Office, the Admin API and the CLI, it contains all properties.

### Front Office templates

The presenters of the following entities expose an `extra_properties` key, filtered by `displayFront`: Product, Category, Manufacturer, Supplier, Store, Order, Order detail, Order return and Cart.

```smarty
{$product.extra_properties.demoextraproperty.video_link|escape:'htmlall':'UTF-8'}
{$cart.extra_properties.demoextraproperty.delivery_note|escape:'htmlall':'UTF-8'}
```

On a raw `ObjectModel` assigned to Smarty, use the object syntax for the first level: `{$customer->extra_properties.demoextraproperty.credit_limit}`. `lang` values are already resolved to the current language.

{{% notice note %}}
The key is `extra_properties` (snake_case) in PHP and Smarty. The camelCase `extraProperties` spelling is only used in Admin API payloads.
{{% /notice %}}

### Back Office forms

A property is added to the forms listed in `associatedForms`. Each entry uses the format `formId[:path[:before|after]]`, where `formId` is the block prefix of the form type (`product`, `category`, `customer`...):

| Entry | Placement |
|-------|-----------|
| `product` | A dedicated "Extra fields" tab on tabbed forms, or the end of the form on simple forms |
| `product:options` | Appended inside the `options` container |
| `product:options.suppliers:before` | Before the `suppliers` field of the `options` container |
| `customer:email:after` | After the `email` field |

Every path segment must exist in the form. Each `formId` can appear only once. When `associatedForms` is empty, the property is not added to any form.

Fields are added to forms built by the [identifiable object form builder]({{< relref "/9/development/architecture/migration-guide/forms/CRUD-forms" >}}), which covers the migrated Symfony pages. `lang` properties are rendered with a `TranslatableType`. The submitted values are saved with the entity.

### Back Office grids

A property is added as a column to the grids listed in `associatedGrids`. Each entry uses the format `gridId[:columnId[:before|after]]`, where `gridId` is the [grid definition]({{< relref "/9/development/components/grid" >}}) ID:

| Entry | Placement |
|-------|-----------|
| `product` | Before the `actions` column, or at the end of the grid |
| `product:reference` | After the `reference` column |
| `product:final_price_tax_excluded:before` | Before the `final_price_tax_excluded` column |

The column can be filtered and sorted. `JSON` properties are never displayed in grids. The grid ID does not have to match the entity name: for example, an `address` property can be placed on the `manufacturer_address` grid.

### Admin API

A property is exposed on the [Admin API]({{< relref "/9/admin-api" >}}) operations listed in `associatedApis`. Each entry is the operation URI template, with an optional list of HTTP methods: `uriTemplate[:METHOD[,METHOD...]]`.

| Entry | Matches |
|-------|---------|
| `/products/{productId}` | Every method of the single product operations |
| `/products` | The product list (and product creation) |
| `/products/{productId}:GET,PATCH` | Only reading and partially updating a product |

The URI template must match the operation exactly: nothing is inferred from the entity name, so a property never appears on a resource it does not target.

On a single item, values are returned in a nested `extraProperties` object. `lang` values are keyed by locale, and `shop` values are resolved for the store of the request:

```json
{
  "productId": 42,
  "extraProperties": {
    "demoextraproperty": {
      "is_dangerous": true,
      "video_link": {
        "en-US": "https://example.com/video",
        "fr-FR": "https://example.com/fr/video"
      }
    }
  }
}
```

On a list, each item carries the value inline, at its root, under the field name `extra_{module}_{property}`, for the language of the request:

```json
{
  "productId": 42,
  "name": "Mug",
  "extra_demoextraproperty_is_dangerous": true
}
```

`POST`, `PUT` and `PATCH` requests accept the same `extraProperties` object. Only the properties that target the operation are written, and `lang` values are keyed by locale. Invalid values return a `422` response whose violation paths look like `extraProperties.<module>.<property>`, merged with the violations of the resource itself. The OpenAPI documentation of each operation describes its `extraProperties` object, including default values and required properties.

## Validation

Values are validated on every write path: ObjectModel save, Back Office forms and Admin API. Validation has two layers:

- **Type compatibility** is always enforced, even without declared constraints: an `INT` must be numeric, a `DATE` must be `Y-m-d` or `Y-m-d H:i:s`, a `CHOICE` must be one of the choice values, a `JSON` must be valid JSON. Values are never silently coerced.
- **Constraints** are Symfony validation constraints declared on the definition, run before the type check.

Modules pass constraint objects. The registry stores them, and the Back Office and Admin API exchange them, as a text DSL with one constraint per line (or comma-separated):

```text
NotBlank
Length(min: 2, max: 64)
GreaterThan(5)
Choice(['standard', 'gift', 'bulk'])
All[ Url, NotBlank ]
TypedRegex('generic_name')
```

A quoted value is always a string, an unquoted numeric value is a number, and `true`, `false` and `null` are literals. Composite constraints list their children between brackets.

Only an allowlist of constraints is accepted:

| Group | Constraints |
|-------|-------------|
| Presence | `NotBlank`, `NotNull`, `Blank`, `IsNull` |
| String and format | `Email`, `Url`, `Json`, `Uuid`, `Ulid`, `Ip`, `Cidr`, `Hostname`, `CssColor`, `NoSuspiciousCharacters`, `Length`, `Regex` |
| Date and time | `Date`, `DateTime`, `Time`, `Timezone` |
| Numbers | `Positive`, `PositiveOrZero`, `Negative`, `NegativeOrZero`, `Luhn`, `Range`, `DivisibleBy` |
| Comparison | `EqualTo`, `NotEqualTo`, `IdenticalTo`, `NotIdenticalTo`, `LessThan`, `LessThanOrEqual`, `GreaterThan`, `GreaterThanOrEqual` |
| Boolean | `IsTrue`, `IsFalse` |
| Identifiers | `Iban`, `Bic`, `Isbn`, `Issn`, `Isin`, `CardScheme` |
| Locale | `Country`, `Language`, `Locale`, `Currency` |
| Parametric | `Choice`, `Count`, `Type` |
| Composite | `All`, `AtLeastOneOf`, `Collection`, `Sequentially` |
| PrestaShop | `TypedRegex`, `DefaultLanguage`, `CleanHtml` |

Options that Symfony evaluates at validation time (`callback`, `normalizer`, any `*PropertyPath` option) and the `groups` and `payload` options are refused.

For `lang` properties, wrap per-language rules in `All` (for example `All[ Url ]`). Constraints that check the whole array, like `DefaultLanguage`, are declared without `All`.

{{% notice warning %}}
`required` only marks the field as required in the Back Office form (HTML `required` attribute) and in the Admin API OpenAPI schema. It does not add any server-side check. To reject empty values, add a `NotBlank` constraint.
{{% /notice %}}

## Default values

`defaultValue` is typed like the property and checked against its type at registration. It is used:

- as the SQL `DEFAULT` of the column (except for `HTML` and `JSON`),
- as the value returned for an entity that has no stored value yet, on every read path (PHP, Front Office, Back Office forms and grids, Admin API),
- to prefill the field on Back Office creation forms (except for `lang` properties).

## Multistore

In a [multistore]({{< relref "/9/development/multistore" >}}) shop, two independent mechanisms apply.

**Values** follow the shop context of the request, like native fields:

- Writes in a store group or "all stores" context are copied to every store of the context for tables that carry `id_shop`. For `shop` properties, only the stores the entity is associated with (in `{entity}_shop`) are updated, unless the stores are named explicitly.
- Reads in a store group or "all stores" context use one representative store: the default store when it is part of the context, otherwise the store with the lowest ID.

**Definitions** can be restricted to some stores. A restricted definition only surfaces (Front Office, forms, grids, Admin API) in those stores. Without an explicit restriction:

- a core-owned definition is available in all stores,
- a module-owned definition follows the stores where its module is enabled.

The restriction only applies when multistore is used (feature enabled and more than one store). It changes where a definition is visible, not how values are stored: a restricted `common` property still has a single value.

## Supported entities and naming

Any entity whose `ObjectModel` table exists can receive extra properties. `lang` requires a `{entity}_lang` table and `shop` requires a `{entity}_shop` table. Registration fails otherwise.

The entity name is normalized to snake_case, and PrestaShop resolves the physical table from the `ObjectModel` definition. Some entities have a logical name that differs from their table:

| Entity name to use | Also accepted | Physical table |
|--------------------|---------------|----------------|
| `order` | `orders` | `orders` |
| `combination` | `product_attribute`, `ProductAttribute` | `product_attribute` |
| `discount` | `cart_rule` | `cart_rule` |
| `catalog_price_rule` | `specific_price_rule` | `specific_price_rule` |
| `cms_page` | `cms` | `cms` |
| `cms_page_category` | `cms_category` | `cms_category` |
| `credit_slip` | `order_slip` | `order_slip` |
| `title` | `gender` | `gender` |
| `sql_request` | `request_sql` | `request_sql` |
| `language` | `lang` | `lang` |
| `connection` | `connections` | `connections` |
| `webservice_key` | `webservice_account` | `webservice_account` |
| `order_return` | `merchandise_return` | `order_return` |

All spellings of an entity resolve to the same definition and storage. For a third-party `ObjectModel` whose entity name differs from its table, pass `tableName` explicitly.

## Limitations

- **Order grid**: the order grid paginates by ID first, so extra columns cannot be joined. Columns placed on it render empty and their filters do not work ([#42536](https://github.com/PrestaShop/PrestaShop/issues/42536)). Do not declare an `order` grid placement.
- **Cart values at checkout**: cart values are not copied to the order. A module that needs them after the purchase must copy them onto the order, for example at `actionValidateOrder` (see [demoextraproperty](https://github.com/PrestaShop/example-modules/blob/master/demoextraproperty/demoextraproperty.php)).
- **Entities without `{entity}_shop`**: entities bound to a store through a plain `id_shop` column, like `orders` or `cart`, only accept `common` properties (`cart` has no `cart_lang` table either).
- **Legacy pages**: Back Office forms and grids are only extended on pages migrated to Symfony.

## In this section

{{% children /%}}

## Related reading

- [Admin API]({{< relref "/9/admin-api" >}})
- [Admin API multi-shop context]({{< relref "/9/admin-api/multi-shop" >}})
- [Grid component]({{< relref "/9/development/components/grid" >}})
- [Form component]({{< relref "/9/development/components/form" >}})
- [Hook component]({{< relref "/9/development/components/hook" >}})
- [ObjectModel]({{< relref "/9/development/components/database/objectmodel" >}})
- [Multistore]({{< relref "/9/development/multistore" >}})
- [Creating a module]({{< relref "/9/modules/creation" >}})
- [demoextraproperty example module](https://github.com/PrestaShop/example-modules/tree/master/demoextraproperty)
