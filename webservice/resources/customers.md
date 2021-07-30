---
title: Customers
---

# Resources for Customers

### Customer

|              Name              |     Format     | Required | Writable | Max size |   Description    |
| :----------------------------- | :------------- | :------: | :------: | -------: | :--------------- |
| **id_default_group**           |                | ❌        | ✔️       |          | Default group ID |
| **id_lang**                    | isUnsignedId   | ❌        | ✔️       |          | Lang ID          |
| **newsletter_date_add**        |                | ❌        | ✔️       |          |                  |
| **ip_registration_newsletter** |                | ❌        | ✔️       |          |                  |
| **last_passwd_gen**            |                | ❌        | ❌        |          |                  |
| **secure_key**                 | isMd5          | ❌        | ❌        |          |                  |
| **deleted**                    | isBool         | ❌        | ✔️       |          |                  |
| **passwd**                     | isPasswd       | ✔️       | ✔️       | 255      |                  |
| **lastname**                   | isCustomerName | ✔️       | ✔️       | 255      |                  |
| **firstname**                  | isCustomerName | ✔️       | ✔️       | 255      |                  |
| **email**                      | isEmail        | ✔️       | ✔️       | 255      |                  |
| **id_gender**                  | isUnsignedId   | ❌        | ✔️       |          | Gender ID        |
| **birthday**                   | isBirthDate    | ❌        | ✔️       |          |                  |
| **newsletter**                 | isBool         | ❌        | ✔️       |          |                  |
| **optin**                      | isBool         | ❌        | ✔️       |          |                  |
| **website**                    | isUrl          | ❌        | ✔️       |          |                  |
| **company**                    | isGenericName  | ❌        | ✔️       |          |                  |
| **siret**                      | isGenericName  | ❌        | ✔️       |          |                  |
| **ape**                        | isApe          | ❌        | ✔️       |          |                  |
| **outstanding_allow_amount**   | isFloat        | ❌        | ✔️       |          |                  |
| **show_public_prices**         | isBool         | ❌        | ✔️       |          |                  |
| **id_risk**                    | isUnsignedInt  | ❌        | ✔️       |          | Risk ID          |
| **max_payment_days**           | isUnsignedInt  | ❌        | ✔️       |          |                  |
| **active**                     | isBool         | ❌        | ✔️       |          |                  |
| **note**                       |                | ❌        | ✔️       | 65000    |                  |
| **is_guest**                   | isBool         | ❌        | ✔️       |          |                  |
| **id_shop**                    | isUnsignedId   | ❌        | ✔️       |          | Shop ID          |
| **id_shop_group**              | isUnsignedId   | ❌        | ✔️       |          | Shop group ID    |
| **date_add**                   | isDate         | ❌        | ✔️       |          |                  |
| **date_upd**                   | isDate         | ❌        | ✔️       |          |                  |
| **reset_password_token**       | isSha1         | ❌        | ✔️       | 40       |                  |
| **reset_password_validity**    | isDateOrNull   | ❌        | ✔️       |          |                  |
| **associations**               |                | ❌        | ✔️       |          |                  |


### Blank schema

```xml
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

