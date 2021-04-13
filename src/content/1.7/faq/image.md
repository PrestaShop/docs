---
title: Image FAQ
---

# Image FAQ

**Q:** Why can I not use more than 9 999 999 images?

**A:** The limitation of the [.htaccess](https://httpd.apache.org/docs/2.4/howto/htaccess.html) file prevents the use of more than 9 999 999 images because there is a limit of 9 back references ($1, $2, $3,... $9) in mod_rewrite.
The $10 $11 etc back references are being interpreted as just $1.

You can exceed this limitation by adding the needed rules in your .htaccess file:

```ini
RewriteCond %{HTTP_HOST} ^www.my-domain.com$
RewriteRule ^0([0-9])([0-9])([0-9])([0-9])([0-9])([0-9])([0-9])(\-[_a-zA-Z0-9-]*)?(-[0-9]+)?/.+\.jpg$ %{ENV:REWRITEBASE}img/p/0/$1/$2/$3/$4/$5/$6/$7/0$1$2$3$4$5$6$7$8$9.jpg [L]
RewriteRule ^1([0-9])([0-9])([0-9])([0-9])([0-9])([0-9])([0-9])(\-[_a-zA-Z0-9-]*)?(-[0-9]+)?/.+\.jpg$ %{ENV:REWRITEBASE}img/p/1/$1/$2/$3/$4/$5/$6/$7/1$1$2$3$4$5$6$7$8$9.jpg [L]
RewriteRule ^2([0-9])([0-9])([0-9])([0-9])([0-9])([0-9])([0-9])(\-[_a-zA-Z0-9-]*)?(-[0-9]+)?/.+\.jpg$ %{ENV:REWRITEBASE}img/p/2/$1/$2/$3/$4/$5/$6/$7/2$1$2$3$4$5$6$7$8$9.jpg [L]
RewriteRule ^3([0-9])([0-9])([0-9])([0-9])([0-9])([0-9])([0-9])(\-[_a-zA-Z0-9-]*)?(-[0-9]+)?/.+\.jpg$ %{ENV:REWRITEBASE}img/p/3/$1/$2/$3/$4/$5/$6/$7/3$1$2$3$4$5$6$7$8$9.jpg [L]
RewriteRule ^4([0-9])([0-9])([0-9])([0-9])([0-9])([0-9])([0-9])(\-[_a-zA-Z0-9-]*)?(-[0-9]+)?/.+\.jpg$ %{ENV:REWRITEBASE}img/p/4/$1/$2/$3/$4/$5/$6/$7/4$1$2$3$4$5$6$7$8$9.jpg [L]
RewriteRule ^5([0-9])([0-9])([0-9])([0-9])([0-9])([0-9])([0-9])(\-[_a-zA-Z0-9-]*)?(-[0-9]+)?/.+\.jpg$ %{ENV:REWRITEBASE}img/p/5/$1/$2/$3/$4/$5/$6/$7/5$1$2$3$4$5$6$7$8$9.jpg [L]
RewriteRule ^6([0-9])([0-9])([0-9])([0-9])([0-9])([0-9])([0-9])(\-[_a-zA-Z0-9-]*)?(-[0-9]+)?/.+\.jpg$ %{ENV:REWRITEBASE}img/p/6/$1/$2/$3/$4/$5/$6/$7/6$1$2$3$4$5$6$7$8$9.jpg [L]
RewriteRule ^7([0-9])([0-9])([0-9])([0-9])([0-9])([0-9])([0-9])(\-[_a-zA-Z0-9-]*)?(-[0-9]+)?/.+\.jpg$ %{ENV:REWRITEBASE}img/p/7/$1/$2/$3/$4/$5/$6/$7/7$1$2$3$4$5$6$7$8$9.jpg [L]
RewriteRule ^8([0-9])([0-9])([0-9])([0-9])([0-9])([0-9])([0-9])(\-[_a-zA-Z0-9-]*)?(-[0-9]+)?/.+\.jpg$ %{ENV:REWRITEBASE}img/p/8/$1/$2/$3/$4/$5/$6/$7/8$1$2$3$4$5$6$7$8$9.jpg [L]
RewriteRule ^9([0-9])([0-9])([0-9])([0-9])([0-9])([0-9])([0-9])(\-[_a-zA-Z0-9-]*)?(-[0-9]+)?/.+\.jpg$ %{ENV:REWRITEBASE}img/p/9/$1/$2/$3/$4/$5/$6/$7/9$1$2$3$4$5$6$7$8$9.jpg [L]
```

after

```ini
# ~~end~~ Do not remove this comment, Prestashop will keep automatically the code outside this comment when .htaccess will be generated again
```
