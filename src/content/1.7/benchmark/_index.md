---
title: Benchmark
weight: 8
pre: "<b>8. </b>"
chapter: true
---

### Chapter 8

# How to benchmark your PrestaShop shop

## Prerequisite

- git
- php-7+
- <a href="https://getcomposer.org/download/composer">composer</a>

## Benchmark methodology
In order to benchmark the performances of your shop, use a testing tool like <a href="https://locust.io">Locust</a>
or siege.

## Prepare your benchmark

### Prepare your dataset

Before launching a benchmark of PrestaShop, you need to put a few entries in your database.

The prestashop shop Generator will help you to do this.

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

If you want to customize later the number of entities, just modify the file ```app/config/config.yml```

Then run the following command to generate your initial dataset, which will be stored in the ```generated_data``` 
directory

```
php app/console.php
```

#### How to use this dataset during Prestashop install?

Actually it's quite simple. Just copy the content of the ```generated_data``` folders (three foldesr should be 
there: data, img and langs) in the prestashop ```install/fixtures/fashion``` folders (overwrite the folders already 
there).

Then launch a standard prestashop install.

### Prepare your shop

Make sure your not in debug mode! In ```config/defines.inc.php``` you should have:
```text
define('_PS_MODE_DEV_', false);
```
The smarty cache should be enabled, but the multi-front synchronisation should be disabled for best performances.
(those are the default settings).

Make sure also to have at least french and english enabled and the internationalization page.

If you are running a prestashop version from source, properly setup your environment for production:

```text
export SYMFONY_ENV=prod
export SYMFONY_DEBUG=0
composer dump-autoload --optimize
php bin/console cache:clear --env=prod --no-debug
```

## Bench your shop performances

### Write down your settings

Write down all the relevant informations which have an impact on your benchmark results:

- Server configuration (CPU / Memory / Disks...)
- PHP / Apache / MySQL settings
- PrestaShop configuration and version


### Run the frontoffice benchmark
Create a txt file ```url.txt``` with various urls from your shop: (prepend with the domain of your shop)

```text
http://localhost:8080/
http://localhost:8080/panier
http://localhost:8080/meilleures-ventes
http://localhost:8080/nouveaux-produits
http://localhost:8080/promotions
http://localhost:8080/men/1-1-hummingbird-printed-t-shirt.html#/1-taille-s/8-couleur-blanc
http://localhost:8080/accessories/3-mug-the-best-is-yet-to-come.html
http://localhost:8080/3-clothes
http://localhost:8080/6-accessories
http://localhost:8080/3-clothes?q=Prix-€-28-34
http://localhost:8080/magasins
http://localhost:8080/fournisseur
http://localhost:8080/recherche?controller=search&s=sweater
http://localhost:8080/2-accueil
```

Then run a siege benchmark using this file:
```text
siege -b -i -c 1 -t 20S --no-parser -f url.txt
```

We will first warmup the cache by testing 1 time with 1 concurrent user, and then progressively 
raise the number of concurrent users until the performances actually decreases.


Raise the concurrent parameter (-c 1) to the number of concurrent users you want to test.

Ex for 10 concurrent users without MySQL query cache:

```text
siege -b -i -c 10 -t 20S --no-parser -f url.txt  

Lifting the server siege...
Transactions:		         879 hits
Availability:		      100.00 %
Elapsed time:		       19.26 secs
Data transferred:	       37.32 MB
Response time:		        0.22 secs
Transaction rate:	       45.64 trans/sec
Throughput:		        1.94 MB/sec
Concurrency:		        9.92
Successful transactions:         879
Failed transactions:	           0
Longest transaction:	        0.68
Shortest transaction:	        0.03
```

With MySQL query cache enabled:

```text
Lifting the server siege...
Transactions:		        1114 hits
Availability:		      100.00 %
Elapsed time:		       19.46 secs
Data transferred:	       46.70 MB
Response time:		        0.17 secs
Transaction rate:	       57.25 trans/sec
Throughput:		        2.40 MB/sec
Concurrency:		        9.93
Successful transactions:        1114
Failed transactions:	           0
Longest transaction:	        0.57
Shortest transaction:	        0.02
```

### Interpret the results

In the siege result output, here is the useful results:

##### Transactions

The total number of pages loaded during the benchmark. The higher the better.

##### Availability

It tells you the amount of pages which have failed to load.

##### Response time

The average response time of your pages. The lower the better.

##### Transaction rate

The number of pages loaded by second. The higher the better.

##### Concurrency

The number of concurrent transaction the software has been able to run. Should be close to the requested 
concurrent user setting.

##### Failed transactions

Closely related to Availability, the number of pages which have failed to load (404, 503, ...)


