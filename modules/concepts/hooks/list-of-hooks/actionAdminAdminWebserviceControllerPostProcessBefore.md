---
Title: actionAdminAdminWebserviceControllerPostProcessBefore
hidden: true
hookTitle: 
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/9.1.x/src/PrestaShopBundle/Controller/Admin/Configure/AdvancedParameters/WebserviceController.php'
        file: src/PrestaShopBundle/Controller/Admin/Configure/AdvancedParameters/WebserviceController.php
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

## Call of the Hook in the origin file

```php
$this->dispatchHookWithParameters('actionAdminAdminWebserviceControllerPostProcessBefore', ['controller' => $this]);

        $form = $formHandler->getForm();
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
```
