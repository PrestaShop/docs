---
menuTitle: dashboardZoneThree
Title: dashboardZoneThree
hidden: true
hookTitle: Dashboard column three
files:
  - controllers/admin/AdminDashboardController.php
locations:
  - backoffice
types:
  - legacy
---

# Hook : dashboardZoneThree

## Informations

{{% notice tip %}}
**Dashboard column three:** 

This hook is displayed in the third column of the dashboard
{{% /notice %}}

Hook locations: 
  - backoffice

Hook types: 
  - legacy

Located in: 
  - controllers/admin/AdminDashboardController.php

## Hook call with parameters

```php
Hook::exec('dashboardZoneThree', $params),
```