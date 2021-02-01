---
title: TinyMCE
menuTitle: TinyMCE
---

# Modify the TinyMCE configuration
{{< minver v="1.7.8" title="true" >}}

You are able to modify the configuration by using the `actionAdminControllerSetMedia` hook.

Inside the JS file you added with this hook, you need to create a global object containing your custom configuration:

```js
window.defaultTinyMceConfig = {
  [...]
}
```

and as you can see in the [tinymce core file](https://github.com/PrestaShop/PrestaShop/blob/0046bf590f033e2ad00594efd92873bc577bf81a/js/admin/tinymce.inc.js) it will load it instead of the default core configuration.

Keep in mind that the config is not completely replaced, it's an `Object.assign`, this means that if you want to remove a certain configuration, you'll have to add it inside your own config, overwise it will be kept.
