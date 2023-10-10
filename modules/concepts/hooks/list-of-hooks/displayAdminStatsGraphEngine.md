---
menuTitle: displayAdminStatsGraphEngine
Title: displayAdminStatsGraphEngine
hidden: true
hookTitle: 
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/module/ModuleGraph.php'
        file: classes/module/ModuleGraph.php
locations:
    - 'back office'
type: display
hookAliases:
    - GraphEngine
array_return: false
check_exceptions: false
chain: false
origin: core
description: 'Permits creating graph engines for the back office, you can refer to our [`GraphNvD3` implementation](https://github.com/PrestaShop/graphnvd3).'

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
return call_user_func([$render, 'hookGraphEngine'], $params, $drawer);
```
