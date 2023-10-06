---
menuTitle: actionLoggerLogMessage
Title: actionLoggerLogMessage
hidden: true
hookTitle: 'Allows to make extra action while a log is triggered'
files: {  }
locations:
    - 'back office'
    - 'front office'
type: action
hookAliases: null
array_return: false
check_exceptions: false
chain: false
origin: core
description: ''

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
Hook::exec(
    'actionLoggerLogMessage',
    [
        'message' => $message,
        'level' => $level,
        'isLogged' => $level >= $this->level,
    ]
);
```

