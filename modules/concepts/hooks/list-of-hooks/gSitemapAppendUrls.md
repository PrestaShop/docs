---
Title: gSitemapAppendUrls
hidden: true
hookTitle: 
files:
    -
        module: gsitemap
        url: 'https://github.com/PrestaShop/gsitemap/blob/dev/gsitemap.php'
        file: gsitemap.php
locations:
    - 'front office'
type: null
hookAliases: 
array_return: true
check_exceptions: false
chain: false
origin: module
description: ''

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
Hook::exec(self::HOOK_ADD_URLS, array(
            'lang' => $lang,
        ), null, true)
```
