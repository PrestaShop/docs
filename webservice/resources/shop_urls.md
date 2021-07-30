---
title: Shop urls
---

# Resources for Shop urls

### Shop_url

|       Name       |   Format    | Required | Max size | Description |
| :--------------- | :---------- | :------: | -------: | :---------- |
| **id_shop**      |             | ✔️       |          | Shop ID     |
| **active**       | isBool      | ❌        |          |             |
| **main**         | isBool      | ❌        |          |             |
| **domain**       | isCleanHtml | ✔️       | 255      |             |
| **domain_ssl**   | isCleanHtml | ❌        | 255      |             |
| **physical_uri** |             | ❌        | 64       |             |
| **virtual_uri**  |             | ❌        | 64       |             |


### Blank schema

```xml
<prestashop xmlns:xlink="http://www.w3.org/1999/xlink">
  <shop_url>
    <id><![CDATA[]]></id>
    <id_shop><![CDATA[]]></id_shop>
    <active><![CDATA[]]></active>
    <main><![CDATA[]]></main>
    <domain><![CDATA[]]></domain>
    <domain_ssl><![CDATA[]]></domain_ssl>
    <physical_uri><![CDATA[]]></physical_uri>
    <virtual_uri><![CDATA[]]></virtual_uri>
  </shop_url>
</prestashop>
```

