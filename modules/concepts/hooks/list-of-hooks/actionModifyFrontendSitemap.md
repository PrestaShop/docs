---
menuTitle: actionModifyFrontendSitemap
Title: actionModifyFrontendSitemap
hidden: true
hookTitle: Allows modules to add own urls (even whole new groups) to frontend sitemap.
files:
  - controllers/front/SitemapController.php
locations:
  - front office
type: action
hookAliases:
---

# Hook actionModifyFrontendSitemap

## Information

{{% notice tip %}}
**Allows modules to add own urls (even whole new groups) to frontend sitemap:** 

For example landing pages, blog posts and others.
{{% /notice %}}

Hook locations: 
  - front office

Hook type: action

Located in: 
  - [controllers/front/SitemapController.php](https://github.com/PrestaShop/PrestaShop/blob/8.1.x/controllers/front/SitemapController.php)

## Call of the Hook in the origin file

```php
Hook::exec(
    'actionModifyFrontendSitemap',
    ['urls' => &$urls],
    null,
    false,
    true,
    false,
    null,
    true
);
```