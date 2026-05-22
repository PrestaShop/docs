---
Title: displayFeatureValuePostProcess
hidden: true
hookTitle: 'On post-process in admin feature value'
files: {  }
locations:
    - 'back office'
type: display
hookAliases:
    - postProcessFeatureValue
array_return: false
check_exceptions: false
chain: false
origin: core
description: 'This hook is called on post-process in admin feature value'

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
Hook::exec(
                'displayFeatureValuePostProcess',
                ['errors' => &$this->errors]
            )
```
