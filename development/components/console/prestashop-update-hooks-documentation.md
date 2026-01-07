---
title: prestashop:update:hooks-documentation
category: Internal/Advanced
description: Generate hooks documentation from codebase
weight: 30
---

# prestashop:update:hooks-documentation

{{< minver v="9.1" title="true" >}}

## Description

This command generates comprehensive hooks documentation by extracting hook information from the PrestaShop codebase. It creates structured XML files containing hook definitions, including static hooks and dynamic hooks (such as Grid-related hooks).

The generated documentation is used to maintain the official hooks list in the developer documentation.

## Usage

```bash
php bin/console prestashop:update:hooks-documentation <format> <destination>
```

### Arguments

- **format** (required): Output format for the documentation. Currently supports `xml`
- **destination** (required): File path where the generated documentation should be saved

## Example

```bash
php bin/console prestashop:update:hooks-documentation xml hooks-list.xml
```

This generates an XML file containing all discovered hooks.

## Generated content

The command extracts and documents:

### Static Hooks
- Action hooks (`actionXxx`)
- Display hooks (`displayXxx`)
- Hooks defined throughout the PrestaShop core
- Hook parameters and descriptions

### Dynamic Hooks
- **Grid Definition Hooks**: `action{GridId}GridDefinitionModifier`
- **Grid Query Builder Hooks**: `action{GridId}GridQueryBuilderModifier`
- **Grid Data Hooks**: `action{GridId}GridDataModifier`
- **Grid Filter Form Hooks**: `action{GridId}GridFilterFormModifier`
- **Grid Presenter Hooks**: `action{GridId}GridPresenterModifier`

For each hook, the documentation includes:
- Hook name
- Hook type (action/display)
- File location where the hook is dispatched
- Parameters passed to the hook
- Implementation examples

## XML output structure

```xml
<?xml version="1.0"?>
<hooks>
  <hook>
    <name>actionProductAdd</name>
    <type>action</type>
    <file>src/Adapter/Product/AdminProductDataProvider.php</file>
    <parameters>
      <parameter>id_product</parameter>
      <parameter>product</parameter>
    </parameters>
  </hook>
  <!-- More hooks... -->
</hooks>
```

## Use cases

- **Documentation maintenance**: Update the official PrestaShop hooks documentation
- **Hook discovery**: Identify all available hooks in a PrestaShop version
- **Module development**: Reference for developers creating modules
- **Version comparison**: Compare hooks between different PrestaShop versions
- **Automated documentation**: Integrate into CI/CD for automatic docs updates

## Technical details

The command uses:
- **HookExtractor**: Scans the codebase for hook dispatching calls
- **GridDefinitionHookByServiceIdsProvider**: Identifies dynamic Grid hooks
- Analyzes hook dispatcher calls (`dispatchWithParameters`, `dispatch`, etc.)
- Extracts hook parameters from method calls

## Related commands

- [prestashop:update:configuration-file-hooks-listing]({{< relref "prestashop-update-configuration-file-hooks-listing" >}}): Update hooks listing in configuration files
- [prestashop:update:sql-upgrade-file-hooks-listing]({{< relref "prestashop-update-sql-upgrade-file-hooks-listing" >}}): Update hooks in SQL upgrade files

## Contributing to hooks documentation

If you're maintaining the PrestaShop developer documentation:

1. Run the command to generate updated hooks XML
2. Process the XML to create the hooks list markdown
3. Update the documentation repository with the new hooks list

## See also

- [Hooks documentation]({{< relref "/9/modules/concepts/hooks" >}})
- [List of hooks]({{< relref "/9/modules/concepts/hooks/list-of-hooks" >}})
