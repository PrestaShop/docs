---
Title: actionAdminMetaAfterWriteRobotsFile
hidden: true
hookTitle: 
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/Tools.php'
        file: classes/Tools.php
locations:
    - 'back office'
type: action
hookAliases: 
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
      'rb_data' => (array) File data,
      'write_fd' => &(resource) File handle
    );
```

## Call of the Hook in the origin file

```php
Hook::exec('actionAdminMetaAfterWriteRobotsFile', [
                'rb_data' => $robots_content,
                'write_fd' => &$write_fd,
            ])
```
