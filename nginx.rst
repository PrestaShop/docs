ask firstred
https://gitter.im/PrestaShop/General?at=57079f8cc65c9a6f7f27df90
also
https://www.prestashop.com/forums/topic/519123-config-prestashop-17-and-nginx/

Copied and paste configuration from Michael Dekker (see forum link)

.. code-block:: nginx

  server {
      listen 80;
      listen [::]:80;   #Use this to enable IPv6
      server_name www.example.com;
      root /var/www/prestashop17;
      access_log /var/log/nginx/access.log;
      error_log /var/log/nginx/error.log;
  
      index index.php index.html;
  
      location = /favicon.ico {
          log_not_found off;
          access_log off;
      }
  
      location = /robots.txt {
          auth_basic off;
          allow all;
          log_not_found off;
          access_log off;
      }   
  
      # Deny all attempts to access hidden files such as .htaccess, .htpasswd, .DS_Store (Mac).
      location ~ /\. {
          deny all;
          access_log off;
          log_not_found off;
      }
  
      ##
      # Gzip Settings
      ##
  
      gzip on;
      gzip_disable "msie6";
      gzip_vary on;
      gzip_proxied any;
      gzip_comp_level 1;
      gzip_buffers 16 8k;
      gzip_http_version 1.0;
      gzip_types application/json text/css application/javascript;
  
      rewrite ^/[a-zA-Z][a-zA-Z]/(index\.php.*)$ /$1 last;  #Remove language code when index.php is called directly
      rewrite ^/api/?(.*)$ /webservice/dispatcher.php?url=$1 last;
      rewrite ^/([0-9])(-[_a-zA-Z0-9-]*)?(-[0-9]+)?/.+.jpg$ /img/p/$1/$1$2$3.jpg last;
      rewrite ^/([0-9])([0-9])(-[_a-zA-Z0-9-]*)?(-[0-9]+)?/.+.jpg$ /img/p/$1/$2/$1$2$3$4.jpg last;
      rewrite ^/([0-9])([0-9])([0-9])(-[_a-zA-Z0-9-]*)?(-[0-9]+)?/.+.jpg$ /img/p/$1/$2/$3/$1$2$3$4$5.jpg last;
      rewrite ^/([0-9])([0-9])([0-9])([0-9])(-[_a-zA-Z0-9-]*)?(-[0-9]+)?/.+.jpg$ /img/p/$1/$2/$3/$4/$1$2$3$4$5$6.jpg last;
      rewrite ^/([0-9])([0-9])([0-9])([0-9])([0-9])(-[_a-zA-Z0-9-]*)?(-[0-9]+)?/.+.jpg$ /img/p/$1/$2/$3/$4/$5/$1$2$3$4$5$6$7.jpg last;
      rewrite ^/([0-9])([0-9])([0-9])([0-9])([0-9])([0-9])(-[_a-zA-Z0-9-]*)?(-[0-9]+)?/.+.jpg$ /img/p/$1/$2/$3/$4/$5/$6/$1$2$3$4$5$6$7$8.jpg last;
      rewrite ^/([0-9])([0-9])([0-9])([0-9])([0-9])([0-9])([0-9])(-[_a-zA-Z0-9-]*)?(-[0-9]+)?/.+.jpg$ /img/p/$1/$2/$3/$4/$5/$6/$7/$1$2$3$4$5$6$7$8$9.jpg last;
      rewrite ^/([0-9])([0-9])([0-9])([0-9])([0-9])([0-9])([0-9])([0-9])(-[_a-zA-Z0-9-]*)?(-[0-9]+)?/.+.jpg$ /img/p/$1/$2/$3/$4/$5/$6/$7/$8/$1$2$3$4$5$6$7$8$9$10.jpg last;
      rewrite ^/c/([0-9]+)(-[.*_a-zA-Z0-9-]*)(-[0-9]+)?/.+.jpg$ /img/c/$1$2$3.jpg last;
      rewrite ^/c/([a-zA-Z_-]+)(-[0-9]+)?/.+.jpg$ /img/c/$1$2.jpg last;
      location /admin-dev/ {                           #Change this to your admin folder
          if (!-e $request_filename) {
              rewrite ^/.*$ /admin-dev/index.php last; #Change this to your admin folder
          }
      }
      location / {
          if (!-e $request_filename) {
              rewrite ^/.*$ /index.php last;
          }
      }
  
      location ~ .php$ {
          fastcgi_split_path_info ^(.+.php)(/.*)$;
          try_files $uri =404;
          fastcgi_keep_conn on;
          include /etc/nginx/fastcgi_params;
          fastcgi_pass 127.0.0.1:9000;  #Change this to your PHP-FPM location
          fastcgi_index index.php;
          fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
     }
  }
