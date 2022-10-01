---
title: Asset management
---

# Asset Management

We advise theme developers to compile most of their style and JavaScript code into a single concatenated/minified file (see the Webpack section below).

If you need to add special assets, for example an extra JavaScript library on the home page or the product page, there are a few ways to do so.

Your theme have to print assets correctly in the smarty template, and it's explained
in the [template section]({{< relref "/8/themes/reference/templates/head" >}}).

## Registering assets

In PrestaShop 1.7+, it's easy to register custom assets on each page. The major improvement is that you can easily manage them from your theme, without any modules.

We introduced new methods to register assets, and especially new cool options.

For instance, you can register your asset specifically in the head or bottom of your HTML code; you can load it with attributes like `async` or `defer`; and you can even inline it easily.

One favorite option is the priority one, which makes it very easy to ensure everything is loaded in the order you need.

{{% notice note %}}
 Backward compatibility is kept for the `addJS()`, `addCSS()`, `addJqueryUI()` and `addJqueryPlugin()` methods. Incidentally, now is the best time to update your libraries and use the new method.
{{% /notice %}}

Here is a list of options, and what they do.

### Options

PrestaShop's `FrontController` class provides 2 new methods to easily register new assets: `registerStylesheet()` and `registerJavascript()`.

In order to have the most extensible signatures, these 2 methods take 3 arguments. The first one is the unique ID of the asset, the second one is the relative path, and the third one is an array of all other optional parameters, as described below.

**ID**

This unique identifier needed for each asset. Reusing the same ID is useful to either override or unregister something already loaded by the Core or a native module.

However, avoid generic names when adding new JS and CSS files to avoid collision with other extensions. Prefixing with your module or theme name is a good start.

**Relative path**

This is the path of your asset. In order to make your assets fully overridable and compatible with the parent/child feature, you need to provide the path from the theme's root directory, or PrestaShop's root directory if it's a module.

For example:

-   'assets/css/example.css' for something in your theme.
-   'modules/modulename/css/example.css' for something in your module.

**Extra parameters for stylesheet registration**

<table>
<col width="10%" />
<col width="33%" />
<col width="56%" />
<tbody>
<tr class="odd">
<td align="left">Name</td>
<td align="left">Values</td>
<td align="left">Comment</td>
</tr>
<tr class="even">
<td align="left">media</td>
<td align="left">all | braille | embossed | handheld | print | projection | screen | speech | tty | tv (default: all)</td>
<td align="left">-</td>
</tr>
<tr class="odd">
<td align="left">priority</td>
<td align="left">0-999 (default: 50)</td>
<td align="left">0 is the highest priority</td>
</tr>
<tr class="even">
<td align="left">inline</td>
<td align="left">true | false (default: false)</td>
<td align="left">If true, your style will be printed inside the <code>&lt;style&gt;</code> tag in your HTML <code>&lt;head&gt;</code>. Use with caution.</td>
</tr>
<tr class="odd">
  <td align="left">version</td>
  <td align="left">version number (default: null)</td>
  <td align="left">You can provide the version number, which will be added as a query string to the asset's URL</td>
</tr>
<tr class="even">
  <td align="left">needRtl</td>
  <td align="left">true | false (default: false)</td>
  <td align="left">If true, the rtl version of the stylesheet will be loaded</td>
</tr>
</tbody>
</table>

**Extra parameters for JavaScript registration**

<table>
<col width="10%" />
<col width="33%" />
<col width="56%" />
<tbody>
<tr class="odd">
<td align="left">Name</td>
<td align="left">Values</td>
<td align="left">Comment</td>
</tr>
<tr class="even">
<td align="left">position</td>
<td align="left">head | bottom (default: bottom)</td>
<td align="left">JavaScript files should be loaded in the bottom as much as possible. Remember: core.js is loaded as a first thing in the bottom so jQuery won't be loaded in the &lt;head&gt; part.</td>
</tr>
<tr class="odd">
<td align="left">priority</td>
<td align="left">0-999 (default: 50)</td>
<td align="left">0 is the highest priority</td>
</tr>
<tr class="even">
<td align="left">inline</td>
<td align="left">true | false (default: false)</td>
<td align="left">If true, your JavaScript will be printed inside <code>&lt;script type=&quot;text/javascript&quot;&gt;</code> tags inside your HTML. Use with caution.</td>
</tr>
<tr class="odd">
<td align="left">attributes</td>
<td align="left">async | defer | none (default: none)</td>
<td align="left">Load JavaScript file with the corresponding attribute (Read more: <a href="https://www.growingwiththeweb.com/2014/02/async-vs-defer-attributes.html">Async vs Defer attributes</a>)</td>
</tr>
<tr class="even">
<td align="left">server</td>
<td align="left">local | remote (default: local)</td>
<td align="left">Define if the JS resource is a local or remote path</td>
</tr>
<tr class="odd">
  <td align="left">version</td>
  <td align="left">version number (default: null)</td>
  <td align="left">You can provide the version number, which will be added as a query string to the asset's URL</td>
</tr>
</tbody>
</table>

### Registered by the Core

Every page of every theme loads the following files:

-   theme.css
-   custom.css
-   rtl.css (if a right-to-left language is detected)
-   core.js
-   theme.js
-   custom.js

