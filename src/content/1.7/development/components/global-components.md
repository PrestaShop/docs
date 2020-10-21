---
title: Global JavaScript components
weight: 70
---

# Global JavaScript components ?

It's a [new system](https://github.com/PrestaShop/PrestaShop/blob/develop/admin-dev/themes/new-theme/js/app/utils/init-components.js) mainly created for module developers, which allow you to use components we already use in the core without importing it. [Here is the ADR](https://github.com/PrestaShop/ADR/blob/master/0009-expose-js-components-using-window-variable.md) where we decided what we should do to avoid this problem.

You are now able to use components we expose to the `window.prestashop.component` object without importing anything.

This object contains two attributes :

- `component` which contain some components you can instantiate;
- `instance` which contains every instances of initiated components.

It allow module developers to avoid importing path such as `../../../../admin-dev/themes/new-module/js/components/translatable-field` because it was making hard to add a CI in order to build the module.

## How to use ?

There is an event sent after the execution of `initPrestashopComponents` which you can stick on : `PSComponentsInitiated`.

If you have the `events` package, you'll be able to catch the event like this :

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

or even import your own components that you want to make usable globally :

```js
EventEmitter.on('PSComponentsInitiated', () => {
  window.prestashop.component.MyCustomComponent = MyCustomComponent;
  window.prestashop.component.instance.myCustomComponent = new window.prestashop.component.MyCustomComponent();
});
```
