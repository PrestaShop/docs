---
menuTitle: graphEngine
Title: graphEngine
hidden: true
hookTitle: 
files:
  - modules/gsitemap/gsitemap.php
locations:
  - back office
type: display 
hookAliases:
---

# Hook graphEngine

## Information

{{% notice tip %}}
**Creates a rendering engine for graphs to be used in the back office** 

Permits creating graph engines for the back office, you can refer to our [`GraphNvD3` implementation](https://github.com/PrestaShop/graphnvd3).
{{% /notice %}}

Hook locations: 
  - front office

Located in: 
  - [classes/module/ModuleGraph.php](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/module/ModuleGraph.php)

## Call of the Hook in the origin file

```php
return call_user_func([$render, 'hookGraphEngine'], $params, $drawer);
```