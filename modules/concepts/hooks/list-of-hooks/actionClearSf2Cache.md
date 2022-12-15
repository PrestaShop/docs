---
menuTitle: actionClearSf2Cache
Title: actionClearSf2Cache
hidden: true
hookTitle: Clear Sf2 cache
files:
  - src/Adapter/Cache/Clearer/SymfonyCacheClearer.php
locations:
  - front office
type: action
hookAliases:
---

# Hook actionClearSf2Cache

## Information

{{% notice tip %}}
**Clear Sf2 cache:** 

This hook is called when the Symfony cache is cleared
{{% /notice %}}

Hook locations: 
  - front office

Hook type: action

Located in: 
  - [src/Adapter/Cache/Clearer/SymfonyCacheClearer.php](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/Adapter/Cache/Clearer/SymfonyCacheClearer.php)

## Call of the Hook in the origin file

```php
Hook::exec('actionClearSf2Cache')
```