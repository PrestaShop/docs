
---
title: Customers
---

# Resources for Customers


### Customer

|              Name              |     Format     | Required | Read Only | Max size | Not filterable | Description |
| :----------------------------- | :------------- | :------- | :-------- | :------- | :------------- | :---------- |
| **id_default_group**           |                |          |           |          |                |             |
| **id_lang**                    | isUnsignedId   |          |           |          |                |             |
| **newsletter_date_add**        |                |          |           |          |                |             |
| **ip_registration_newsletter** |                |          |           |          |                |             |
| **last_passwd_gen**            |                |          | true      |          |                |             |
| **secure_key**                 | isMd5          |          | true      |          |                |             |
| **deleted**                    | isBool         |          |           |          |                |             |
| **passwd**                     | isPasswd       | true     |           | 255      |                |             |
| **lastname**                   | isCustomerName | true     |           | 255      |                |             |
| **firstname**                  | isCustomerName | true     |           | 255      |                |             |
| **email**                      | isEmail        | true     |           | 255      |                |             |
| **id_gender**                  | isUnsignedId   |          |           |          |                |             |
| **birthday**                   | isBirthDate    |          |           |          |                |             |
| **newsletter**                 | isBool         |          |           |          |                |             |
| **optin**                      | isBool         |          |           |          |                |             |
| **website**                    | isUrl          |          |           |          |                |             |
| **company**                    | isGenericName  |          |           |          |                |             |
| **siret**                      | isGenericName  |          |           |          |                |             |
| **ape**                        | isApe          |          |           |          |                |             |
| **outstanding_allow_amount**   | isFloat        |          |           |          |                |             |
| **show_public_prices**         | isBool         |          |           |          |                |             |
| **id_risk**                    | isUnsignedInt  |          |           |          |                |             |
| **max_payment_days**           | isUnsignedInt  |          |           |          |                |             |
| **active**                     | isBool         |          |           |          |                |             |
| **note**                       | isCleanHtml    |          |           | 65000    |                |             |
| **is_guest**                   | isBool         |          |           |          |                |             |
| **id_shop**                    | isUnsignedId   |          |           |          |                |             |
| **id_shop_group**              | isUnsignedId   |          |           |          |                |             |
| **date_add**                   | isDate         |          |           |          |                |             |
| **date_upd**                   | isDate         |          |           |          |                |             |
| **reset_password_token**       | isSha1         |          |           | 40       |                |             |
| **reset_password_validity**    | isDateOrNull   |          |           |          |                |             |
| **associations**               |                |          |           |          |                |             |


### Example

```xml
<?xml version="1.0" encoding="UTF-8"?>
<prestashop xmlns:xlink="http://www.w3.org/1999/xlink">
<customer>
	<id><![CDATA[]]></id>
	<id_default_group><![CDATA[]]></id_default_group>
	<id_lang><![CDATA[]]></id_lang>
	<newsletter_date_add><![CDATA[]]></newsletter_date_add>
	<ip_registration_newsletter><![CDATA[]]></ip_registration_newsletter>
	<last_passwd_gen><![CDATA[]]></last_passwd_gen>
	<secure_key><![CDATA[]]></secure_key>
	<deleted><![CDATA[]]></deleted>
	<passwd><![CDATA[]]></passwd>
	<lastname><![CDATA[]]></lastname>
	<firstname><![CDATA[]]></firstname>
	<email><![CDATA[]]></email>
	<id_gender><![CDATA[]]></id_gender>
	<birthday><![CDATA[]]></birthday>
	<newsletter><![CDATA[]]></newsletter>
	<optin><![CDATA[]]></optin>
	<website><![CDATA[]]></website>
	<company><![CDATA[]]></company>
	<siret><![CDATA[]]></siret>
	<ape><![CDATA[]]></ape>
	<outstanding_allow_amount><![CDATA[]]></outstanding_allow_amount>
	<show_public_prices><![CDATA[]]></show_public_prices>
	<id_risk><![CDATA[]]></id_risk>
	<max_payment_days><![CDATA[]]></max_payment_days>
	<active><![CDATA[]]></active>
	<note><![CDATA[]]></note>
	<is_guest><![CDATA[]]></is_guest>
	<id_shop><![CDATA[]]></id_shop>
	<id_shop_group><![CDATA[]]></id_shop_group>
	<date_add><![CDATA[]]></date_add>
	<date_upd><![CDATA[]]></date_upd>
	<reset_password_token><![CDATA[]]></reset_password_token>
	<reset_password_validity><![CDATA[]]></reset_password_validity>
<associations>
<groups>
	<group>
	<id><![CDATA[]]></id>
	</group>
</groups>
</associations>
</customer>
</prestashop>

```

