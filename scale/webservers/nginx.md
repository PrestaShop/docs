---
title: Optimize your nginx configuration
---

## Enabling compression

As you may be aware of, most of the file transiting from the web server (with the notable exception of pictures) are text based.

And text files are the most efficient to compress. Though disabled by default, enabling compression is a really quick way to reduce transit and speed up your website up to 80%!

Here is the way to enable gzip compression to your Nginx configuration:

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

## Enabling browser caching

By default, browsers locally store website assets in order to avoid fetching them again next time you visit the same page.

Each browser has its own mechanics about this but the web server can provide cache control and expiration dates through headers when responding.

Again, this allows to both speed up the page loads and avoid unnecessary traffic:

```
location ~* \.(?:css|gif|ico|jpe?g|png|woff2)$ {
    expires 1M;
    add_header Cache-Control "public";
}
```
