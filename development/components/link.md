---
title: The Link component
useMermaid: true
menuTitle: Link
---

# The Link component

The `Link` component is responsible of generating URLs for various Prestashop routes. It provides a simple mecanism to handle: 

- URL Rewriting (friendly URLs)
- HTTP/HTTPS schemes
- routing to entities, controllers, modules, ...

## How to use `Link` component

`Link` is available through the [`Context`]({{< relref "/8/development/components/context" >}}), and provides several useful methods such as those documented methods below:

- `getProductLink()`
- `getCategoryLink()`
- `getModuleLink()`
- `getPageLink()`

and many more, please explore the [Link class](https://github.com/PrestaShop/PrestaShop/blob/8.1.x/classes/Link.php).

{{% notice info %}}
While possible, it is discouraged to instanciate the `Link` class by yourself, please use the `Link` provided by a `Context`.
{{% /notice %}}

### Use Link to get the URL of a Product: getProductLink() method

To obtain the URL of a product, with the right HTTP scheme, and URL rewriting (if enabled), use :

```php
// obtain $context from a controller or from a module with: 
$context = $this->context;

// or from anywhere else:
$context = Context::getContext();

// get your product instance (from ObjectModel in this example)
$product = new Product(123);

// get your product URL
$link = $context->link->getProductLink($product);
```

More parameters are available for this method, please refer to the [method definition for details](https://github.com/PrestaShop/PrestaShop/blob/8.1.x/classes/Link.php#L122-L141).

### Use Link to get the URL of a Category: getCategoryLink() method

To obtain the URL of a category, with the right HTTP scheme, and URL rewriting (if enabled), use :

```php
// get your category instance (from ObjectModel in this example)
$category = new Category(123);

// get your category URL
$link = $context->link->getCategoryLink($category);
```

More parameters are available for this method, please refer to the [method definition for details](https://github.com/PrestaShop/PrestaShop/blob/8.1.x/classes/Link.php#L411-L422).

### Use Link to get the URL of a Module controller : getModuleLink() method

To obtain the URL of a module controller, with the right HTTP scheme, and URL rewriting (if enabled), use :

```php
// get your module's default controller URL
$link = $context->link->getModuleLink("mymodulename");

// get your module's specific controller URL
$link = $context->link->getModuleLink("mymodulename", "controllerName");

// get your module's specific controller URL with params
$params = [
    "id_item" => 2,
    "action" => "showTodo"
];
$link = $context->link->getModuleLink("mymodulename", "controllerName", $params);
```

More parameters are available for this method, please refer to the [method definition for details](https://github.com/PrestaShop/PrestaShop/blob/8.1.x/classes/Link.php#L670-L684).

### Use Link to get the URL of a page : getPageLink() method

To obtain the URL of a page controller, with the right HTTP scheme, and URL rewriting (if enabled), use :

```php
// get the cart link
$link = $context->link->getPageLink("cart");

// get the cart link to delete the product with id=1 and product attribute=101;
$idProduct = 1;
$idProductAttribute = 101;

$params = [
    'delete' => 1,
    'id_product' => $idProduct,
    'id_product_attribute' => $idProductAttribute,
];

$link = $context->link->getPageLink('cart', true, null, $params,false);
```

More parameters are available for this method, please refer to the [method definition for details](https://github.com/PrestaShop/PrestaShop/blob/8.1.x/classes/Link.php#L1109-L1121).
