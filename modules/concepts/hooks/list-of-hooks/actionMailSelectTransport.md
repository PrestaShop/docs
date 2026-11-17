---
Title: actionMailSelectTransport
hidden: true
hookTitle: 'Select the mail transport'
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/develop/classes/Mail.php'
        file: classes/Mail.php
locations:
    - 'front office'
    - 'back office'
type: action
hookAliases: 
array_return: true
check_exceptions: false
chain: false
origin: core
description: 'This hook is called before an email is sent, in the destination shop''s context, so that a module can return the transport to send it with, or false to keep the native one'

---

{{% hookDescriptor %}}

## Parameters

- `id_shop` (int): the shop the email belongs to. It is also the current shop context during the call.
- `purpose` (string): `message` for `Mail::send`, `test` for `Mail::sendMailTest`.

The hook never receives the message or the native SMTP credentials.

## Return value

Return a `Symfony\Component\Mailer\Transport\TransportInterface` to send the email with it, or `false` to let another module or the native SMTP/sendmail settings handle it. Any other value (including an exception, which `Hook::exec` turns into an empty string), or more than one module returning a transport, fails the send and logs a mailer error. Do not send anything during the hook.

## Call of the Hook in the origin file

```php
Hook::exec('actionMailSelectTransport', [
    'id_shop' => $idShop,
    'purpose' => $purpose,
], null, true)
```
