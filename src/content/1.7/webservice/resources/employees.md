---
title: Employees
---

# Resources for Employees

### Employee

|             Name             |    Format     | Required | Writable | Max size |       Description        |
| :--------------------------- | :------------ | :------- | :------- | :------- | :----------------------- |
| **id_lang**                  | isUnsignedInt | ✔️       | ✔️       |          | Lang ID                  |
| **last_passwd_gen**          |               | ❌        | ❌        |          |                          |
| **stats_date_from**          | isDate        | ❌        | ❌        |          |                          |
| **stats_date_to**            | isDate        | ❌        | ❌        |          |                          |
| **stats_compare_from**       | isDate        | ❌        | ❌        |          |                          |
| **stats_compare_to**         | isDate        | ❌        | ❌        |          |                          |
| **passwd**                   | isPasswd      | ✔️       | ✔️       | 255      |                          |
| **lastname**                 | isName        | ✔️       | ✔️       | 255      |                          |
| **firstname**                | isName        | ✔️       | ✔️       | 255      |                          |
| **email**                    | isEmail       | ✔️       | ✔️       | 255      |                          |
| **active**                   | isBool        | ❌        | ✔️       |          |                          |
| **id_profile**               | isInt         | ✔️       | ✔️       |          | Profile ID               |
| **bo_color**                 | isColor       | ❌        | ✔️       | 32       |                          |
| **default_tab**              | isInt         | ❌        | ✔️       |          |                          |
| **bo_theme**                 | isGenericName | ❌        | ✔️       | 32       |                          |
| **bo_css**                   | isGenericName | ❌        | ✔️       | 64       |                          |
| **bo_width**                 | isUnsignedInt | ❌        | ✔️       |          |                          |
| **bo_menu**                  | isBool        | ❌        | ✔️       |          |                          |
| **stats_compare_option**     | isUnsignedInt | ❌        | ✔️       |          |                          |
| **preselect_date_range**     |               | ❌        | ✔️       | 32       |                          |
| **id_last_order**            | isUnsignedInt | ❌        | ✔️       |          | Last order ID            |
| **id_last_customer_message** | isUnsignedInt | ❌        | ✔️       |          | Last customer message ID |
| **id_last_customer**         | isUnsignedInt | ❌        | ✔️       |          | Last customer ID         |
| **reset_password_token**     | isSha1        | ❌        | ✔️       | 40       |                          |
| **reset_password_validity**  | isDateOrNull  | ❌        | ✔️       |          |                          |
| **has_enabled_gravatar**     | isBool        | ❌        | ✔️       |          |                          |


### Blank schema

```xml
<?xml version="1.0" encoding="utf-8"?>
<prestashop xmlns:xlink="http://www.w3.org/1999/xlink">
  <employee>
    <id>
    </id>
    <id_lang>
    </id_lang>
    <last_passwd_gen>
    </last_passwd_gen>
    <stats_date_from>
    </stats_date_from>
    <stats_date_to>
    </stats_date_to>
    <stats_compare_from>
    </stats_compare_from>
    <stats_compare_to>
    </stats_compare_to>
    <passwd>
    </passwd>
    <lastname>
    </lastname>
    <firstname>
    </firstname>
    <email>
    </email>
    <active>
    </active>
    <id_profile>
    </id_profile>
    <bo_color>
    </bo_color>
    <default_tab>
    </default_tab>
    <bo_theme>
    </bo_theme>
    <bo_css>
    </bo_css>
    <bo_width>
    </bo_width>
    <bo_menu>
    </bo_menu>
    <stats_compare_option>
    </stats_compare_option>
    <preselect_date_range>
    </preselect_date_range>
    <id_last_order>
    </id_last_order>
    <id_last_customer_message>
    </id_last_customer_message>
    <id_last_customer>
    </id_last_customer>
    <reset_password_token>
    </reset_password_token>
    <reset_password_validity>
    </reset_password_validity>
    <has_enabled_gravatar>
    </has_enabled_gravatar>
  </employee>
</prestashop>
```

