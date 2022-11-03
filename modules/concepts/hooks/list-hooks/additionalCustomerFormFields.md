---
menuTitle: additionalCustomerFormFields
title: additionalCustomerFormFields
hidden: true
files:
  - classes/form/CustomerFormatter.php
types:
  - frontoffice
hookTypes:
  - legacy
---

# Hook : additionalCustomerFormFields

Located in :

  - classes/form/CustomerFormatter.php

## Parameters

```php
Hook::exec('additionalCustomerFormFields', ['fields' => &$format], null, true);

        if (is_array($additionalCustomerFormFields)) {
            foreach ($additionalCustomerFormFields as $moduleName => $additionnalFormFields) {
                if (!is_array($additionnalFormFields)) {
                    continue;
                }

                foreach ($additionnalFormFields as $formField) {
                    $formField->moduleName = $moduleName;
                    $format[$moduleName . '_' . $formField->getName()] = $formField;
                }
            }
        }

        // TODO: TVA etc.?

        return $this->addConstraints($format);
    }

    private function addConstraints(array $format)
    {
        $constraints = Customer::$definition['fields'];

        foreach ($format as $field) {
            if (!empty($constraints[$field->getName()]['validate'])) {
                $field->addConstraint(
                    $constraints[$field->getName()]['validate']
                );
```