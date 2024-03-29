---
title: Payment modules
weight: 30
useMermaid: true
---

# Payment modules

PrestaShop {{< minver v="1.7" >}} introduced a new payment API. Below, you'll find information about how it works. 

{{% notice note %}}
To learn how to migrate a payment module from 1.6 to 1.7, please refer to [1.7 version of this page]({{<relref "/1.7/modules/payment">}}).
{{% /notice %}}

{{% notice tip %}}
Please note that your module won't be listed in payment methods admin page unless it is referenced in [the official list](https://api.prestashop.com/xml/tab_modules_list.xml). However you can still configure it through the Module Manager.
{{% /notice %}}

## Requirements

To develop a payment module for PrestaShop 8, you'll have to respect some elements:

- Your class have to extend `PaymentModule`.
- You have to implement the two following methods: `hookPaymentOptions()` & `hookPaymentReturn()` and register these hooks (`PaymentOptions` and `PaymentReturn`).
- You must not have a submit button into your module's HTML code. It will automatically be generated by PrestaShop.

In the `hookPaymentOptions()` method, you have to return an array of [`PaymentOption`](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/Core/Payment/PaymentOption.php).

## How to generate your PaymentOption

### PaymentOption

Here is a list of the *PaymentOption* class variables. They all have a getter and a setter and are accessible in the array sent to the front office template.

- `$callToActionText`: The text displayed as the payment method name.
- `$additionalInformation`: Additional information to display to the customer. This is free HTML, and may be used by modules such as *bankwire* to display to which account the bank transfer should be made.
- `$logo`: The URL to a picture to display in the payment option selection widget.
- `$action`: The URL to which the request to process the payment must be made.
- `$inputs`: An associative array of additional parameters to use when sending the request to `$action`.
- `$form`: The custom HTML to display like a form to enter the credit card information.
- `$moduleName`: The name of the module.
- `$binary`: A boolean to set if the module form was generated by binaries and contains a submit button. It's necessary to adapt the behavior.

#### Example of PaymentOption creation

```php
// create a PaymentOption of type Offline
$offlineOption = new PaymentOption();
$offlineOption->setModuleName($this->name);
$offlineOption->setCallToActionText($this->l('Pay offline'));
$offlineOption->setAction($this->context->link->getModuleLink($this->name, 'validation', ['option' => 'offline'], true));
$offlineOption->setAdditionalInformation($this->context->smarty->fetch('module:paymentexample/views/templates/front/paymentOptionOffline.tpl'));
$offlineOption->setLogo(Media::getMediaPath(_PS_MODULE_DIR_ . $this->name . '/views/img/option/offline.png'));
```

### PaymentOption types and scenarios

You can find a example module illustrating the four identified cases of payment modules on [GitHub](https://github.com/PrestaShop/paymentexample).

We have identified four cases of payment module:

| PaymentOption type | Description | Minimal variables |
| --- | --- | --- |
| Offline | This is the most simple case where you could be (e.g.:Bankwire, Cheque). It's a simple URL to call, then various information are displayed to the customer. | `$callToActionText`, `$action` |
| External | It's a simple URL to call, then the payment is directly processed on the Payment Service Provider's website (e.g.: PayPal, Paybox). | `$callToActionText`, `$action` |
| Embedded | You write your credit card number and all the required data directly on the merchant's website (e.g.: Stripe). | `$callToActionText`, `$form` |
| Iframe | The payment form is displayed on the merchant's website, but inside an iframe. | `$callToActionText`, `$additionalInformation` |

#### Offline scenario

<div class='mermaid'>
sequenceDiagram
    Customer->>PrestaShop instance: Select an Offline payment method
    PrestaShop instance-->>PrestaShop instance: Uses $action parameter to redirect to a controller and create the Order
    PrestaShop instance->>Customer: Returns a confirmation page
</div>

#### External scenario

<div class='mermaid'>
sequenceDiagram
    Customer->>PrestaShop instance: Select an External payment method
    PrestaShop instance->>External Payment service provider (PSP): Uses $action parameter to redirect to the PSP
    External Payment service provider (PSP)-->>External Payment service provider (PSP): Handles payment form
    External Payment service provider (PSP)->>PrestaShop instance: Redirects the customer back to the store
    PrestaShop instance->>Customer: Returns a confirmation page
    External Payment service provider (PSP)-->>PrestaShop instance: Usually send a webhook to the Store to give Server to server information about the payment
    PrestaShop instance-->>PrestaShop instance: Updates payment status / order status
</div>

#### Embedded scenario

<div class='mermaid'>
sequenceDiagram
    Customer->>PrestaShop instance: Select an Embedded payment method
    PrestaShop instance->>PrestaShop instance: Uses $form parameter to build to the PSP form
    Customer->>External Payment service provider (PSP): Submits the PSP embedded form within the PrestaShop checkout page
    External Payment service provider (PSP)-->>External Payment service provider (PSP): Handles payment form
    PrestaShop instance-->>PrestaShop instance: Creates the Order
    PrestaShop instance->>Customer: Returns a confirmation page
    External Payment service provider (PSP)-->>PrestaShop instance: Usually send a webhook to the Store to give Server to server information about the payment
    PrestaShop instance-->>PrestaShop instance: Updates payment status / order status
</div>

#### Iframe scenario

<div class='mermaid'>
sequenceDiagram
    Customer->>PrestaShop instance: Select an Embedded payment method
    PrestaShop instance->>PrestaShop instance: Uses $additionalInformation parameter to display an HTML Iframe
    Customer->>External Payment service provider (PSP): Submits the PSP form within the Iframe in the PrestaShop checkout page
    External Payment service provider (PSP)-->>External Payment service provider (PSP): Handles payment form
    PrestaShop instance-->>PrestaShop instance: Creates the Order
    PrestaShop instance->>Customer: Returns a confirmation page
    External Payment service provider (PSP)-->>PrestaShop instance: Usually send a webhook to the Store to give Server to server information about the payment
    PrestaShop instance-->>PrestaShop instance: Updates payment status / order status
</div>

## Payment modules rules and notes

{{% notice note %}}
There are extra rules for Payment Modules as this type of modules require higher security.
{{% /notice %}}

Note that there are some modules which create the Order with a pending order status during the payment processing (1), while others wait for the payment system's approval to create it (2). But none of them create an order before the customer passed the payment service (bank, PayPal...).

* Make sure you double check the `id_cart` before creating the order.
    * The purpose is to make sure another customer cannot validate a cart which isn't his.

* if (2), make sure the amount you use to `validateOrder()` comes from the external payment system. Do not use `Cart->getOrderTotal()`;
    * For security reasons, always proceed as explained.

* For (2), when receiving a call to process the payment, make sure you double check the source of the call using a signature or a token. Those values must not be known of all. 
