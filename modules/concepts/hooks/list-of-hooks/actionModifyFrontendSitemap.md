---
Title: actionModifyFrontendSitemap
hidden: true
hookTitle: 'Allows modules to add own urls (even whole new groups) to frontend sitemap.'
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/8.1.x/controllers/front/SitemapController.php'
        file: controllers/front/SitemapController.php
locations:
    - 'front office'
type: action
hookAliases: 
hasExample: true
array_return: false
check_exceptions: false
chain: false
origin: core
description: 'For example landing pages, blog posts and others.'

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
Hook::exec(
    'actionModifyFrontendSitemap',
    ['urls' => &$sitemapUrls],
    null,
    false,
    true,
    false,
    null,
    true
);
```

## Example implementation

```php
public function hookActionModifyFrontendSitemap($params)
{
    $customUrls = [
        [
            'id' => 'custom-url-1',
            'label' => 'Custom URL',
            'url' => 'https://prestashop-project.org',
        ]
    ];

    $params['urls']['pages']['links'] = array_merge($params['urls']['pages']['links'], $customUrls); // add custom urls to pages group
    unset($params['urls']['categories']); // hide categories
}
```

