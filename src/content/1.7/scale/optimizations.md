---
title: Optimize your PrestaShop
alias:
- 1.7/optimizations/
---

# Optimize your PrestaShop performance

Before making any change on your PrestaShop instance, it is highly recommended to perform some benchmarks.

The idea behind this is to _know_ what your baseline performance is, so that you can make sure that your changes are increasing your shop's performance and not the other way around.

If you've done no benchmark beforehand, there is no way to ensure you did not decrease your performances in the end.

{{% notice tip %}}
Keep in mind that the surest way to tune your shop is:

- benchmark
- make a change
- repeat
{{% /notice %}}

## Finding your bottleneck(s)

Performance tuning can be a tricky thing, there are plenty of factors that can slow down an application.

It can come from your disks, lack of memory, network capacity, CPU: wherever you can think of.

Then, the challenge is to find your _current_ bottleneck (could be disks access), remove it and then find the next one (could be memory).

There's no way to enumerate all the performance issues we've encountered, but let's review the more common ones and tackle them.

### 1) PHP

First, try to use PHP >=7 when possible. Hard work has been done on performance starting on this version and it will provide a nice speed boost to your shop!

If you're using PHP-FPM (which should be the case for most "modern" installations), you have to check the `pool`
configuration.
It's usually stored in the file ```/etc/php/7.x/fpm/pool.d/www.conf```.
Inside this file, the most important setting is the ```pm.max_children``` setting. It must be greater than the max number
of concurrent users you want to simulate during the bench.

{{% notice note %}}
Note this PHP configuration should be used on Production environments only.
{{% /notice %}}

Use the following settings to optimize the performances:
```text
[Date]
date.timezone = UTC

[Session]
session.auto_start = Off

[PHP]
short_open_tag = Off
display_errors = Off

magic_quotes_gpc = off
; Increase this value if you are able to do it
memory_limit = 512M
max_execution_time = 300
max_input_time = 300
upload_max_filesize = 20M
post_max_size = 22M
; Increase this value if you work with products with a lot of combinations
max_input_vars = 20000
allow_url_fopen = on
```
### 2) PHP & File system

It is well known that PHP does not manage file systems very well.

That's why there are plenty of useful tuning options to avoid accessing the file system constantly.

#### realpath_cache

At each file access, by default, PHP will first check that the file is still there, causing plenty of `lstat` system calls. Potentially thousands.

PHP provides an option to store this information in cache, so that it can avoid repeating those system calls constantly:

```
[PHP]
realpath_cache_size = 4096K
realpath_cache_ttl = 600
```

Keep in mind that this configuration is NOT compatible with other parameters, such as `open_basedir` and `safe_mode` directives.

Finally, if you're using a NAS or any other network storage solution to store your files (in case of horizontal scaling, for example), it is **highly recommended** to enable this setting.

#### opcache

Because file system tuning is a never ending story, not only you can cache the files' path, but also its contents.

Good news is, OPCache will not only store your PHP files in memory, but it will store their bytecode, meaning the application already compiled, in a shared memory, available to all applications calls:

```
[opcache]
opcache.enable_file_override = On
opcache.interned_strings_buffer=64
opcache.memory_consumption=256
opcache.max_accelerated_files=20000
```

Also, your favorite ecommerce project made sure it's fully compatible with OPCache.

Isn't it nice?

### 3) Composer (Autoloading optimizations)

The class loader used while developing the application is optimized to find new and changed classes. On production servers, PHP files should never change, unless a new application version is deployed. That's why you can optimize Composer's autoloader to scan the entire application once and build a "class map", which is a big array of all the classes locations, stored in `vendor/composer/autoload_classmap.php`.

Execute this command to generate the class map (and make it part of your deployment process):

```text
composer dump-autoload --optimize --no-dev --classmap-authoritative
```

* `--optimize`: dumps every PSR-0 and PSR-4 compatible class used in your application;
* `--no-dev`: excludes the classes that are only needed in the development environment (e.g. tests);
* `--classmap-authoritative`: prevents Composer from scanning the file system for classes that are not found in the class map.

{{% notice tip %}}
If you install a new module in production, you need to execute again this command.
{{% /notice %}}

### 4) Apache Settings

If you're using PHP-FPM, you should be able to use apache mpm_event. Using the following configuration (to set in the mpm_event.conf file) should allow you to test up to 400 concurrent users:

```
   ServerLimit             16
   MaxClients              400
   StartServers            3
   ThreadLimit             64
   ThreadsPerChild         25
   MaxRequestWorkers       400
   MaxConnectionsPerChild  0
```

### 5) MySQL/MariaDB Settings

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

### 6) Use a CDN

A CDN (Content Delivery Network) is a kind of proxy that will cache your static files and serve them instead of your own server.

Hence, a CDN will reduce drastically the amount of hits made to your server.

There are plenty of CDN providers, [Cloudflare](https://www.cloudflare.com) is a good and free one. You can use as well to minify your page or to easily enable SSL on your site.

Just one slight consideration about CDNs though: any modification done to your shop's static assets, such as images, css and the like, may not be immediate available once behind a CDN. When those files are cached, if you modify them on your server, you will need to wait for the cache expiration (often configurable) before seeing the modification live - or invalidate part or all your cache. Most providers offer such features.

### 6) Optimize your PrestaShop

In the performances tab of your prestashop:

- Do not enable "Multi-Front synchronisation" if you only have one front server or if your smarty cache is shared 
across all your front servers on the same file system.
- Use the "File System" cache type, not "MySQL"
- Enable the Smarty cache
- Do not enable the Cache from the "Cache" section if you have MySQL (<8) / MariaDB on the same machine, 
  the MySQL query cache will be more efficient. <br />
  If you still want to enable it, if you have only 1 front, use APC, and if you have several front, use a unique
  central memcached server host (not localhost!)