<table>
<col width="14%" />
<col width="15%" />
<col width="10%" />
<col width="59%" />
<tbody>
<tr class="odd">
<td align="left">Filename</td>
<td align="left">ID</td>
<td align="left">Priority</td>
<td align="left">Comment</td>
</tr>
<tr class="even">
<td align="left">theme.css</td>
<td align="left">theme-main</td>
<td align="left">50</td>
<td align="left">Most (all?) of your theme's styles. Should be minified.</td>
</tr>
<tr class="odd">
<td align="left">rtl.css</td>
<td align="left">theme-rtl</td>
<td align="left">900</td>
<td align="left">Loaded only for Right-To-Left language</td>
</tr>
<tr class="even">
<td align="left">custom.css</td>
<td align="left">theme-custom</td>
<td align="left">1000</td>
<td align="left">Empty file loaded at the very end to allow user to override some simple style.</td>
</tr>
<tr class="odd">
<td align="left">core.js</td>
<td align="left">corejs</td>
<td align="left">0</td>
<td align="left">Provided by PrestaShop. Contains jQuery3, dispatches PrestaShop events and holds PrestaShop logic.</td>
</tr>
<tr class="even">
<td align="left">theme.js</td>
<td align="left">theme-main</td>
<td align="left">50</td>
<td align="left"><dl>
<dt>Most of your theme's JavaScript. Should embed libraries</dt>
<dd><p>required on all pages, and be minified.</p>
</dd>
</dl></td>
</tr>
<tr class="odd">
<td align="left">custom.js</td>
<td align="left">theme-custom</td>
<td align="left">1000</td>
<td align="left">Empty file loaded at the very end, to allow users to use their own custom JavaScript without modifying core files.</td>
</tr>
</tbody>
</table>

### Registering in themes

By now you probably understood that this `theme.yml` file became the heart of PrestaShop themes.

To register assets, create a new `assets` key at the top level of your `theme.yml`, and register your files according to your needs. Page identifiers are based on the `php_self` property of each controller ([example](https://github.com/PrestaShop/PrestaShop/blob/b2ba1c2ecd627e23993c9356165e0d1e842a2faa/controllers/front/ProductController.php#L35))

For example, if you want to add an external library on each page and a custom library on the Product page:

```yaml
assets:
  css:
    product:
      - id: product-extra-style
        path: assets/css/product.css
        media: all
        priority: 100
  js:
    all:
      - id: this-cool-lib
        path: assets/js/external-lib.js
        priority: 30
        position: bottom
    product:
      - id: product-custom-lib
        path: assets/js/product.js
        priority: 200
        attribute: async
```

In addition, if you want to include a library hosted in a different server you can use the following syntax:
```yaml
assets:
  css:
    all:
      - id: custom-cdn-css
        path: //cdn-url.com/external-lib.css
        media: all
        priority: 200
        server: remote
  js:
    all:
      - id: custom-cdn-js
        path: //cdn-url.com/external-lib.js
        priority: 200
        server: remote
```

### Registering in modules

When developing a PrestaShop module, you may want to add specific styles for your templates. The best way is to use the `registerStylesheet` and `registerJavascript` methods provided by the parent `FrontController` class.

{{% notice note %}}
  If you're developing a custom module that only works on your themes, don't put any style or JavaScript code inside the module: put it in the theme's files instead (`theme.js` and `theme.css`).
{{% /notice %}}

#### With a front controller module

If you develop a front controller, simply extend the `setMedia()` method. For instance:

```php
public function setMedia()
{
    parent::setMedia();

    if ('product' === $this->php_self) {
        $this->registerStylesheet(
            'module-modulename-style',
            'modules/'.$this->module->name.'/css/modulename.css',
            [
              'media' => 'all',
              'priority' => 200,
              'version' => 'release-2021-11'
            ]
        );

        $this->registerJavascript(
            'module-modulename-simple-lib',
            'modules/'.$this->module->name.'/js/lib/simple-lib.js',
            [
              'priority' => 200,
              'attribute' => 'async',
              'version' => 'release-2021-11'
            ]
        );
    }
}
```

#### Without a front controller module

If you only have your module's class, register your code on the `actionFrontControllerSetMedia` hook, and add your asset on the go inside the hook:

```php
public function hookActionFrontControllerSetMedia($params)
{
    // Only on the product page
    // You could also check if the current controller is an instance of the one you want to target
    if ('product' instanceof $this->context->controller->php_self) {
        $this->context->controller->registerStylesheet(
            'module-'.$this->name.'-style',
            'modules/'.$this->name.'/css/modulename.css',
            [
              'media' => 'all',
              'priority' => 200,
            ]
        );

        $this->context->controller->registerJavascript(
            'module-'.$this->name.'-simple-lib',
            'modules/'.$this->name.'/js/lib/simple-lib.js',
            [
              'priority' => 200,
              'attribute' => 'async',
            ]
        );
    }

    // On every page
    $this->context->controller->registerJavascript(
        'module-'.$this->name.'-js',
        'modules/'.$this->name.'/ga.js',
        [
          'position' => 'head',
          'inline' => true,
          'priority' => 10,
          'version' => 'release-2021-10'
        ]
    );
}
```

## Unregistering

You can unregister assets! That's the whole point of an `id`. For example if you want to improve your theme/module's compatibility with a module, you can unregister its assets and handle them yourself.

Let's say you want to be fully compatible with a popular navigation module. You could create a template override of course, but you could also remove the style that comes with it and bundle your specific style in your `theme.css` (since it's loaded on every page).

To unregister an assets, you need to know its ID.

### In themes

As of today, the only way to unregister an asset without any module is to place an empty file where the module override would be.

If the module registers a JavaScript file placed in `views/js/file.js`, you simply need to create an empty file in `modules/modulename/views/js/file.js`.

It works for both JavaScript and CSS assets.

### In modules

Both `unregisterJavascript` and `unregisterStylesheet` methods take only one argument: the unique ID of the resource you want to remove.

```php
<?php
// In a front controller
public function setMedia()
{
    parent::setMedia();

    $this->unregisterJavascript('the-identifier');
}

// In a module class
public function hookActionFrontControllerSetMedia($params)
{
  $this->context->controller->unregisterJavascript('the-identifier');
}
```
