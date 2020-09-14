---
title: Products
---

# Resources for Products

### Product

|             Name              |       Format        | Required | Writable | Max size | Not filterable |    Description     |
| :---------------------------- | :------------------ | :------- | :------- | :------- | :------------- | :----------------- |
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
| **location**                  | isReference         | ❌        | ✔️       | 64       |                |                    |
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
<?xml version="1.0" encoding="utf-8"?>
<prestashop xmlns:xlink="http://www.w3.org/1999/xlink">
  <product>
    <id>
    </id>
    <id_manufacturer>
    </id_manufacturer>
    <id_supplier>
    </id_supplier>
    <id_category_default>
    </id_category_default>
    <new>
    </new>
    <cache_default_attribute>
    </cache_default_attribute>
    <id_default_image>
    </id_default_image>
    <id_default_combination>
    </id_default_combination>
    <id_tax_rules_group>
    </id_tax_rules_group>
    <position_in_category>
    </position_in_category>
    <type>
    </type>
    <id_shop_default>
    </id_shop_default>
    <reference>
    </reference>
    <supplier_reference>
    </supplier_reference>
    <location>
    </location>
    <width>
    </width>
    <height>
    </height>
    <depth>
    </depth>
    <weight>
    </weight>
    <quantity_discount>
    </quantity_discount>
    <ean13>
    </ean13>
    <isbn>
    </isbn>
    <upc>
    </upc>
    <mpn>
    </mpn>
    <cache_is_pack>
    </cache_is_pack>
    <cache_has_attachments>
    </cache_has_attachments>
    <is_virtual>
    </is_virtual>
    <state>
    </state>
    <additional_delivery_times>
    </additional_delivery_times>
    <delivery_in_stock>
      <language id="1"/>
      <language id="2"/>
    </delivery_in_stock>
    <delivery_out_stock>
      <language id="1"/>
      <language id="2"/>
    </delivery_out_stock>
    <on_sale>
    </on_sale>
    <online_only>
    </online_only>
    <ecotax>
    </ecotax>
    <minimal_quantity>
    </minimal_quantity>
    <low_stock_threshold>
    </low_stock_threshold>
    <low_stock_alert>
    </low_stock_alert>
    <price>
    </price>
    <wholesale_price>
    </wholesale_price>
    <unity>
    </unity>
    <unit_price_ratio>
    </unit_price_ratio>
    <additional_shipping_cost>
    </additional_shipping_cost>
    <customizable>
    </customizable>
    <text_fields>
    </text_fields>
    <uploadable_files>
    </uploadable_files>
    <active>
    </active>
    <redirect_type>
    </redirect_type>
    <id_type_redirected>
    </id_type_redirected>
    <available_for_order>
    </available_for_order>
    <available_date>
    </available_date>
    <show_condition>
    </show_condition>
    <condition>
    </condition>
    <show_price>
    </show_price>
    <indexed>
    </indexed>
    <visibility>
    </visibility>
    <advanced_stock_management>
    </advanced_stock_management>
    <date_add>
    </date_add>
    <date_upd>
    </date_upd>
    <pack_stock_type>
    </pack_stock_type>
    <meta_description>
      <language id="1"/>
      <language id="2"/>
    </meta_description>
    <meta_keywords>
      <language id="1"/>
      <language id="2"/>
    </meta_keywords>
    <meta_title>
      <language id="1"/>
      <language id="2"/>
    </meta_title>
    <link_rewrite>
      <language id="1"/>
      <language id="2"/>
    </link_rewrite>
    <name>
      <language id="1"/>
      <language id="2"/>
    </name>
    <description>
      <language id="1"/>
      <language id="2"/>
    </description>
    <description_short>
      <language id="1"/>
      <language id="2"/>
    </description_short>
    <available_now>
      <language id="1"/>
      <language id="2"/>
    </available_now>
    <available_later>
      <language id="1"/>
      <language id="2"/>
    </available_later>
    <associations>
      <categories>
        <category>
          <id>
          </id>
        </category>
      </categories>
      <images>
        <image>
          <id>
          </id>
        </image>
      </images>
      <combinations>
        <combination>
          <id>
          </id>
        </combination>
      </combinations>
      <product_option_values>
        <product_option_value>
          <id>
          </id>
        </product_option_value>
      </product_option_values>
      <product_features>
        <product_feature>
          <id>
          </id>
          <id_feature_value>
          </id_feature_value>
        </product_feature>
      </product_features>
      <tags>
        <tag>
          <id>
          </id>
        </tag>
      </tags>
      <stock_availables>
        <stock_available>
          <id>
          </id>
          <id_product_attribute>
          </id_product_attribute>
        </stock_available>
      </stock_availables>
      <accessories>
        <product>
          <id>
          </id>
        </product>
      </accessories>
      <product_bundle>
        <product>
          <id>
          </id>
          <id_product_attribute>
          </id_product_attribute>
          <quantity>
          </quantity>
        </product>
      </product_bundle>
    </associations>
  </product>
</prestashop>
```

