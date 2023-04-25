---
title: Product FAQ
showOnHomepage: true
---

# Product FAQ

- [Product cover](#product-cover)

## Product cover

**Q:** How can I override the cover image of my products?

**A:** By default, when a product is displayed in a list its cover image is used, it is configurable in the BackOffice and is set in product properties via the `cover_image_id` key.
If you want to change this default behaviour you can use the `actionGetProductPropertiesAfter` in your module and change this key.

```php
<?php
/**
 * Here is an example where we use the first combination image instead of the default cover image,
 * this is useful when you want to display an image matching your current research for example.
 */
public function hookActionGetProductPropertiesAfter($params) {
    $product = $params['product'];
    $productInstance = new Product($product['id_product']);
    $productAttributeId = $product['id_product_attribute'];
    $combinationImages = $productInstance->getCombinationImages($params['id_lang']);
    if (empty($combinationImages) || empty($combinationImages[$productAttributeId])) {
        return;
    }

    // Update cover image ID to use the first image of the product combination
    $attributesImages = $combinationImages[$productAttributeId];
    if (isset($attributesImages[0]['id_image'])) {
        $params['product']['cover_image_id'] = $attributesImages[0]['id_image'];
    }
}
```
