---
title: Products
---

# Resources for Products

### Product

|             Name              |       Format        | Required | Writable | Max size | Not filterable |    Description     |
| :---------------------------- | :------------------ | :------: | :------: | -------: | :------------- | :----------------- |
| **id_manufacturer**           | isUnsignedId        | ❌        | ✔️       |          |                | Manufacturer ID    |
| **id_supplier**               | isUnsignedId        | ❌        | ✔️       |          |                | Supplier ID        |
| **id_category_default**       | isUnsignedId        | ❌        | ✔️       |          |                |                    |
| **new**                       |                     | ❌        | ✔️       |          |                |                    |
| **cache_default_attribute**   |                     | ❌        | ✔️       |          |                |                    |
| **id_default_image**          |                     | ❌        | ✔️       |          | true           |                    |
| **id_default_combination**    |                     | ❌        | ✔️       |          | true           |                    |
| **id_tax_rules_group**        | isUnsignedId        | ❌        | ✔️       |          |                | Tax rules group ID |
| **position_in_category**      |                     | ❌        | ✔️       |          | true           |                    |
| **manufacturer_name**         |                     | ❌        | ❌        |          | true           |                    |
| **quantity**                  |                     | ❌        | ❌        |          | true           |                    |
| **type**                      |                     | ❌        | ✔️       |          | true           |                    |
| **id_shop_default**           | isUnsignedId        | ❌        | ✔️       |          |                | Default shop ID    |
| **reference**                 | isReference         | ❌        | ✔️       | 64       |                |                    |
| **supplier_reference**        | isReference         | ❌        | ✔️       | 64       |                |                    |
| **location**                  | isString            | ❌        | ✔️       | 255      |                |                    |
| **width**                     | isUnsignedFloat     | ❌        | ✔️       |          |                |                    |
| **height**                    | isUnsignedFloat     | ❌        | ✔️       |          |                |                    |
| **depth**                     | isUnsignedFloat     | ❌        | ✔️       |          |                |                    |
| **weight**                    | isUnsignedFloat     | ❌        | ✔️       |          |                |                    |
| **quantity_discount**         | isBool              | ❌        | ✔️       |          |                |                    |
| **ean13**                     | isEan13             | ❌        | ✔️       | 13       |                |                    |
| **isbn**                      | isIsbn              | ❌        | ✔️       | 32       |                |                    |
| **upc**                       | isUpc               | ❌        | ✔️       | 12       |                |                    |
| **mpn**                       | isMpn               | ❌        | ✔️       | 40       |                |                    |
| **cache_is_pack**             | isBool              | ❌        | ✔️       |          |                |                    |
| **cache_has_attachments**     | isBool              | ❌        | ✔️       |          |                |                    |
| **is_virtual**                | isBool              | ❌        | ✔️       |          |                |                    |
| **state**                     | isUnsignedId        | ❌        | ✔️       |          |                |                    |
| **additional_delivery_times** | isUnsignedId        | ❌        | ✔️       |          |                |                    |
| **delivery_in_stock**         | isGenericName       | ❌        | ✔️       | 255      |                |                    |
| **delivery_out_stock**        | isGenericName       | ❌        | ✔️       | 255      |                |                    |
| **on_sale**                   | isBool              | ❌        | ✔️       |          |                |                    |
| **online_only**               | isBool              | ❌        | ✔️       |          |                |                    |
| **ecotax**                    | isPrice             | ❌        | ✔️       |          |                |                    |
| **minimal_quantity**          | isUnsignedInt       | ❌        | ✔️       |          |                |                    |
| **low_stock_threshold**       | isInt               | ❌        | ✔️       |          |                |                    |
| **low_stock_alert**           | isBool              | ❌        | ✔️       |          |                |                    |
| **price**                     | isPrice             | ✔️       | ✔️       |          |                |                    |
| **wholesale_price**           | isPrice             | ❌        | ✔️       |          |                |                    |
| **unity**                     | isString            | ❌        | ✔️       |          |                |                    |
| **unit_price_ratio**          |                     | ❌        | ✔️       |          |                |                    |
| **additional_shipping_cost**  | isPrice             | ❌        | ✔️       |          |                |                    |
| **customizable**              | isUnsignedInt       | ❌        | ✔️       |          |                |                    |
| **text_fields**               | isUnsignedInt       | ❌        | ✔️       |          |                |                    |
| **uploadable_files**          | isUnsignedInt       | ❌        | ✔️       |          |                |                    |
| **active**                    | isBool              | ❌        | ✔️       |          |                |                    |
| **redirect_type**             | isString            | ❌        | ✔️       |          |                |                    |
| **id_type_redirected**        | isUnsignedId        | ❌        | ✔️       |          |                |                    |
| **available_for_order**       | isBool              | ❌        | ✔️       |          |                |                    |
| **available_date**            | isDateFormat        | ❌        | ✔️       |          |                |                    |
| **show_condition**            | isBool              | ❌        | ✔️       |          |                |                    |
| **condition**                 | isGenericName       | ❌        | ✔️       |          |                |                    |
| **show_price**                | isBool              | ❌        | ✔️       |          |                |                    |
| **indexed**                   | isBool              | ❌        | ✔️       |          |                |                    |
| **visibility**                | isProductVisibility | ❌        | ✔️       |          |                |                    |
| **advanced_stock_management** | isBool              | ❌        | ✔️       |          |                |                    |
| **date_add**                  | isDate              | ❌        | ✔️       |          |                |                    |
| **date_upd**                  | isDate              | ❌        | ✔️       |          |                |                    |
| **pack_stock_type**           | isUnsignedInt       | ❌        | ✔️       |          |                |                    |
| **meta_description**          | isGenericName       | ❌        | ✔️       | 512      |                |                    |
| **meta_keywords**             | isGenericName       | ❌        | ✔️       | 255      |                |                    |
| **meta_title**                | isGenericName       | ❌        | ✔️       | 255      |                |                    |
| **link_rewrite**              | isLinkRewrite       | ❌        | ✔️       | 128      |                |                    |
| **name**                      | isCatalogName       | ❌        | ✔️       | 128      |                |                    |
| **description**               | isCleanHtml         | ❌        | ✔️       |          |                |                    |
| **description_short**         | isCleanHtml         | ❌        | ✔️       |          |                |                    |
| **available_now**             | isGenericName       | ❌        | ✔️       | 255      |                |                    |
| **available_later**           | IsGenericName       | ❌        | ✔️       | 255      |                |                    |
| **associations**              |                     | ❌        | ✔️       |          |                |                    |


