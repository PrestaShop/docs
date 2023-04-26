---
title: System requirements for PrestaShop 8
menuTitle: System requirements
weight: 10
mostViewedPage: true
---

<style type="text/css">
.h-version-titles th:not(:first-child) {
  text-align: center;
}

.support-yes, .example-yes {
  background-color: #8ce48c;
  text-align: center;
}
.support-no, .example-no {
  background-color: #e89b9b;
}
.example-yes, .example-no {
  display: inline-block;
  width: 1.1rem; 
  height: 1.1rem;
  margin-bottom: -2px;
}
</style>

# System requirements for PrestaShop 8

PrestaShop needs the following server configuration in order to run:

* **System:** Unix, Linux or Windows.
* **Web server:** Apache Web Server 2.2 or any later version.
* **PHP:** We recommend PHP 7.2.5 or later. See the compatibility chart below for more details. 
* **MySQL:** 5.6 minimum, a recent version is recommended.
* **Server RAM:** The more the merrier. We recommend setting the memory allocation per script (`memory_limit`) to a minimum of `256M`.

PrestaShop can also work with Nginx 1.0 or later.

## How to verify your server meets PrestaShop's requirements

You can use our [system requirements tool](https://github.com/PrestaShop/php-ps-info/) to easily check if your environment fulfills PrestaShop's requirements. Here's how:

1. Download the [latest version from GitHub](https://github.com/PrestaShop/php-ps-info/releases).
2. Extract the zip file.
3. Upload the `phppsinfo.php` file to your server and put it inside your current shop's directory or the one where you intend to install it.
4. Open it up on your browser (`http://your-domain.com/path-to-your-prestashop/phppsinfo.php`).
5. Type in the login and password if prompted (use `prestashop` for both).

You'll get a web page detailing requirements and recommendations, and how your server does compared to them:

{{< figure src="../img/phppsinfo.jpg" title="System requirements tool" >}}

## PHP requirements

### PHP compatibility chart

<table>
  <thead>
    <tr>
      <th></th>
      <th colspan="12" style="text-align:center">PHP Version</th>
    </tr>
    <tr class="h-version-titles">
      <th>PrestaShop Version</th>
      <th>&le;&nbsp;7.1</th>
      <th>7.2</th>
      <th>7.3</th>
      <th>7.4</th>
      <th>8.0</th>
      <th>8.1</th>
      <th>&ge;&nbsp;8.2</th>
    </tr>
  </thead>
<tbody>
  <tr>
    <td>8.0</td>
    <td class="support-no"><span class="sr-only">No</span></td>
    <td class="support-yes"><span class="sr-only">Yes</span></td>
    <td class="support-yes"><span class="sr-only">Yes</span></td>
    <td class="support-yes"><span class="sr-only">Yes</span></td>
    <td class="support-yes"><span class="sr-only">Yes</span></td>
    <td class="support-yes">
      <i class="fa fa-check" aria-hidden="true" title="Recommended version"></i>
      <span class="sr-only">Recommended version</span>
    </td>
    <td class="support-no"><span class="sr-only">No</span></td>
  </tr>
</tbody>
</table>

**Legend:**

<i class="fa fa-check" aria-hidden="true"></i> = Recommended version
<span class="example-yes"></span><span class="sr-only">Yes</span> = Supported
<span class="example-no"></span><span class="sr-only">No</span> = Not supported



PrestaShop needs a few additions to PHP and MySQL in order to fully work. Make sure that your PHP configuration has the following extensions and settings configured:

### Extensions

* **CURL**. The [Client URL extension](https://php.net/manual/en/book.curl.php) is used to download remote resources like modules and localization packages.
* **DOM**. The [DOM extension](https://php.net/manual/en/book.dom.php) is needed to parse XML documents. PrestaShop uses it for various functionalities, like the Store Locator. It is also used by some modules, as well as the pear_xml_parse library.
* **Fileinfo**. The [File information extension](https://php.net/manual/en/book.fileinfo.php) is used to find out the file type of uploaded files.
* **GD**. The [GD extension](https://php.net/manual/en/book.image.php) is used to create thumbnails for the images that you upload.
* **Iconv**. The [ICONV extension](https://www.php.net/manual/en/book.iconv.php) is used to convert character sets.
* **Intl**. The [Internationalization extension](https://php.net/manual/en/book.intl.php) is used to display localized data, such as amounts in different currencies.
* **JSON**. The [JSON extension](https://www.php.net/manual/en/json.installation.php) is used to manage JSON format.
* **Mbstring**. The [Multibyte string extension](https://www.php.net/manual/en/book.mbstring.php) to perform string operations everywhere.
* **OpenSSL**. The [OpenSSL extension](https://www.php.net/manual/en/book.openssl.php) is used to improve security.
* **PDO**. The [PHP Data Objects extension](https://www.php.net/manual/en/book.pdo.php) is used to connect to databases.
* **PDO (MySQL)**. The [PDO_MYSQL driver](https://www.php.net/manual/en/ref.pdo-mysql.php) is used to connect to MySQL databases.
* **SimpleXML**. The [SimpleXML extension](https://www.php.net/manual/en/intro.simplexml.php) is used to manage XML files.
* **Zip**. The [Zip extension](https://php.net/manual/en/book.zip.php) is used to expand compressed files such as modules and localization packages.

### Settings

* **`allow_url_fopen` enabled**. This directive enables PrestaShop to access remote files, which is an essential part of the payment process, among others things. It is therefore imperative to have it set to `On`.

Here is a section of the `php.ini` file (the configuration file for PHP):

```ini
extension = php_mysql.dll
extension = php_gd2.dll
allow_url_fopen = On
allow_url_include = Off
```
