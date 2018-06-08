---
title: Good practices for developing modules
menuTitle: Good practices
---

# Good practices for developing modules

## DOs and DON'Ts

### Do

- Add a link to your documentation included in your ZIP File and to your support page on Addons in the module interface.
- Follow the PSR-2 standard for modules destined for PS 1.6.1.0 +: http://doc.prestashop.com/display/PS16/Coding+Standards
- Create your own tables!
- Develop your module in English, then use PrestaShop translation system to translate your module.
- Go through directories using using PrestaShop variables like: `_PS_CONFIG_DIR_ . '/config.inc.php'`

### Don't

- Don't insert external links into your module code or module documentation.
- Don't provide your personal contact details in your module or module documentation.
- Don't send your customers to your own support/ticket management platform.
- Don't use external ajax files to perform ajax tasks.
- Don't go through directories using code and variables like: `dirname(__FILE__).'/../../config/config.inc.php'`
- Don't edit the SQL structure of PrestaShop tables.

## A few recommendations for your modules

- Prefix what belongs to you:
	- modules
	- configuration parameters (ps_configuration)
	- tables
	- CSS classes
	
- Consider deleting your configurations, tables, and other entities unique to your product during the de-installation of your modules.

- You shouldn't use HTML code in your PHP code. Here are alternatives to separate the view into your code:
	- display content with [Smarty](http://doc.prestashop.com/display/PS16/Displaying+content+on+the+front+office)
	- use [helpers](http://doc.prestashop.com/display/PS16/Adding+a+configuration+page) for your configuration pages
	- include [PrestUI](https://github.com/Scritik/prestui), a graphic library created by the community for your configuration pages.

- Your module interface has to match the back office interface. Customized interfaces aren’t validated/accepted. Please use the alternatives explained before to help you create an interface that matches merchants' BO.

- For modules compatible before the 1.7 PrestaShop version, the minimal compatibility has to be PHP 5.3. You will be then able to use, for example, namespaces.

- If you add function to add a file, check the type of the file to make sure you avoid security issues. Here are more information for the function [mime_content_type()](http://php.net/manual/en/function.mime-content-type.php).

- When uninstalling the module, delete all tabs you might have added during the installation.

- When your module has forms, you should:
	- show a confirmation message if everything is fine or an error message if not.
	- make sure information entered by customers are correct. If you ask a sum, it has to be only numbers. More information about the Validate class of PrestaShop [here](https://github.com/PrestaShop/PrestaShop/blob/develop/classes/Validate.php).

- Consider carefully casting your variables and use pSQL/bqSQL in the SQL requests to avoid any injections (read http://doc.prestashop.com/display/PS16/Best+Practices+of+the+Db+Class). Make sure your files are properly protected (especially if your module uses a cron for example) to avoid anyone being able to execute them. As a result,you are required to use a token!

- The use of overrides is permitted, however if we decide that too many (2 / 3 max) have been used and/or the modifications are too dangerous, we will refuse your module. If you're unsure, don't hesitate to get in touch.

- If you need to upload a .js or .tpl (containing JavaScript) to the back-office, put restrictions in place on your back-office hooks (hookbackofficeheader/top/footer)! Specific examples: If your JS only applies to your module's configuration page, use:  
	
	```php
	if (Tools::getValue('configure') === $this->name) {
		// code
	}
	```

## A few recommendations for your themes

- PrestaShop does not yet feature a "theme validator". However, each of the modules present in your theme must be tested via our Validator: http://validator.prestashop.com
- Don't remove the default hooks in PrestaShop, whether via PHP or in the theme! You will risk preventing a third party module from working properly.
- Prefix what belongs to you:
	- modules
	- image standards
- You should not have HTML in your PHP code; use Smarty or helper classes for views.
- We do not accept themes using the PrestaShop base them to which only color, font and image changes etc. have been made. You should create a unique theme!  :-)
- You should keep the store logo by default in your theme's zip, in the header and footer of your theme.

**A few recommendations for your email templates**

- Use our official SDK to develop your emails: https://github.com/PrestaShop/email-templates-sdk
- Make sure to submit on Addons a valid zip, built with the SDK.
- Test your emails with the official module: https://github.com/PrestaShop/email-templates-sdk
