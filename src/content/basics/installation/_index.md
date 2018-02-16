---
title: Installation
weight: 15
---

# Setting Up Your Local Development Environment

Now that you intend to develop for PrestaShop, you are better off keeping all your development work on your machine. The main advantage is that it makes it possible for you to entirely bypass the process of uploading your file on your online server in order to test it. Another advantage is that a local test environment enables you to test code without the risk of breaking your production store. Have a local environment is the essential first step in the path of web development.

## Installing PrestaShop locally

### Prerequisites

PrestaShop needs the following server configuration in order to run:

* System: Unix, Linux or Windows.
* Web serve: Apache Web Server 1.3 or any later version.
* PHP: 5.4 or later.
* MySQL: 5.0 or later.
* Server RAM: The more the better…

PrestaShop can also work with Microsoft’s IIS Web server 6.0 or later, and nginx 1.0 or later.

### Installing a local environment

Installing any web-application locally requires that you first install the adequate environment, namely the Apache web server, the PHP language interpreter, the MySQL database server, and ideally the phpMyAdmin tool. This is called an *AMP package: Apache+MySQL+PHP and the operating system, giving WAMP (Windows+Apache+MySQL+PHP), MAMP (Mac OS X+…) and LAMP (Linux+…). Since all of the items packaged are open-source, these installers are most of the time free.

Here is a selection of free AMP installer:

* XAMPP: http://www.apachefriends.org/en/xampp.html (Windows, Mac OS X, Linux, Solaris)
* WampServer: http://www.wampserver.com/en/ (Windows)
* EasyPHP: http://www.easyphp.org/ (Windows)
* MAMP: http://www.mamp.info/ (Mac OS X)

### Configuring PHP

PrestaShop needs a few additions to PHP and MySQL in order to fully work. Make sure that your PHP configuration has the following settings and tools:

* GD library. The GD library (https://libgd.github.io/pages/about.html) enables PrestaShop to rework images that you upload, especially resizing them.
* Dom extension. The Dom extension enables to parse XML documents. PrestaShop uses it for various functionalities, like the Store Locator. It is also used by some modules, as well as the pear_xml_parse library.
* `allow_url_fopen enabled`. The `allow_url_fopen directive` enables modules to access remote files, which is an essential part of the payment process, among others things. It is therefore imperative to have it set to ON.

Here is a section of the `php.ini` file (the configuration file for PHP):

```ini
extension = php_mysql.dll
extension = php_gd2.dll
allow_url_fopen = On

# also recommended
register_globals = Off
magic_quotes_gpc = Off
allow_url_include = Off
```

### Downloading and extracting the PrestaShop files

You can download the latest version of PrestaShop at http://www.prestashop.com/en/downloads.

You can download the (unstable) development version on Github: https://github.com/PrestaShop/PrestaShop/archive/develop.zip.

Extract the PrestaShop files, and put them in the root folder of the AMP installer you chose:

* XAMPP: C:\xampp\htdocs or /Applications/xampp/htdocs
* WampServer: C:\wamp\www
* EasyPHP: C:\easyphp\www
* MAMP: /Applications/MAMP/htdocs/

#### Creating a database for your local shop

Open the phpMyAdmin tool using your browser. Its location depends on the AMP pack you chose:

* http://127.0.0.1/phpmyadmin (XAMPP, WampServer, MAMP),
* http://127.0.0.1/mysql (EasyPHP)

In the “Databases” tab, indicate the database name you want and validate by clicking on the “Create a database” button.

#### Installing PrestaShop

Open the PrestaShop installer, which should be located at http://127.0.0.1/prestashop/install, and follow its instructions.

You can read the Getting Started guide for more details: http://doc.prestashop.com/display/PS17/Getting+Started.



## Keeping things secure

Once your module is online, its files could be accessed by anyone from the Internet. Even if they cannot trigger anything but PHP errors, you might want to prevent this from happening.

You can achieve this by adding an `index.php` file at the root of any module folder you create. Here is a suggestion for what to put in the file.

```php
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header("Last-Modified: ".gmdate("D, d M Y H:i:s")." GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
header("Location: ../");
exit;
```