### Blank schema

```xml
<prestashop xmlns:xlink="http://www.w3.org/1999/xlink">
  <product>
    <id><![CDATA[]]></id>
    <id_manufacturer><![CDATA[]]></id_manufacturer>
    <id_supplier><![CDATA[]]></id_supplier>
    <id_category_default><![CDATA[]]></id_category_default>
    <new><![CDATA[]]></new>
    <cache_default_attribute><![CDATA[]]></cache_default_attribute>
    <id_default_image><![CDATA[]]></id_default_image>
    <id_default_combination><![CDATA[]]></id_default_combination>
    <id_tax_rules_group><![CDATA[]]></id_tax_rules_group>
    <position_in_category><![CDATA[]]></position_in_category>
    <type><![CDATA[]]></type>
    <id_shop_default><![CDATA[]]></id_shop_default>
    <reference><![CDATA[]]></reference>
    <supplier_reference><![CDATA[]]></supplier_reference>
    <location><![CDATA[]]></location>
    <width><![CDATA[]]></width>
    <height><![CDATA[]]></height>
    <depth><![CDATA[]]></depth>
    <weight><![CDATA[]]></weight>
    <quantity_discount><![CDATA[]]></quantity_discount>
    <ean13><![CDATA[]]></ean13>
    <isbn><![CDATA[]]></isbn>
    <upc><![CDATA[]]></upc>
    <mpn><![CDATA[]]></mpn>
    <cache_is_pack><![CDATA[]]></cache_is_pack>
    <cache_has_attachments><![CDATA[]]></cache_has_attachments>
    <is_virtual><![CDATA[]]></is_virtual>
    <state><![CDATA[]]></state>
    <additional_delivery_times><![CDATA[]]></additional_delivery_times>
    <delivery_in_stock>
      <language id="1"><![CDATA[]]></language>
      <language id="2"><![CDATA[]]></language>
    </delivery_in_stock>
    <delivery_out_stock>
      <language id="1"><![CDATA[]]></language>
      <language id="2"><![CDATA[]]></language>
    </delivery_out_stock>
    <on_sale><![CDATA[]]></on_sale>
    <online_only><![CDATA[]]></online_only>
    <ecotax><![CDATA[]]></ecotax>
    <minimal_quantity><![CDATA[]]></minimal_quantity>
    <low_stock_threshold><![CDATA[]]></low_stock_threshold>
    <low_stock_alert><![CDATA[]]></low_stock_alert>
    <price><![CDATA[]]></price>
    <wholesale_price><![CDATA[]]></wholesale_price>
    <unity><![CDATA[]]></unity>
    <unit_price_ratio><![CDATA[]]></unit_price_ratio>
    <additional_shipping_cost><![CDATA[]]></additional_shipping_cost>
    <customizable><![CDATA[]]></customizable>
    <text_fields><![CDATA[]]></text_fields>
    <uploadable_files><![CDATA[]]></uploadable_files>
    <active><![CDATA[]]></active>
    <redirect_type><![CDATA[]]></redirect_type>
    <id_type_redirected><![CDATA[]]></id_type_redirected>
    <available_for_order><![CDATA[]]></available_for_order>
    <available_date><![CDATA[]]></available_date>
    <show_condition><![CDATA[]]></show_condition>
    <condition><![CDATA[]]></condition>
    <show_price><![CDATA[]]></show_price>
    <indexed><![CDATA[]]></indexed>
    <visibility><![CDATA[]]></visibility>
    <advanced_stock_management><![CDATA[]]></advanced_stock_management>
    <date_add><![CDATA[]]></date_add>
    <date_upd><![CDATA[]]></date_upd>
    <pack_stock_type><![CDATA[]]></pack_stock_type>
    <meta_description>
      <language id="1"><![CDATA[]]></language>
      <language id="2"><![CDATA[]]></language>
    </meta_description>
    <meta_keywords>
      <language id="1"><![CDATA[]]></language>
      <language id="2"><![CDATA[]]></language>
    </meta_keywords>
    <meta_title>
      <language id="1"><![CDATA[]]></language>
      <language id="2"><![CDATA[]]></language>
    </meta_title>
    <link_rewrite>
      <language id="1"><![CDATA[]]></language>
      <language id="2"><![CDATA[]]></language>
    </link_rewrite>
    <name>
      <language id="1"><![CDATA[]]></language>
      <language id="2"><![CDATA[]]></language>
    </name>
    <description>
      <language id="1"><![CDATA[]]></language>
      <language id="2"><![CDATA[]]></language>
    </description>
    <description_short>
      <language id="1"><![CDATA[]]></language>
      <language id="2"><![CDATA[]]></language>
    </description_short>
    <available_now>
      <language id="1"><![CDATA[]]></language>
      <language id="2"><![CDATA[]]></language>
    </available_now>
    <available_later>
      <language id="1"><![CDATA[]]></language>
      <language id="2"><![CDATA[]]></language>
    </available_later>
    <associations>
      <categories>
        <category>
          <id><![CDATA[]]></id>
        </category>
      </categories>
      <images>
        <image>
          <id><![CDATA[]]></id>
        </image>
      </images>
      <combinations>
        <combination>
          <id><![CDATA[]]></id>
        </combination>
      </combinations>
      <product_option_values>
        <product_option_value>
          <id><![CDATA[]]></id>
        </product_option_value>
      </product_option_values>
      <product_features>
        <product_feature>
          <id><![CDATA[]]></id>
          <id_feature_value><![CDATA[]]></id_feature_value>
        </product_feature>
      </product_features>
      <tags>
        <tag>
          <id><![CDATA[]]></id>
        </tag>
      </tags>
      <stock_availables>
        <stock_available>
          <id><![CDATA[]]></id>
          <id_product_attribute><![CDATA[]]></id_product_attribute>
        </stock_available>
      </stock_availables>
      <attachments>
        <attachment>
          <id><![CDATA[]]></id>
        </attachment>
      </attachments>
      <accessories>
        <product>
          <id><![CDATA[]]></id>
        </product>
      </accessories>
      <product_bundle>
        <product>
          <id><![CDATA[]]></id>
          <id_product_attribute><![CDATA[]]></id_product_attribute>
          <quantity><![CDATA[]]></quantity>
        </product>
      </product_bundle>
    </associations>
  </product>
</prestashop>
```

