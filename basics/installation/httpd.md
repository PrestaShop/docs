---
title: Configure Apache Http
menuTitle: Apache Http
weight: 20
---

# Configure Apache Httpd

The following file is provided as an example configuration for your Apache server.
It may be incomplete, and remember you must adapt it for your own server's needs!

> In Apache 2.4, `Order Allow,Deny` has been replaced by `Require all granted`. 
> We assume you are using Apache Http 2.4 or higher.


## With mod_php/PHP-CGI

```apache
<VirtualHost *:80> # or 443 for SSL support

    ServerName example.com
    DocumentRoot /path/to/prestashop

    # SSLEngine on
    # SSLCertificateFile /etc/apache2/ssl/example.crt
    # SSLCertificateKeyFile /etc/apache2/ssl/example.key

    <Directory /path/to/prestashop>
        # enable the .htaccess rewrites
        AllowOverride All
        Options +Indexes
        Require all granted
        
        # Disable back office token
        # SetEnv _TOKEN_ disabled
    </Directory>

    ErrorLog /var/log/apache2/prestashop.error.log
    CustomLog /var/log/apache2/prestashop.access.log combined
</VirtualHost>
```


## With PHP-FPM

You first have to ensure you have the `php-fpm` binary and Apache's FastCGI installed.
On a Debian based, packages are `libapache2-mod-fcgid` and `php7.2-fpm`.

After installing these packages, fpm service will automatically be started.
PHP-FPM uses so-called pools to handle incoming FastCGI requests. 

Here's an example:

```ini
; a pool called www
[www]
user = www-data
group = www-data

; use a unix domain socket
listen = /var/run/php/php7.2-fpm.sock
; or listen on a TCP socket
; listen = 127.0.0.1:9000

```

You also need to enable few modules that are required for the configuration of multiple PHP versions with Apache.

```bash
a2enmod alias proxy proxy_fcgi
```

Finally, configure the Apache VirtualHost to run with FPM/FastCGI.
Don't forget to edit this configuration to make it works.

```apache
<VirtualHost *:80> # or 443 for SSL support

    ServerName example.com
    DocumentRoot /path/to/prestashop

    # SSLEngine on
    # SSLCertificateFile /etc/apache2/ssl/example.crt
    # SSLCertificateKeyFile /etc/apache2/ssl/example.key

    # Uncomment the following line to force Apache to pass the Authorization
    # header to PHP: required for "basic_auth" under PHP-FPM and FastCGI
    #
    # SetEnvIfNoCase ^Authorization$ "(.+)" HTTP_AUTHORIZATION=$1

    # For Apache 2.4 or higher
    # Using SetHandler avoids issues with using ProxyPassMatch in combination
    # with mod_rewrite or mod_autoindex
    <FilesMatch \.php$>
        # SetHandler proxy:fcgi://127.0.0.1:9000
        SetHandler proxy:unix:/var/run/php/php7.2-fpm.sock|fcgi://dummy
    </FilesMatch>

    DocumentRoot /path/to/prestashop
    <Directory /path/to/prestashop>
        # enable the .htaccess rewrites
        AllowOverride All
        Options +Indexes
        Require all granted
        
        # Disable back office token
        # SetEnv _TOKEN_ disabled
    </Directory>

    ErrorLog /var/log/apache2/prestashop.error.log
    CustomLog /var/log/apache2/prestashop.access.log combined
</VirtualHost>
```
