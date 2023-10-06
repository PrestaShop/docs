---
menuTitle: actionAdminMetaBeforeWriteRobotsFile
Title: actionAdminMetaBeforeWriteRobotsFile
hidden: true
hookTitle: null
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/Tools.php'
        file: classes/Tools.php
locations:
    - 'back office'
type: action
hookAliases: null
array_return: false
check_exceptions: false
chain: false
origin: core
description: ''

---

{{% hookDescriptor %}}

## Parameters details

```php
    <?php
    array(
      'rb_data' => &(array) File data
    );
```

## Call of the Hook in the origin file

```php
Hook::exec('actionAdminMetaBeforeWriteRobotsFile', [
                'rb_data' => &$robots_content,
            ])
```
