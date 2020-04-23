---
title: Optimize your webserver
alias:
- 1.7/optimizations/
---

# Optimize your webserver

We often talk about optimizing the application side but less about the webserver.

Which is a shame as there is a lot to gain from some simple configurations parameters. And you don't need to have hundred of visitors for them to be efficient, either to reduce your server's load or speed up your visitor's browsing.

As we'll see, the configuration options we'll tweak are quite easy and should allow some nice improvements.

# Webserver's function

You may already be aware of, a webserver is a piece of software dedicated to satisfy world wide web requests.

It usually works through the http (and https) protocol and delivers web pages to the clients (your web browser). 

{{< figure src="../img/architecture.png" title="webserver's function" >}}

An interesting point to mention is that, php being compiled server side, it often is the webserver's job to manage this task before sending html to the web browser.

## Testing your optimizations

There are plenty of ways to validate the gains of those improvements but a very simple one is to go check any page speed website.

It will point the required changes and as you'll see, most of them will be straightforward to implement.

{{% notice tip %}}
As usual, the surest way to tune your shop is:

- benchmark
- make a change
- repeat
{{% /notice %}}

### Webservers

We'll show you the different ways to implement those options for both nginx and httpd, the two most popular and widespread webservers.

But before we go on, just a few words about them.
Don't worry, it won't be long before reaching the crunchy part.

#### nginx

It is often said that nginx is faster than httpd, which is not entirely true. Nginx uses an asynchronous mechanism which is very efficient to sustain heavy loads and static assets (such as pictures and scripts) but slightly increases response time for dynamic content (such as, you know php).

#### httpd

Apache's httpd is the usual suspect and the most popular webserver of alls.

Contrary to nginx, it uses threads that directly serves the contents, being locked during the process.

Which means that if the server receives more calls than available threads it won't be able to answer - hence the reputation of being able to handle less traffic than nginx.

### Optimizations

And now to the crunchy part !

#### Enabling compression

As you may be aware of, most of the file transiting from the webserver (with the notable exception of pictures) are text based.

And text files are the most efficient to compress. Though it's disabled by default, enabling compression is a really quick way to reduce transit and speed up your website up to 80%!

##### Nginx configuration

Here is the way to enable gzip compression to your nginx configuration:

```
  gzip on;
  gzip_disable msie6;
  gzip_vary on;
  gzip_proxied any;
  gzip_static on;
  gzip_buffers 16 8k;
  gzip_types text/plain text/css application/json application/x-javascript text/xml application/xml application/xml+rss text/javascript application/javascript image/svg+xml text/js;
  gzip_http_version 1.1;
  gzip_comp_level 6;
  gzip_min_length 1100;
```

##### Httpd configuration

And here is the way to enable gzip compression to your httpd configuration:

First, make sure the deflate module is activated in your httpd configuration file:

```
LoadModule deflate_module modules/mod_deflate.so
```

Then, you can add the following lines to your VirtualHost:

```
AddOutputFilterByType DEFLATE text/plain text/css application/json application/x-javascript text/xml application/xml application/xml+rss text/javascript application/javascript image/svg+xml text/js;
```

#### Enabling browser caching

By default, browser locally store website assets in order to avoid fetching them again next time you visit the same page.

Each browser has its own mecanics about this but the webserver can provide cache control and expiration dates through headers when responding.

Again, this allows to both speed up the page loads and avoid unnecessary traffic.

##### Nginx configuration

Pretty straightforward to enable cache control with nginx:

```
location ~* \.(?:jpg|jpeg|gif|png|ico|css|woff2)$ {
    expires 1M;
    add_header Cache-Control "public";
}
```

##### Httpd configuration

It's a bit different here for httpd where expire and cache control header will be managed apart:

###### Cache Control

```
LoadModule headers_module modules/mod_headers.so
```

Then you can add the following configuration parameters:

```
<IfModule mod_headers.c>
 <FilesMatch "\.(ico|jpe?g|png|gif|css|woff2)$">
 Header set Cache-Control "max-age=2592000, public"
 </FilesMatch>
```

###### Expire

Easy as well for httpd, just make sure that the expire module is enabled:

```
LoadModule expires_module modules/mod_expires.so
```

And then set your own parameters:

```
<IfModule mod_expires.c>

    AddType application/x-font-woff .woff
    AddType image/svg+xml .svg

    ExpiresActive On

    ExpiresDefault "access plus 7200 seconds"
    ExpiresByType image/jpg "access plus 1 month"
    ExpiresByType image/jpeg "access plus 1 month"
    ExpiresByType image/gif "access plus 1 month"
    ExpiresByType image/png "access plus 1 month"
    ExpiresByType image/x-icon "access plus 1 month"
    ExpiresByType application/x-font-woff "access plus 1 month"
    <FilesMatch \.php$>
    # Do not allow PHP scripts to be cached unless they explicitly send cache headers themselves. 
        ExpiresActive Off
    </FilesMatch>
</IfModule>
```
