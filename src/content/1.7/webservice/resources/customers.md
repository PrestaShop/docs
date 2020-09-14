---
title: Customers
---

# Resources for Customers

### Customer

|              Name              |     Format     | Required | Writable | Max size |   Description    |
| :----------------------------- | :------------- | :------- | :------- | :------- | :--------------- |
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
| **note**                       | isCleanHtml    | ❌        | ✔️       | 65000    |                  |
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
<?xml version="1.0" encoding="utf-8"?>
<prestashop xmlns:xlink="http://www.w3.org/1999/xlink">
  <customer>
    <id>
    </id>
    <id_default_group>
    </id_default_group>
    <id_lang>
    </id_lang>
    <newsletter_date_add>
    </newsletter_date_add>
    <ip_registration_newsletter>
    </ip_registration_newsletter>
    <last_passwd_gen>
    </last_passwd_gen>
    <secure_key>
    </secure_key>
    <deleted>
    </deleted>
    <passwd>
    </passwd>
    <lastname>
    </lastname>
    <firstname>
    </firstname>
    <email>
    </email>
    <id_gender>
    </id_gender>
    <birthday>
    </birthday>
    <newsletter>
    </newsletter>
    <optin>
    </optin>
    <website>
    </website>
    <company>
    </company>
    <siret>
    </siret>
    <ape>
    </ape>
    <outstanding_allow_amount>
    </outstanding_allow_amount>
    <show_public_prices>
    </show_public_prices>
    <id_risk>
    </id_risk>
    <max_payment_days>
    </max_payment_days>
    <active>
    </active>
    <note>
    </note>
    <is_guest>
    </is_guest>
    <id_shop>
    </id_shop>
    <id_shop_group>
    </id_shop_group>
    <date_add>
    </date_add>
    <date_upd>
    </date_upd>
    <reset_password_token>
    </reset_password_token>
    <reset_password_validity>
    </reset_password_validity>
    <associations>
      <groups>
        <group>
          <id>
          </id>
        </group>
      </groups>
    </associations>
  </customer>
</prestashop>
```

