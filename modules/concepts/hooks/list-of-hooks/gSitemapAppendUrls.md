---
menuTitle: gSitemapAppendUrls
Title: gSitemapAppendUrls
hidden: true
hookTitle: 
files:
  - modules/gsitemap/gsitemap.php
locations:
  - front office
type: 
hookAliases:
---

# Hook gSitemapAppendUrls

## Information

Hook locations: 
  - front office

Located in: 
  - [modules/gsitemap/gsitemap.php](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/modules/gsitemap/gsitemap.php)

This hook has an `$array_return` parameter set to `true` (module output will be set by name in an array, [see explaination here]({{< relref "/8/development/components/hook/dispatching-hook">}})).

## Call of the Hook in the origin file

```php
Hook::exec(self::HOOK_ADD_URLS, array(
            'lang' => $lang,
        ), null, true)
```