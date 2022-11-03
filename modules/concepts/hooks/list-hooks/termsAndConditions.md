---
menuTitle: termsAndConditions
title: termsAndConditions
hidden: true
files:
  - classes/checkout/ConditionsToApproveFinder.php
types:
  - frontoffice
hookTypes:
  - legacy
---

# Hook : termsAndConditions

Located in :

  - classes/checkout/ConditionsToApproveFinder.php

## Parameters

```php
Hook::exec('termsAndConditions', [], null, true);
        if (!is_array($hookedConditions)) {
            $hookedConditions = [];
        }
        foreach ($hookedConditions as $hookedCondition) {
            if ($hookedCondition instanceof TermsAndConditions) {
                $allConditions[] = $hookedCondition;
            } elseif (is_array($hookedCondition)) {
                foreach ($hookedCondition as $hookedConditionObject) {
                    if ($hookedConditionObject instanceof TermsAndConditions) {
                        $allConditions[] = $hookedConditionObject;
                    }
                }
            }
        }

        if (Configuration::get('PS_CONDITIONS')) {
            array_unshift($allConditions, $this->getDefaultTermsAndConditions());
        }

        /*
         * If two TermsAndConditions objects have the same identifier,
         * the one at the end of the list overrides the first one.
         * This allows a module to override the default checkbox
         * in a consistent manner.
         */
        $reducedConditions = [];
        foreach ($allConditions as $condition) {
            if ($condition instanceof TermsAndConditions) {
                $reducedConditions[$condition->getIdentifier()] = $condition;
            }
        }

        return $reducedConditions;
    }

    public function getConditionsToApproveForTemplate()
    {
        return array_map(function (TermsAndConditions $condition) {
            return $condition->format();
        }, $this->getConditionsToApprove());
```