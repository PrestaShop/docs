---
title: Optimize your PrestaShop
alias:
- 1.7/optimizations/
---

# How to Optimize the performance of your PrestaShop

In order to properly benchmark your shop, you need to check the settings of PHP, Apache and MySQL.

## 1) PHP Settings

Try to use PHP >=7, it will speed up a lot your shop!

If you're using PHP-FPM (which should be the case in most of "modern" installations), you have to check the pool
configuration.
It's usually stored in the file ```/etc/php/7.x/fpm/pool.d/www.conf```.
Inside this file, the most important setting is the ```pm.max_children``` setting. It must be greater than the max number
of concurrent users you want to simulate during the bench.

Make sure Zend Opcache is enabled.

> Note this configuration of PHP should be used in Production environments only.

Use the following settings to optimize the performances:
```text
[Date]
date.timezone = UTC

[Session]
session.auto_start = Off

[PHP]
short_open_tag = Off
realpath_cache_size = 4096K
realpath_cache_ttl = 600
apc.enable_cli = 1
display_errors = Off

magic_quotes_gpc = off
memory_limit = 512M
max_execution_time = 300
max_input_time = 300
upload_max_filesize = 20M
post_max_size = 20M
; Increase this value if you work with products with a lot of combinations
max_input_vars = 20000
allow_url_fopen = on

[opcache]
opcache.enable_file_override = On
opcache.interned_strings_buffer=64
opcache.fast_shutdown=1
opcache.memory_consumption=256
opcache.max_accelerated_files=20000

; Extra-optimization https://symfony.com/doc/current/performance.html#don-t-check-php-files-timestamps
; opcache.validate_timestamps=0
```

## 2) Composer (Autoloading optimizations)

The class loader used while developing the application is optimized to find new and changed classes. In production servers, PHP files should never change, unless a new application version is deployed. That's why you can optimize Composer's autoloader to scan the entire application once and build a "class map", which is a big array of the locations of all the classes and it's stored in `vendor/composer/autoload_classmap.php`.

Execute this command to generate the class map (and make it part of your deployment process too):

```text
composer dump-autoload --optimize --no-dev --classmap-authoritative
```

* `--optimize` dumps every PSR-0 and PSR-4 compatible class used in your application;
* `--no-dev` excludes the classes that are only needed in the development environment (e.g. tests);
* `--classmap-authoritative` prevents Composer from scanning the file system for classes that are not found in the class map.

> If you install a new module in production, you need to execute again this command.

## 3) Apache Settings

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

## 4) MySQL/MariaDB Settings

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

## 5) Use a CDN

Always try to use a CDN to reduce the amount of hits on your server. <a href="https://www.cloudflare.com">Cloudflare</a>
is a good and free service. You can use as well to minify your page or to easily enable SSL on your site.

## 6) Optimize your prestashop

In the performances tab of your prestashop:

- Do not enable "Multi-Front synchronisation" if you only have one front server or if your smarty cache is shared 
across all your front servers on the same filesystem. 
- Use the "File System" cache type, not "MySQL"
- Enable the Smarty cache
- Do not enable the Cache from the "Cache" section if you have MySQL (<8) / MariaDB on the same machine, 
  the MySQL query cache will be more efficient. <br />
  If you still want to enable it, if you have only 1 front, use APC, and if you have several front, use a unique
  central memcached server host (not localhost!)
