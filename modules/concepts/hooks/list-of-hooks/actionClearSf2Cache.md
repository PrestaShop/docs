---
menuTitle: actionClearSf2Cache
Title: actionClearSf2Cache
hidden: true
hookTitle: Clear Sf2 cache
files:
  - src/Adapter/Cache/Clearer/SymfonyCacheClearer.php
locations:
  - frontoffice
type:
  - action
hookAliases:
---

# Hook actionClearSf2Cache

## Information

{{% notice tip %}}
**Clear Sf2 cache:** 

This hook is called when the Symfony cache is cleared
{{% /notice %}}

Hook locations: 
  - frontoffice

Hook type: 
  - action

Located in: 
  - [https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/Adapter/Cache/Clearer/SymfonyCacheClearer.php](src/Adapter/Cache/Clearer/SymfonyCacheClearer.php)

## Hook call in codebase

```php
Hook::exec('actionClearSf2Cache')
```