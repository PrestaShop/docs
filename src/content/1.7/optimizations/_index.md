---
title: Optimizations
weight: 7
pre: "<b>7. </b>"
chapter: true
---

### Chapter 7

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

Use the following settings to optimize the performances:
```text
opcache.interned_strings_buffer=64
opcache.fast_shutdown=1
opcache.memory_consumption=256
opcache.max_accelerated_files=10000
```

## 2) Apache Settings

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

## 3) MySQL/MariaDB Settings

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

## 4) Use a CDN

Always try to use a CDN to reduce the amount of hits on your server. <a href="https://www.cloudflare.com">Cloudflare</a>
is a good and free service. You can use as well to minify your page or to easily enable SSL on your site.

## 5) Optimize your prestashop

In the performances tab of your prestashop:

- Do not enable "Multi-Front synchronisation" if you only have one front server or if your smarty cache is shared 
across all your front servers on the same filesystem. 
- Use the "File System" cache type, not "MySQL"
- Enable the Smarty cache
- Do not enable the Cache from the "Cache" section if you have MySQL (<8) / MariaDB on the same machine, 
  the MySQL query cache will be more efficient. <br />
  If you still want to enable it, if you have only 1 front, use APC, and if you have several front, use a unique
  central memcached server host (not localhost!)


