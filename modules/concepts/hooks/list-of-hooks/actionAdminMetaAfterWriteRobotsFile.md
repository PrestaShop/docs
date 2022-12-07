---
menuTitle: actionAdminMetaAfterWriteRobotsFile
Title: actionAdminMetaAfterWriteRobotsFile
hidden: true
hookTitle: 
files:
  - classes/Tools.php
locations:
  - backoffice
type:
  - action
hookAliases:
---

# Hook actionAdminMetaAfterWriteRobotsFile

## Information

Hook locations: 
  - backoffice

Hook type: 
  - action

Located in: 
  - [https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/Tools.php](classes/Tools.php)

## Parameters details

```php
    <?php
    array(
      'rb_data' => (array) File data,
      'write_fd' => &(resource) File handle
    );
```

## Hook call in codebase

```php
Hook::exec('actionAdminMetaAfterWriteRobotsFile', [
                'rb_data' => $robots_content,
                'write_fd' => &$write_fd,
            ])
```