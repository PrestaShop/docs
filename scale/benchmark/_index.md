---
title: How to benchmark your PrestaShop
menuTitle: How to benchmark
weight: 1
showOnHomepage: true
---

How to setup the benchmark of your PrestaShop shop
==================

## Prerequisite

- git
- php-7+
- <a href="https://getcomposer.org/download/composer">composer</a>
- The PrestaShop version you want to bench

## Dockerized installation of benchmark

To get an automatically pre-populated shop, you can use the following github repository:
**[PrestaShop performance project](https://github.com/PrestaShop/performance-project)**

## Manually prepare your benchmark

### Prepare your dataset

Before launching a benchmark of PrestaShop, you need to put a few entries in your database.

The PrestaShop shop Generator will help you to do this.

First clone the project from the following url, and set the number of entries you want for each main entities:

```text
git clone https://github.com/PrestaShop/prestashop-shop-creator
cd prestashop-shop-creator
composer install
```



The default settings is a rather small shop (about 100 products).

```text
Creating the "app/config/config.yml" file
Some parameters are missing. Please provide them.
shop_id (1): 
customers (100): 
manufacturers (100): 
suppliers (10): 
addresses (100): 
aliases (100): 
categories (100): 
warehouses (2): 
carriers (3): 
specific_prices (100): 
attribute_groups (10): 
products (100): 
attributes (10): 
carts (1000): 
cart_rules (100): 
customizations (10): 
features (100): 
feature_values (5): 
orders (10): 
guests (10): 
order_histories (6): 
range_prices (100): 
range_weights (100): 
product_attributes (5): 
images (100): 
order_messages (100): 
deliveries (100): 
connections (1000): 
product_suppliers (10): 
order_carriers (2): 
order_details (10): 
feature_products (5): 
stores (100): 
profiles (10): 
stock_availables (1): 
langs ([fr_FR, en_US]): 
```

If you want to customize later the number of entities, just modify the file `app/config/config.yml`

Then run the following command to generate your initial dataset, which will be stored in the `generated_data``
directory

```
php app/console.php
```

#### How to use this dataset during PrestaShop install?

Actually it's quite simple. Just copy the content of the `generated_data` folders (three folders should be 
there: data, img and langs) in the PrestaShop `install/fixtures/fashion` folders (overwrite the folders already 
there).

Then launch a standard PrestaShop install.

### Prepare your shop

Make sure you're not in debug mode! In `config/defines.inc.php` you should have:

```text
define('_PS_MODE_DEV_', false);
```

The smarty cache should be enabled, but the multi-front synchronisation should be disabled for best performances.
(those are the default settings).

Make sure also to have at least french and english enabled and the internationalization page.

If you are running a PrestaShop version from source, properly setup your environment for production:

```text
export SYMFONY_ENV=prod
export SYMFONY_DEBUG=0
composer dump-autoload --optimize
php bin/console cache:clear --env=prod --no-debug
```

### Write down your settings

Write down all the relevant informations which have an impact on your benchmark results:

- Server configuration (CPU / Memory / Disks...)
- PHP / Apache / MySQL settings
- PrestaShop configuration and version
