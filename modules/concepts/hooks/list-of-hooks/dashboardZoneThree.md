---
Title: dashboardZoneThree
hidden: true
hookTitle: 'Dashboard column three'
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/9.1.x/controllers/admin/AdminDashboardController.php'
        file: controllers/admin/AdminDashboardController.php
locations:
    - 'back office'
type: action
hookAliases: 
array_return: false
check_exceptions: false
chain: false
origin: core
description: 'This hook is displayed in the third column of the dashboard'

---

{{% hookDescriptor %}}

## Parameters details

```php
    <?php
    [
        'date_from' => (string|null) $statsDateFrom,
        'date_to' => (string|null) $statsDateTo,
    ]
```

## Call of the Hook in the origin file

```php
'hookDashboardZoneThree' => Hook::exec('dashboardZoneThree', $params), 'action' => '#', 'warning' => $this->getWarningDomainName(), 'calendar' => $calendar_helper->generate(), 'PS_DASHBOARD_SIMULATION' => Configuration::get('PS_DASHBOARD_SIMULATION'), 'datepickerFrom' => Tools::getValue('datepickerFrom', $this->context->employee->stats_date_from),
```
