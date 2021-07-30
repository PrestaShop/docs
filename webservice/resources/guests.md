---
title: Guests
---

# Resources for Guests

### Guest

|          Name           |    Format     | Required | Max size |     Description     |
| :---------------------- | :------------ | :------: | -------: | :------------------ |
| **id_customer**         | isUnsignedId  | ❌        |          | Customer ID         |
| **id_operating_system** | isUnsignedId  | ❌        |          | Operating system ID |
| **id_web_browser**      | isUnsignedId  | ❌        |          | Web browser ID      |
| **javascript**          | isBool        | ❌        |          |                     |
| **screen_resolution_x** | isInt         | ❌        |          |                     |
| **screen_resolution_y** | isInt         | ❌        |          |                     |
| **screen_color**        | isInt         | ❌        |          |                     |
| **sun_java**            | isBool        | ❌        |          |                     |
| **adobe_flash**         | isBool        | ❌        |          |                     |
| **adobe_director**      | isBool        | ❌        |          |                     |
| **apple_quicktime**     | isBool        | ❌        |          |                     |
| **real_player**         | isBool        | ❌        |          |                     |
| **windows_media**       | isBool        | ❌        |          |                     |
| **accept_language**     | isGenericName | ❌        | 8        |                     |
| **mobile_theme**        | isBool        | ❌        |          |                     |


### Blank schema

```xml
<prestashop xmlns:xlink="http://www.w3.org/1999/xlink">
  <guest>
    <id><![CDATA[]]></id>
    <id_customer><![CDATA[]]></id_customer>
    <id_operating_system><![CDATA[]]></id_operating_system>
    <id_web_browser><![CDATA[]]></id_web_browser>
    <javascript><![CDATA[]]></javascript>
    <screen_resolution_x><![CDATA[]]></screen_resolution_x>
    <screen_resolution_y><![CDATA[]]></screen_resolution_y>
    <screen_color><![CDATA[]]></screen_color>
    <sun_java><![CDATA[]]></sun_java>
    <adobe_flash><![CDATA[]]></adobe_flash>
    <adobe_director><![CDATA[]]></adobe_director>
    <apple_quicktime><![CDATA[]]></apple_quicktime>
    <real_player><![CDATA[]]></real_player>
    <windows_media><![CDATA[]]></windows_media>
    <accept_language><![CDATA[]]></accept_language>
    <mobile_theme><![CDATA[]]></mobile_theme>
  </guest>
</prestashop>
```

