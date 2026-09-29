---
title: Register extra properties from a module
menuTitle: Register from a module
weight: 10
---

# Register extra properties from a module {{< minver v="9.2" title="true" >}}

A module declares its extra properties with `Module::registerExtraProperty()`, usually in `install()`, and removes them with `Module::unregisterExtraProperty()` in `uninstall()`. The storage, the Back Office integration and the Admin API exposure are handled by the core, as described in [Extra properties]({{< relref "/9/development/components/extra-properties" >}}).

The [demoextraproperty](https://github.com/PrestaShop/example-modules/tree/master/demoextraproperty) example module registers properties on products, categories, customers, addresses, CMS pages, carts, orders and combinations, with every scope and most types. All examples on this page come from it.

## Register a property

Build an `ExtraPropertyDefinition` and pass it to `registerExtraProperty()`. Named arguments are recommended: the constructor has many optional parameters.

```php
use PrestaShop\PrestaShop\Core\ExtraProperty\Definition\ExtraPropertyDefinition;
use PrestaShop\PrestaShop\Core\ExtraProperty\Definition\ExtraPropertyScope;
use PrestaShop\PrestaShop\Core\ExtraProperty\Definition\ExtraPropertyType;
use PrestaShopBundle\Form\Admin\Type\SwitchType;

public function install(): bool
{
    if (!parent::install()) {
        return false;
    }

    $registered = $this->registerExtraProperty(
        new ExtraPropertyDefinition(
            entityName: 'product',
            propertyName: 'is_dangerous',
            type: ExtraPropertyType::BOOL,
            scope: ExtraPropertyScope::COMMON,
            defaultValue: 0,
            nullable: false,
            displayFront: true,
            associatedApis: ['/products', '/products/{productId}'],
            associatedForms: ['product:options.suppliers:before'],
            associatedGrids: ['product:reference'],
            formType: SwitchType::class,
            labelWording: 'Dangerous product',
            labelDomain: 'Modules.Demoextraproperty.Admin',
            descriptionWording: 'Indicates whether the product is dangerous',
            descriptionDomain: 'Modules.Demoextraproperty.Admin',
        )
    );
    if (!$registered) {
        return false;
    }

    return true;
}
```

See the full [install() method](https://github.com/PrestaShop/example-modules/blob/master/demoextraproperty/demoextraproperty.php) of demoextraproperty for `lang`, `shop`, `CHOICE`, `JSON` and `HTML` properties with constraints.

The module name is filled in automatically from `$this->name`. The property name is unique per entity and module, across scopes.

### Constructor arguments

| Argument | Type | Default | Description |
|----------|------|---------|-------------|
| `entityName` | `string` | Required | Entity the property belongs to (`product`, `order`, `combination`...). Normalized to snake_case. See [Supported entities]({{< relref "/9/development/components/extra-properties#supported-entities-and-naming" >}}). |
| `propertyName` | `string` | Required | Property identifier. Letters, digits, `_` and `-`. The storage column `{module}_{property}` must not exceed 64 characters. |
| `type` | `ExtraPropertyType` | `STRING` | `INT`, `BOOL`, `STRING`, `FLOAT`, `DATE`, `HTML`, `JSON` or `CHOICE`. See [Types]({{< relref "/9/development/components/extra-properties#types" >}}). |
| `scope` | `ExtraPropertyScope` | `COMMON` | `COMMON`, `LANG` or `SHOP`. See [Storage]({{< relref "/9/development/components/extra-properties#storage" >}}). |
| `moduleName` | `?string` | `null` | Owning module. Filled in by `registerExtraProperty()` when `null`. |
| `enumValues` | `?list<string>` | `null` | Allowed values of a `CHOICE` property, stored as an SQL `ENUM`. |
| `defaultValue` | `int\|float\|string\|bool\|null` | `null` | Default value, checked against the type. See [Default values]({{< relref "/9/development/components/extra-properties#default-values" >}}). |
| `nullable` | `bool` | `true` | `NULL` or `NOT NULL` column. |
| `required` | `bool` | `false` | Marks the field as required in Back Office forms and in the Admin API schema. See [Validation]({{< relref "/9/development/components/extra-properties#validation" >}}). |
| `size` | `?int` | `null` | `VARCHAR` length of a `STRING` property. 255 when `null`. |
| `sqlIndex` | `ExtraPropertySqlIndex` | `NONE` | Index on the storage column: `NONE`, `KEY` or `UNIQUE`. |
| `displayFront` | `bool` | `false` | Exposes the value on the Front Office (presenters and `ObjectModel` bags). Every entry point other than the Back Office, the Admin API and the CLI counts as Front Office, including the legacy webservice. |
| `associatedForms` | `?list<string>` | `null` | Back Office form placements, `formId[:path[:before\|after]]`. See [Back Office forms]({{< relref "/9/development/components/extra-properties#back-office-forms" >}}). |
| `associatedGrids` | `?list<string>` | `null` | Back Office grid placements, `gridId[:columnId[:before\|after]]`. See [Back Office grids]({{< relref "/9/development/components/extra-properties#back-office-grids" >}}). |
| `associatedApis` | `?list<string>` | `null` | Admin API operations, `uriTemplate[:METHOD[,METHOD...]]`. See [Admin API]({{< relref "/9/development/components/extra-properties#admin-api" >}}). |
| `formType` | `?string` | `null` | Symfony form type FQCN replacing the default form type of the type. |
| `formOptions` | `?array` | `null` | Options passed to the form type. Stored as JSON, so they cannot contain objects. |
| `constraints` | `?list<Constraint>` | `null` | Symfony constraints, limited to the [allowed constraints]({{< relref "/9/development/components/extra-properties#validation" >}}). |
| `labelWording` | `?string` | `null` | Label in Back Office forms and grids. Required when `associatedForms` or `associatedGrids` is set. |
| `labelDomain` | `?string` | `null` | Translation domain of the label. Must belong to the module (`Modules.<Module>.*`). |
| `descriptionWording` | `?string` | `null` | Help text displayed under the Back Office form field. |
| `descriptionDomain` | `?string` | `null` | Translation domain of the description. Must belong to the module. |
| `multiShop` | `?bool` | `null` | Internal: read from the storage table when definitions are loaded. Do not set it. |
| `associatedShopIds` | `?list<int>` | `null` | Stores the definition is restricted to. See [Restrict a property to some stores](#restrict-a-property-to-some-stores). |
| `tableName` | `?string` | `null` | Physical table, when it cannot be resolved from the entity name (third-party `ObjectModel` whose entity name differs from its table). |
| `primaryKeyName` | `?string` | `null` | Primary key column. Resolved from the `ObjectModel` definition, then `id_{entity}`. |
| `controllerName` | `?string` | `null` | Back Office controller used as permission subject (grid toggle). Resolved from the entity name. Set it only when the entity's Back Office tab does not follow the `Admin{Entities}` convention. |

The constructor throws an `InvalidExtraPropertyDefinitionException` when the definition is malformed: invalid identifier, invalid placement entry, duplicated form or grid ID, missing `labelWording` while a form or grid placement is set, a domain that does not belong to the module.

{{% notice tip %}}
Labels and descriptions are translated from the Back Office translation interface. For the wordings to be listed there, also call `$this->trans()` with the same wording and domain somewhere in the module code, and ship them in the module translation files.
{{% /notice %}}

### Handle registration failures

Like other `register*()` methods, `registerExtraProperty()` returns `false` on failure and adds the reason to `$this->_errors`, where the module manager displays it. A failed registration persists nothing: no definition row, no column.

To react to a specific reason, call the registry service directly. It throws an `ExtraPropertyRegistryException` whose code gives the reason:

```php
use PrestaShop\PrestaShop\Core\ExtraProperty\Definition\ExtraPropertyRegistryInterface;
use PrestaShop\PrestaShop\Core\ExtraProperty\Exception\ExtraPropertyRegistryException;

try {
    $this->get(ExtraPropertyRegistryInterface::class)->register($definition->withModuleName($this->name));
} catch (ExtraPropertyRegistryException $e) {
    if ($e->getCode() === ExtraPropertyRegistryException::SCOPE_CONFLICT) {
        // ...
    }
}
```

| Code | Constant | Reason |
|------|----------|--------|
| 1 | `BASE_TABLE_NOT_FOUND` | The entity table does not exist, or the `{entity}_lang` / `{entity}_shop` table required by the scope does not exist. |
| 2 | `SCOPE_CONFLICT` | The property is already registered on this entity with another scope. |
| 3 | `DESTRUCTIVE_SCHEMA_CHANGE` | The change could lose stored data. See [Update a property](#update-a-property). |
| 4 | `PERSISTENCE_FAILURE` | Writing or deleting the definition row failed. |
| 5 | `SCHEMA_FAILURE` | Creating, altering or dropping a storage table or column failed. |
| 6 | `INVALID_FORM_OPTIONS` | `formType` and `formOptions` cannot build a form field. `getErrors()` lists each invalid option. |
| 7 | `UNKNOWN_SHOP` | `associatedShopIds` contains a store ID that does not exist. |
| 8 | `STORAGE_CONFLICT` | Another definition, under another entity name, already stores its values in the same column. |
| 9 | `INVALID_DEFAULT_VALUE` | `defaultValue` does not fit the type (non-numeric `INT` or `FLOAT`, invalid `DATE`, value outside the `CHOICE` values, invalid `JSON`). |
| 10 | `INVALID_CONSTRAINTS` | A constraint, an option or a value cannot be stored in the constraint DSL. |

## Unregister a property

Pass a definition identifying the property: entity and property name are enough, since a property is unique per entity and module.

```php
public function uninstall(): bool
{
    return $this->unregisterExtraProperty(new ExtraPropertyDefinition('product', 'is_dangerous'), false)
        && parent::uninstall();
}
```

The second argument, `$dropData`, controls the storage column:

| `$dropData` | Effect |
|-------------|--------|
| `false` (default) | Only the definition row is deleted. The column and its values stay in the database: reinstalling the module and registering the same property makes the values available again. |
| `true` | The column and all its values are dropped. The value table is dropped when no property column remains. |

`unregisterExtraProperty()` returns `false` and adds the reason to `$this->_errors` on failure. Unregistering a property that is not registered does nothing and returns `true`. Uninstalling a module does not unregister its properties automatically: see the [uninstall() method](https://github.com/PrestaShop/example-modules/blob/master/demoextraproperty/demoextraproperty.php) of demoextraproperty.

## Update a property

Calling `registerExtraProperty()` for a property that already exists updates its definition. You can do it from a module [upgrade script]({{< relref "/9/modules/creation/enabling-auto-update" >}}).

Labels, placements, `displayFront`, `required`, form type and options, constraints and index can always be changed. Storage changes are applied to the live column only when they cannot lose data:

| Accepted | Refused with `DESTRUCTIVE_SCHEMA_CHANGE` |
|----------|------------------------------------------|
| Default value change | Type change |
| `STRING` size increase | Physical table change |
| `NOT NULL` to `NULL` | `STRING` size decrease |
| New `CHOICE` values | `NULL` to `NOT NULL` |
| | Removed `CHOICE` value, or switch between choice values and no choice values |

A scope change is refused earlier, with `SCOPE_CONFLICT`.

To apply a refused change, unregister the property with `$dropData = true`, then register it again. The stored values are lost: migrate them yourself if you need them.

### Restrict a property to some stores

`associatedShopIds` restricts where the definition is available in a [multistore]({{< relref "/9/development/components/extra-properties#multistore" >}}) shop. It has three states when you register:

| Value | Effect on the stored restriction |
|-------|----------------------------------|
| `null` (default) | Left untouched. Re-registering on upgrade does not overwrite a restriction set by the merchant in the Back Office. |
| `[]` | Cleared: the definition follows the stores where the module is enabled. |
| `[1, 3]` | Replaced by this list. |

## Read and write values

Values are grouped by module name and property name everywhere. The surfaces are described in [Where values surface]({{< relref "/9/development/components/extra-properties#where-values-surface" >}}).

In PHP, read and write through the `ObjectModel` bag, then save the object. For example, demoextraproperty copies a cart note onto the order when the order is validated, because cart values are not kept after checkout:

```php
public function hookActionValidateOrder(array $params): void
{
    $cart = $params['cart'] ?? null;
    $order = $params['order'] ?? null;
    if (!$cart instanceof Cart || !$order instanceof Order || (int) $order->id <= 0) {
        return;
    }

    $deliveryNote = $cart->extra_properties['demoextraproperty']['delivery_note'];
    if (!is_string($deliveryNote) || '' === $deliveryNote) {
        return;
    }

    $order->extra_properties['demoextraproperty']['delivery_note'] = $deliveryNote;
    $order->update();
}
```

`JSON` properties accept a PHP array: it is encoded for storage and decoded on read (see `hookDisplayCustomerAccountTop` in [demoextraproperty.php](https://github.com/PrestaShop/example-modules/blob/master/demoextraproperty/demoextraproperty.php)).

In Front Office templates, read the presented entity:

```smarty
{if $product.extra_properties.demoextraproperty.is_dangerous|intval}
  <p>{l s='This product is marked as dangerous.' d='Modules.Demoextraproperty.Main'}</p>
{/if}
```

The [templates of demoextraproperty](https://github.com/PrestaShop/example-modules/tree/master/demoextraproperty/views/templates/hook) show the named access, a loop over all properties of a module ([_extra_properties.tpl](https://github.com/PrestaShop/example-modules/blob/master/demoextraproperty/views/templates/hook/_extra_properties.tpl)), the cart on the checkout summary and the order detail page.

Through the Admin API, send the `extraProperties` object with a `POST`, `PUT` or `PATCH` request on an operation listed in `associatedApis`:

```json
{
  "extraProperties": {
    "demoextraproperty": {
      "is_dangerous": true,
      "video_link": { "en-US": "https://example.com/video" }
    }
  }
}
```

### Integrate a property manually in a form

A property without `associatedForms` is not added to any form. You can still add the field yourself with the [form hooks]({{< relref "/9/development/components/form" >}}) and save the value through the `ObjectModel` bag. demoextraproperty does this for CMS pages with `actionCmsPageFormBuilderModifier`, `actionCmsPageFormDataProviderData` and `actionAfterCreateCmsPageFormHandler` / `actionAfterUpdateCmsPageFormHandler`.

## Migrate from a custom extra table

A module that stored additional fields in its own table can move them to extra properties from an upgrade script: register the property, then copy the data into the value table.

The value table is `{entity}_extra` (or `_extra_lang`, `_extra_shop`, depending on the scope), and the column is named `{module}_{property}`, hyphens replaced by underscores. The table already exists after registration and may contain rows for other properties, so use `ON DUPLICATE KEY UPDATE`:

```php
// upgrade/upgrade-2.0.0.php
use PrestaShop\PrestaShop\Core\ExtraProperty\Definition\ExtraPropertyDefinition;
use PrestaShop\PrestaShop\Core\ExtraProperty\Definition\ExtraPropertyType;

function upgrade_module_2_0_0(Module $module): bool
{
    $registered = $module->registerExtraProperty(new ExtraPropertyDefinition(
        entityName: 'product',
        propertyName: 'internal_code',
        type: ExtraPropertyType::STRING,
        size: 64,
        associatedForms: ['product'],
        labelWording: 'Internal code',
        labelDomain: 'Modules.Mymodule.Admin',
    ));
    if (!$registered) {
        return false;
    }

    // Storage column: {module}_{property} = mymodule_internal_code
    $copied = Db::getInstance()->execute(
        'INSERT INTO `' . _DB_PREFIX_ . 'product_extra` (`id_product`, `mymodule_internal_code`)
        SELECT `id_product`, `internal_code` FROM `' . _DB_PREFIX_ . 'mymodule_product`
        ON DUPLICATE KEY UPDATE `mymodule_internal_code` = VALUES(`mymodule_internal_code`)'
    );

    return $copied && Db::getInstance()->execute('DROP TABLE IF EXISTS `' . _DB_PREFIX_ . 'mymodule_product`');
}
```

For a `lang` or `shop` property, copy every primary key column of the value table (for example `id_product`, `id_shop` and `id_lang` for `product_extra_lang`).

{{% notice warning %}}
Values inserted with SQL skip validation. Make sure the data you copy fits the type and the constraints of the property.
{{% /notice %}}

## Related reading

- [Extra properties]({{< relref "/9/development/components/extra-properties" >}})
- [Manage extra properties from the Back Office]({{< relref "/9/development/components/extra-properties/register-from-back-office" >}})
- [Enabling the Auto-Update]({{< relref "/9/modules/creation/enabling-auto-update" >}})
- [demoextraproperty example module](https://github.com/PrestaShop/example-modules/tree/master/demoextraproperty)
