---
menuTitle: actionAdminMetaAfterWriteRobotsFile
Title: actionAdminMetaAfterWriteRobotsFile
hidden: true
hookTitle: 
files:
  - classes/Tools.php
locations:
  - back office
type: action
hookAliases:
---

# Hook actionAdminMetaAfterWriteRobotsFile

## Information

Hook locations: 
  - back office

Hook type: action

Located in: 
  - [classes/Tools.php](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/Tools.php)

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