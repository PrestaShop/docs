---
title: Optimize your nginx configuration
---

## Enabling compression

As you may be aware of, most of the file transiting from the web server (with the notable exception of pictures) are text based.

And text files are the most efficient to compress. Though disabled by default, enabling compression is a really quick way to reduce transit and speed up your website up to 80%!

**Important:** beware of the associated risk of enabling gzip compression if you are using SSL as noticed in the [ngx_http_gzip_module](http://nginx.org/en/docs/http/ngx_http_gzip_module.html) page.

> When using the SSL/TLS protocol, compressed responses may be subject to [BREACH](https://en.wikipedia.org/wiki/BREACH) attacks.

Here is the way to enable gzip compression to your Nginx configuration:

```nginx
server {
    ...

    gzip on;
    gzip_disable "msie6";

    gzip_vary on;
    gzip_proxied any;
    gzip_comp_level 6;
    gzip_min_length 1000;
    gzip_types
        application/atom+xml
        application/geo+json
        application/javascript
        application/json
        application/ld+json
        application/manifest+json
        application/rdf+xml
        application/rss+xml
        application/x-javascript
        application/xhtml+xml
        application/xml
        font/eot
        font/otf
        font/ttf
        image/svg+xml
        text/css
        text/javascript
        text/plain
        text/xml;

    ...
}
```

## Enabling browser caching

By default, browsers locally store website assets in order to avoid fetching them again next time you visit the same page.

Each browser has its own mechanics about this but the web server can provide cache control and expiration dates through headers when responding.

Again, this allows to both speed up the page loads and avoid unnecessary traffic:

```nginx
location ~* \.(?:css|gif|ico|jpe?g|png|woff2)$ {
    expires 1M;
    add_header Cache-Control "public";
}
```
