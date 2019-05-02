---
title: Technical validation - Key steps
---

# Technical Validation: key steps

Have you ever wondered how the PrestaShop Addons Team proceeds with the validation ?

We are going to show you how to spare time so that you can pretty much "validate" your own module before submitting it to the Addons Marketplace.
First you might want to read the [Technical Tools]({{<ref "1.7/modules/sell/technical-tools" >}}) and the [Good Practices]({{<ref "1.7/modules/creation/good-practices" >}}). 

### 1. The Basics

As you probably know, there are 3 types of submissions : New, Minor update, Major update.
We do not handle them with the same standards:

- We are very strict and meticulous when it comes to New modules.
- For major updates, we have the exact same verifications that the New modules.
- For minor updates, we verify the validator and we also have a Diff Tool to only see the modifications.

Let's now give you more details on how we handle them all.

### 2. Processing of New and Major updates

What is a "New" Module? 
Actually, it is a zip file. Your module is the product and since you can submit several zips per product, let's use the right words.

Simple: the very first time you submit a zip for your module, it is called a "New" zip.
Please, do not try to submit your module if you have never used the [Validator](https://validator.prestashop.com/).
That tool is very powerful and useful and it will make everybody win a lot of time.

After meeting each requirement provided by the Validator, here's a list of extra points we check: 

* The presence of DROP/ALTER of PrestaShop tables.
    * It's highly forbidden to apply any changes on PrestaShop Core tables. It's very very dangerous and we don't allow any risk.

* Except for [Payment Modules](https://github.com/PrestaShop/paymentexample/blob/master/paymentexample.php#L150), the use of iframes is STRICTLY FORBIDDEN.

* Every hook. If any of them is empty, we decline the zip.
    * There are other things we decline like loading a JS file in the whole back office when it is unnecessary. Make sure to only load what you need, when you need it.

* Missing index.php files in your directories ? We decline.
    * For [security reasons]({{<ref "1.7/modules/creation#keeping-things-secure" >}}), we strongly recommend you comply with this rule. Note that we have [a tool](https://github.com/jmcollin/autoindex) to help you fix that easily.

* Modules are required to follow a specific folder convention. Files must be in the right folder.
    * For example JS and CSS files must be inside views/. The Validator will check this. Make sure to respect that as much as possible !

* We examine every SQL request to make sure you did cast your variables. Use (int) or pSQL() accordingly. 

* If you have php files to handle ajax or external calls, make sure to secure that file.
    * In order to do that, we invite you to create a unique token during the module's install and use it during the call verification.

* The use of serialize() is forbidden.
    * But you can use base64_encode. However, we only allow it when it comes to communicating with an external service. 

* Do not load any external content.
    * Either javascript, css, image, zip, whatever, it is not allowed. We even saw some modules downloading another module. The zip you send to PrestaShop Addons must be totally self-sufficient. 

**Attention**:
We do have extra rules for Payment Modules as this type of modules require higher security.
Note that there are some modules which create the Order with a pending order status before the payment processing (1). While other wait for the payment system's approval to create it (2).

* Make sure you double check the id_cart before creating the order.
    * The purpose is to make sure another customer cannot validate a cart which isn't his.

* if (2), make sure the amount you use to validateOrder() comes from the external payment system. Do not use Cart->getOrderTotal();
    * For security reasons, always proceed as explained.

* For (2), when receiving a call to process the payment, make sure you double check the source of the call using a signature or a token. Those values must not be known of all. 

