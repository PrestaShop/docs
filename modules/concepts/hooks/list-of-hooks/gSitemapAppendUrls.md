---
Title: gSitemapAppendUrls
hidden: true
hookTitle: 
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/8.0.x/modules/gsitemap/gsitemap.php'
        file: modules/gsitemap/gsitemap.php
locations:
    - 'front office'
type: null
hookAliases: 
array_return: true
check_exceptions: false
chain: false
origin: core
description: ''

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
Hook::exec(self::HOOK_ADD_URLS, array(
            'lang' => $lang,
        ), null, true)
```
