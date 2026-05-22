---
Title: displayDashboardToolbarIcons
hidden: true
hookTitle: 'Display new elements in back office page with dashboard, on icons list'
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/9.1.x/controllers/admin/AdminDashboardController.php'
        file: controllers/admin/AdminDashboardController.php
locations:
    - 'back office'
type: display
hookAliases: 
array_return: false
check_exceptions: false
chain: false
origin: core
description: 'This hook launches modules when the back office with dashboard is displayed'

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
private const DASHBOARD_ALLOWED_HOOKS = ['dashboardData', 'dashboardZoneOne', 'dashboardZoneTwo', 'displayDashboardToolbarIcons', 'displayDashboardToolbarTopMenu', 'displayDashboardTop'];

    public function __construct()
    {
        $this->bootstrap = true;
        $this->display = 'view';
```
