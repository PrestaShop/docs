---
title: System requirements for PrestaShop 1.7
menuTitle: System requirements
weight: 10
---

<style type="text/css">
.support-yes, .example-yes {
  background-color: #8ce48c;
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

# System requirements for PrestaShop 1.7

PrestaShop needs the following server configuration in order to run:

* **System:** Unix, Linux or Windows.
* **Web server:** Apache Web Server 2.2 or any later version.
* **PHP:** We recommend PHP 7.1 or later. See the compatibility chart below for more details. 
* **MySQL:** 5.0 minimum, 5.6 or later recommended.
* **Server RAM:** The more the better. We recommend setting the memory allocation per script (`memory_limit`) to a minimum of `256M`.

PrestaShop can also work with NGINX 1.0 or later.


## PHP requirements

### PHP compatibility chart

<table>
  <thead>
    <tr>
      <th></th>
      <th colspan="10" style="text-align:center">PHP Version</th>
    </tr>
    <tr>
      <th>PrestaShop Version</th>
      <th>&lt;=&nbsp;5.1</th>
      <th>5.2</th>
      <th>5.3</th>
      <th>5.4</th>
      <th>5.5</th>
      <th>5.6</th>
      <th>7.0</th>
      <th>7.1</th>
      <th>7.2</th>
      <th>&gt;=&nbsp;7.3</th>
    </tr>
  </thead>
<tbody>
  <tr>
    <td>1.6.1.x</td>
    <td class="support-no"><span class="sr-only">No</span></td>
    <td class="support-yes"><span class="sr-only">Yes</span></td>
    <td class="support-yes"><span class="sr-only">Yes</span></td>
    <td class="support-yes"><span class="sr-only">Yes</span></td>
    <td class="support-yes"><span class="sr-only">Yes</span></td>
    <td class="support-yes"><span class="sr-only">Yes</span></td>
    <td class="support-yes"><span class="sr-only">Yes</span></td>
    <td class="support-yes">
      <i class="fa fa-check" aria-hidden="true" title="title="Recommended version"></i>
      <span class="sr-only">Recommended version</span>
    </td>
    <td class="support-no"><span class="sr-only">No</span></td>
    <td class="support-no"><span class="sr-only">No</span></td>
  </tr>
  <tr>
    <td>1.7.0 ~ 1.7.3</td>
    <td class="support-no"><span class="sr-only">No</span></td>
    <td class="support-no"><span class="sr-only">No</span></td>
    <td class="support-no"><span class="sr-only">No</span></td>
    <td class="support-yes"><span class="sr-only">Yes</span></td>
    <td class="support-yes"><span class="sr-only">Yes</span></td>
    <td class="support-yes"><span class="sr-only">Yes</span></td>
    <td class="support-yes"><span class="sr-only">Yes</span></td>
    <td class="support-yes">
      <i class="fa fa-check" aria-hidden="true" title="title="Recommended version"></i>
      <span class="sr-only">Recommended version</span>
    </td>
    <td class="support-no"><span class="sr-only">No</span></td>
    <td class="support-no"><span class="sr-only">No</span></td>
  </tr>
  <tr>
    <td>1.7.4</td>
    <td class="support-no"><span class="sr-only">No</span></td>
    <td class="support-no"><span class="sr-only">No</span></td>
    <td class="support-no"><span class="sr-only">No</span></td>
    <td class="support-no"><span class="sr-only">No</span></td>
    <td class="support-no"><span class="sr-only">No</span></td>
    <td class="support-yes"><span class="sr-only">Yes</span></td>
    <td class="support-yes"><span class="sr-only">Yes</span></td>
    <td class="support-yes">
      <i class="fa fa-check" aria-hidden="true" title="title="Recommended version"></i>
      <span class="sr-only">Recommended version</span>
    </td>
    <td class="support-no"><span class="sr-only">No</span></td>
    <td class="support-no"><span class="sr-only">No</span></td>
  </tr>
  <tr>
    <td>1.7.5 ~ 1.7.6</td>
    <td class="support-no"><span class="sr-only">No</span></td>
    <td class="support-no"><span class="sr-only">No</span></td>
    <td class="support-no"><span class="sr-only">No</span></td>
    <td class="support-no"><span class="sr-only">No</span></td>
    <td class="support-no"><span class="sr-only">No</span></td>
    <td class="support-yes"><span class="sr-only">Yes</span></td>
    <td class="support-yes"><span class="sr-only">Yes</span></td>
    <td class="support-yes"><span class="sr-only">Yes</span></td>
    <td class="support-yes">
      <i class="fa fa-check" aria-hidden="true" title="title="Recommended version"></i>
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
* **Intl**. The [Internationalization extension](https://php.net/manual/en/book.intl.php) is used to display localized data, such as amounts in different currencies.
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
