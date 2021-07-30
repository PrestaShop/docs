---
title: Global JavaScript components
weight: 70
---

# Global JavaScript components
{{< minver v="1.7.8" title="true" >}}

It's a [new system](https://github.com/PrestaShop/PrestaShop/blob/develop/admin-dev/themes/new-theme/js/app/utils/init-components.js) available since the 1.7.8 version mainly created for module developers, which allow you to use components we already use in the core without importing it. [Here is the ADR](https://github.com/PrestaShop/ADR/blob/master/0009-expose-js-components-using-window-variable.md) where we decided what we should do to avoid this problem.

You are now able to use components we expose to the `window.prestashop.component` object without importing anything.

This object contains two attributes:

- `component` which contain some components you can instantiate;
- `instance` which contains every instances of initiated components.

It allows module developers to avoid importing path such as `../../../../admin-dev/themes/new-theme/js/components/translatable-field` because it was making hard to add a CI in order to build the module.

## How to use

There is an event sent after the execution of `initPrestashopComponents` which you can stick on: `PSComponentsInitiated`.

If you have the `events` package, you'll be able to catch the event like this:

```js
EventEmitter.on('PSComponentsInitiated', () => {
  [...]
})
```

You are able to use a custom component [following this example](https://github.com/PrestaShop/example-modules/blob/master/demosymfonyform/views/js/form.js):

```js
$(document).ready(function() {
  window.prestashop.component.initComponents([
    'TranslatableField',
    'TinyMCEEditor',
    'TranslatableInput',
  ]);
});
```

You are also able to initiate it manually:

```js
EventEmitter.on('PSComponentsInitiated', () => {
  window.prestashop.component.TranslatableField = MyCustomTranslatableField;

  if (window.prestashop.component.instance.translatableField) {
    window.prestashop.component.instance.translatableField = new window.prestashop.component.TranslatableField();
  }
});
```

or even import your own components that you want to make usable globally:

```js
EventEmitter.on('PSComponentsInitiated', () => {
  window.prestashop.component.MyCustomComponent = MyCustomComponent;
  window.prestashop.component.instance.myCustomComponent = new window.prestashop.component.MyCustomComponent();
});
```

## List of available components 

Component | Version 
-------- | ---- 
TranslatableField            | 1.7.8
TinyMCEEditor                | 1.7.8
TranslatableInput            | 1.7.8
TaggableField                | 1.7.8
ChoiceTable                  | 1.7.8
EventEmitter                 | 1.7.8
ChoiceTree                   | 1.7.8
MultipleChoiceTable          | 1.7.8
GeneratableInput             | 1.7.8
CountryStateSelectionToggler | 1.7.8
CountryDniRequiredToggler    | 1.7.8
TextWithLengthCounter        | 1.7.8
MultistoreConfigField        | 1.7.8
PreviewOpener                | 1.7.8
Router                       | 1.7.8
Grid                         | 1.7.8
ColorPicker                  | 1.7.9

## Grid component

From version 1.7.8 you can access both, Grid component and its extensions, this should make working with modern controllers in your modules much easier.

Component | Version 
-------- | ---- 
Grid           | 1.7.8
GridExtensions | 1.7.8

### Extensions

```js
const Grid = window.prestashop.component.Grid(gridId);
const ChoiceExtension = window.prestashop.component.GridExtensions.ChoiceExtension();
```

Extension | Version 
-------- | ---- 
AsyncToggleColumnExtension | 1.7.8
BulkActionCheckboxExtension | 1.7.8
BulkOpenTabsExtension | 1.7.8
ChoiceExtension | 1.7.8
ColumnTogglingExtension | 1.7.8
ExportToSqlManagerExtension | 1.7.8
FiltersResetExtension | 1.7.8
FiltersSubmitButtonEnablerExtension | 1.7.8
LinkRowActionExtension | 1.7.8
ModalFormSubmitExtension | 1.7.8
PositionExtension | 1.7.8
PreviewExtension | 1.7.8
ReloadListExtension | 1.7.8
SortingExtension | 1.7.8
SubmitBulkActionExtension | 1.7.8
SubmitGridActionExtension | 1.7.8
SubmitRowActionExtension | 1.7.8