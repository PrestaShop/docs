---
menuTitle: gSitemapAppendUrls
Title: gSitemapAppendUrls
hidden: true
hookTitle: 
files:
  - modules/gsitemap/gsitemap.php
locations:
  - frontoffice
type:
  - 
hookAliases:
---

# Hook gSitemapAppendUrls

## Information

Hook locations: 
  - frontoffice

Hook type: 
  - 

Located in: 
  - [https://github.com/PrestaShop/PrestaShop/blob/8.0.x/modules/gsitemap/gsitemap.php](modules/gsitemap/gsitemap.php)

This hook has an `$array_return` parameter set to `true` (module output will be set by name in an array, [see explaination here]({{< relref "/8/modules/concepts/hooks">}})).

## Hook call in codebase

```php
Hook::exec(self::HOOK_ADD_URLS, array(
            'lang' => $lang,
        ), null, true)
```