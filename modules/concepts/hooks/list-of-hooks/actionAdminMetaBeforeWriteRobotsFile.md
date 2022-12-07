---
menuTitle: actionAdminMetaBeforeWriteRobotsFile
Title: actionAdminMetaBeforeWriteRobotsFile
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

# Hook actionAdminMetaBeforeWriteRobotsFile

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
      'rb_data' => &(array) File data
    );
```

## Hook call in codebase

```php
Hook::exec('actionAdminMetaBeforeWriteRobotsFile', [
                'rb_data' => &$robots_content,
            ])
```