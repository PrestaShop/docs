---
title: System requirements for PrestaShop 1.7
menuTitle: System requirements
weight: 10
---

# System requirements for PrestaShop 1.7

PrestaShop needs the following server configuration in order to run:

* System: Unix, Linux or Windows.
* Web server: Apache Web Server 2.2 or any later version.
* PHP:
    - {{% minver v="1.7.0~1.7.3" %}} PHP 5.4 or later
    - {{% minver v="1.7.4" %}} PHP 5.6 or later
* MySQL: 5.0 or later.
* Server RAM: The more the better…

PrestaShop can also work with Microsoft’s IIS Web server 6.0 or later, and nginx 1.0 or later.

## PHP requirements

PrestaShop needs a few additions to PHP and MySQL in order to fully work. Make sure that your PHP configuration has the following settings and tools:

### Extensions

* **CURL**. The [Client URL extension](http://php.net/manual/en/book.curl.php) is used to download remote resources like modules and localization packages.
* **DOM**. The [DOM extension](http://php.net/manual/en/book.dom.php) is needed to parse XML documents. PrestaShop uses it for various functionalities, like the Store Locator. It is also used by some modules, as well as the pear_xml_parse library.
* **Fileinfo**. The [File information extension](http://php.net/manual/en/book.fileinfo.php) is used to find out the file type of uploaded files.
* **GD**. The [GD extension](http://php.net/manual/en/book.image.php) is used to create thumbnails for the images that you upload.
* **Intl**. The [Internationalization extension](http://php.net/manual/en/book.intl.php) is used to display localized data, such as amounts in different currencies.
* **Zip**. The [Zip extension](http://php.net/manual/en/book.zip.php) is used to expand compressed files such as modules and localization packages.

### Settings

* **`allow_url_fopen` enabled**. This directive enables PrestaShop to access remote files, which is an essential part of the payment process, among others things. It is therefore imperative to have it set to `On`.

Here is a section of the `php.ini` file (the configuration file for PHP):

```ini
extension = php_mysql.dll
extension = php_gd2.dll
allow_url_fopen = On
allow_url_include = Off
```
