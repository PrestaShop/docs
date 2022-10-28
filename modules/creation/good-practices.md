---
title: Good practices for developing modules
menuTitle: Good practices
---

# Good practices for developing modules

## DOs and DON'Ts

### Do

- Add a link to your documentation included in your ZIP File and to your support page on Addons in the module interface.
- Follow our [Coding Standards][coding-standards]
- Create your own database tables, do not alter PrestaShop's.
- Develop your module in English, then use PrestaShop translation system to translate your module.
- Go through directories using PrestaShop constants like: `_PS_CONFIG_DIR_ . '/config.inc.php'`
- `CREATE TABLE` SQL statements must be followed by `IF NOT EXISTS` to avoid SQL errors
- `DROP TABLE` SQL statements must be followed by `IF EXISTS` to avoid SQL errors

### Don't

- Don't insert external links into your module code or module documentation.
- Don't provide your personal contact details in your module or module documentation.
- Don't send your customers to your own support/ticket management platform.
- Don't use external ajax files to perform ajax tasks.
- Don't go through directories using code and variables like: `dirname(__FILE__).'/../../config/config.inc.php'`
- Don't edit the SQL structure of PrestaShop tables.
- Don't obfuscate your code, making it not human readable.
- Don't use global variables to avoid any conflict. Also global variables are usually considered a bad practice.

## A few recommendations for your modules

- Prefix what belongs to you:
  - modules
  - configuration parameters (ps_configuration)
  - Smarty variables
  - tables
  - CSS classes
  
- Consider deleting your configurations, tables, admin tabs, and all other entities unique to your product during the uninstallation of your modules.

- You shouldn't use HTML code in your PHP code. Here are alternatives to separate the view into your code:
  - display content with [Smarty][display-content-front-office]
  - use [helpers][adding-configuration-page] for your configuration pages
  - include [PrestUI](https://github.com/Scritik/prestui), a graphic library created by the community for your configuration pages.

- We recommend you to make your module interface matches the [PrestaShop's UI kit](https://cdn.rawgit.com/PrestaShop/prestashop-ui-kit/master/index.html).

- For modules compatible before the 1.7 PrestaShop version, the minimal compatibility has to be PHP 5.3. You will be then able to use, for example, namespaces.

- If your module allows the upload of a file, check the type of the file to make sure you avoid security issues. Here are more information for the function [mime_content_type()](https://php.net/manual/en/function.mime-content-type.php).

- When your module has forms, you should:
  - show a confirmation message if everything went fine or an error message if it did not.
  - make sure information entered by customers are correct. If you ask a sum, it has to be only numbers. More information about the Validate class of PrestaShop [here](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/Validate.php).

- Consider carefully casting your variables and use pSQL/bqSQL in the SQL requests to avoid any injections (read [Best Practices of the Db Class](https://docs.prestashop-project.org/1-6-documentation/developer-guide/developer-tutorials/best-practices-of-the-db-class)). Make sure your files are properly protected (especially if your module uses a cron for example) to avoid anyone being able to execute them. As a result, you are required to use a token!

- The use of overrides is permitted, however if we decide that too many (2 / 3 max) have been used and/or the modifications are too dangerous, we will refuse your module. If you're unsure, don't hesitate to get in touch.

- If you need to load a .js or .tpl (containing JavaScript) to the backoffice, put restrictions in place on your hooks (hookbackofficeheader/top/footer)! Specific examples: if your JS only applies to your module's configuration page, use:  
  
  ```php
  <?php
  if (Tools::getValue('configure') === $this->name) {
    // code
  }
  ```

- A merchant is likely to have a shop running on a different shop than yours. In case a module is using PHP extensions not installed by default by PHP,
add a preliminary check before using them (I.e with `extension_loaded`). This prevents fatal errors to be thrown on shops on which these extensions aren’t enabled.

- If you need to store static files: we recommend putting temporary or cache files in prestashop's `/var/cache/<env>/modules/YOUR_MODULE/` directory, and static or shared files in prestashop's  `/var/modules/YOUR_MODULE/` directory. Writing in the `/modules` directory is not recommended, because doing so will make it harder to use your module in distributed environments. In addition, by storing files outside your module's directory, they are kept even if the module is uninstalled.

## A few recommendations for your themes

- PrestaShop does not yet feature a "theme validator". However, each of the modules present in your theme must be tested via our [Validator](https://validator.prestashop.com).
- Don't remove the default hooks in PrestaShop, whether via PHP or in the theme! You will risk preventing a third party module from working properly.
- Prefix what belongs to you:
  - modules
  - image standards
- You should not have HTML in your PHP code; use Smarty or helper classes for views.
- We do not accept themes using the PrestaShop base theme to which only color, font and image changes etc. have been made. You should create a unique theme!  :-)
- You should keep the store logo by default in your theme's zip, in the header and footer of your theme.

**A few recommendations for your email templates**

- Use our [official SDK](https://github.com/PrestaShopCorp/email-templates-sdk) to develop your emails: 
- Make sure to submit on Addons a valid zip, built with the SDK.
- Test your emails with the [official module](https://github.com/PrestaShopCorp/email-templates-sdk).

[coding-standards]: {{< ref "8/development/coding-standards" >}}
[display-content-front-office]: {{< ref "8/modules/creation/displaying-content-in-front-office" >}}
[adding-configuration-page]: {{< ref "8/modules/creation/adding-configuration-page" >}}
