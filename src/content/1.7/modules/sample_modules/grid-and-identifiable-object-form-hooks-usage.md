---
title: Grid and identifiable object form hooks usage example
weight: 10
---

# Grid and identifiable object form hooks usage example
{{< minver v="1.7.6" title="true" >}}

## Introduction

In this tutorial we are going to build module which extends customers list with one extra column
which can be toggled. It can have two states - turned on or off. In customer creation and edit
form we will add switch which will also manage the same state. By following this tutorial you will learn
how to:

<!-- todo: add links to original doc source -->
- extend modern grids. 
- extend identifiable object form.
- use best practices to read, write and update data.

The module created within this tutorial can be found [here](https://github.com/friends-of-prestashop/demo-cqrs-hooks-usage-module)

## Prerequisites

- To be familiar with basic module creation.

### Register hooks

On module installation the following hooks are being registered:

- `actionCustomerGridDefinitionModifier` - for adding new column to customers grid.
- `actionCustomerGridQueryBuilderModifier` - for modifying customers grid sql.
- `actionCustomerFormBuilderModifier` - for adding new field to customers create or edit form field.
- `actionAfterCreateCustomerFormHandler` - to execute the saving process of added field from the module.
- `actionAfterUpdateCustomerFormHandler` - to execute the update process of added field from the module.

```php

public function install()
{
    return parent::install() &&
        $this->registerHook('actionCustomerGridDefinitionModifier') &&
        $this->registerHook('actionCustomerGridQueryBuilderModifier') &&
        $this->registerHook('actionCustomerFormBuilderModifier') &&
        $this->registerHook('actionAfterCreateCustomerFormHandler') &&
        $this->registerHook('actionAfterUpdateCustomerFormHandler') &&
        $this->installTables()
    ;
}
```
