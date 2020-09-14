---
title: Shop urls
---

# Resources for Shop urls

### Shop_url

|       Name       |   Format    | Required | Max size | Description |
| :--------------- | :---------- | :------- | :------- | :---------- |
| **id_shop**      |             | ✔️       |          | Shop ID     |
| **active**       | isBool      | ❌        |          |             |
| **main**         | isBool      | ❌        |          |             |
| **domain**       | isCleanHtml | ✔️       | 255      |             |
| **domain_ssl**   | isCleanHtml | ❌        | 255      |             |
| **physical_uri** |             | ❌        | 64       |             |
| **virtual_uri**  |             | ❌        | 64       |             |


### Blank schema

```xml
<?xml version="1.0" encoding="utf-8"?>
<prestashop xmlns:xlink="http://www.w3.org/1999/xlink">
  <shop_url>
    <id>
    </id>
    <id_shop>
    </id_shop>
    <active>
    </active>
    <main>
    </main>
    <domain>
    </domain>
    <domain_ssl>
    </domain_ssl>
    <physical_uri>
    </physical_uri>
    <virtual_uri>
    </virtual_uri>
  </shop_url>
</prestashop>
```

