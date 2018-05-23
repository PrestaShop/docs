# How to benchmark your PrestaShop shop

## Prerequisite

- git
- php-7+
- <a href="https://getcomposer.org/download/composer">composer</a>
- siege or a load testing tool like <a href="https://locust.io">Locust</a>

## Generate your dataset

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

## How to use this dataset during Prestashop install?

Actually it's quite simple. Just copy the content of the ```generated_data``` folders (three foldesr should be 
there: data, img and langs) in the prestashop ```install/fixtures/fashion``` folders (overwrite the folders already 
there).

Then launch a standard prestashop install.

## Optimize your LAMP stack

In order to properly benchmark your shop, you need to check the settings of PHP, Apache and MySQL.

### 1) PHP Settings

If you're using PHP-FPM (which should be the case in most of "modern" installations), you have to check the pool
configuration.
It's usually stored in the file ```/etc/php/7.x/fpm/pool.d/www.conf```.
Inside this file, the most important setting is the ```pm.max_children``` setting. It must be greater than the max number
of concurrent users you want to simulate during the bench.

Make sure Zend Opcache is enabled.

Use the following settings to optimize the performances:
```text
opcache.interned_strings_buffer=64
opcache.fast_shutdown=1
opcache.memory_consumption=256
opcache.max_accelerated_files=10000
```

### 2) Apache Settings

If you're using PHP-FPM, you should be enable to use apache mpm_event. Using the following configuration 
(to set in the mpm_event.conf file) should allow you to test up to 400 concurrent users:

```
   ServerLimit             16
   MaxClients              400
   StartServers            3
   ThreadLimit             64
   ThreadsPerChild         25
   MaxRequestWorkers       400
   MaxConnectionsPerChild  0
```

### 3) MySQL/MariaDB Settings

If you using MySQL < 8 or MariaDB, enable the query cache by putting this setting in the ```/etc/mysql/my.cnf``` file:

```
query_cache_limit               = 128K
query_cache_size                = 32M
query_cache_type                = ON
```

Other important settings are:

```
table_open_cache                      = 1000
read_buffer_size                      = 2M
read_rnd_buffer_size                  = 1M
thread_cache_size                     = 80
join_buffer_size                      = 2M
sort_buffer_size                      = 2M
max_connections                       = 400
tmp_table_size                        = 32M
max_heap_table_size                   = 32M
table_definition_cache                = 1000
performance_schema                    = OFF
```

Try to set the value of ```innodb_buffer_pool_size``` to something greater than the size of your database on disk.

Before launching the benchmark, and after importing the data, it's always great to launch an ANALYZE TABLE on all your
database by running on your server:

```
mysqlcheck -a -A -uroot -pyour_password
```

## Prepare your shop

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

Create a txt file ```url.txt``` with various urls from your shop: (prepend with the domain of your shop)

```text
http://yourdomain/fr/
http://yourdomain/fr/panier
http://yourdomain/fr/meilleures-ventes
http://yourdomain/fr/nouveaux-produits
http://yourdomain/fr/promotions
http://yourdomain/fr/hommes/1-1-hummingbird-printed-t-shirt.html#/1-taille-s/8-couleur-blanc
http://yourdomain/fr/art/3-13-affiche-encadree-the-best-is-yet-to-come.html#/19-dimension-40x60cm
http://yourdomain/fr/3-vetements
http://yourdomain/fr/6-accessoires
http://yourdomain/fr/9-art
http://yourdomain/fr/9-art?q=Prix-€-9-11
http://yourdomain/fr/magasins
http://yourdomain/fr/fournisseur
http://yourdomain/fr/recherche?controller=search&s=pull
http://yourdomain/fr/2-accueil
```

Then run a siege benchmark using this file:
```
siege -b -i -c 1 -t 20S --no-parser -f url.txt
```

Raise the concurrent parameter (-c 1) to the number of concurrent users you want to test.

The best methodology is to first warmup your cache by testing 1 time with 1 concurrent user, and then progressively 
raise the number of concurrent users until the performances actually decreases.

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

```
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
