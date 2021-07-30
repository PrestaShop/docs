---
title: Optimize your Apache httpd configuration
---


## Enabling compression
As you may be aware of, most of the file transiting from the webserver (with the notable exception of pictures) are text based.

And text files are the most efficient to compress. Though disabled by default, enabling compression is a really quick way to reduce transit and speed up your website up to 80%!

First, make sure the deflate module is activated in your httpd configuration file:

```
LoadModule deflate_module modules/mod_deflate.so
```

Then, you can add the following section to you main httpd configuration file:

```
<IfModule deflate_module>
  AddOutputFilterByType DEFLATE text/plain
  AddOutputFilterByType DEFLATE text/css
  AddOutputFilterByType DEFLATE application/json application/x-javascript  text/javascript application/javascript text/js
  AddOutputFilterByType DEFLATE text/xml application/xml application/xml+rss text/javascript application/javascript
  AddOutputFilterByType DEFLATE image/svg+xml
</IfModule>
```

## Enabling browser caching

By default, browser locally store website assets in order to avoid fetching them again next time you visit the same page.

Each browser has its own mecanics about this but the webserver can provide cache control and expiration dates through headers when responding.

Again, this allows to both speed up the page loads and avoid unnecessary traffic

### Cache Control

```
LoadModule headers_module modules/mod_headers.so
```

Then you can add the following configuration parameters:

```
<IfModule mod_headers.c>
 <FilesMatch "\.(ico|jpe?g|png|gif|css|woff2)$">
   Header set Cache-Control "max-age=2592000, public"
 </FilesMatch>
</IfModule>
```

### Expire

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
