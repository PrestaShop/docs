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
location ~* \.(?:css|eot|gif|ico|jpe?g|otf|png|ttf|woff2?)$ {
    expires 1M;
    add_header Cache-Control "public";
}
```

## Access logging

Logging every request consumes both CPU and I/O cycles, and there are several ways to reduce the impact of access logging.

Make sure to review the documentation of the [ngx_http_log_module](http://nginx.org/en/docs/http/ngx_http_log_module.html) when modifying this directive.

### Enable access‑log buffering

With buffering, instead of performing a separate write operation for each log entry, Nginx buffers a series of entries and writes them to the file together in a single operation.

This is comprehensively explained in the *Access Logging* section of the [Tuning NGINX for Performance](https://www.nginx.com/blog/tuning-nginx/) article in the Nginx blog.

### Disable access logging for specific locations

You can also disable access logging for specific locations such as `favicon.ico` and `robots.txt`.

```nginx
location = /favicon.ico {
    access_log off;
    log_not_found off;
}

location = /robots.txt {
    access_log off;
    log_not_found off;
}
```

Notice we are using the exact match modifier `=` to speed up the processing of these requests.

### Turn off access logging

If your PrestaShop installation does not require access logging, you can use the special value `off` in the `access_log` directive to completely disable access logging.

```nginx
server {
    ...
    access_log off
    ...
}
```

### Allow usage of `.well-known` directory (Let's Encrypt / PKI validation, Apple Pay)

The `.well-known` directory is a resource documented in [RFC 8615](https://datatracker.ietf.org/doc/html/rfc8615) and used by [many services](https://en.m.wikipedia.org/wiki/Well-known_URI).
If you need an external access to the `.well-known` directory, you can update you nginx configuration to use:

```nginx
# .htaccess, .DS_Store, .htpasswd, etc., but keep .well-known available
location ~* /\.(?!well-known\/) {
    deny all;
}

# files in .well-known should be served as plain text.
location ~* ^/\.well-known\/ {
    default_type text/plain;
}
```
