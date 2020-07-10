---
title: KPI block in Admin pages
weight: 4
---

# How to add a KPI block in admin pages
{{< minver v="1.7.5" title="true" >}}

A KPI block (also called KPI row) is shown here:

{{< figure src="../img/kpi-block.png" title="KPI Block" >}}

You can follow these steps to easily add a KPI row to a modern page:

* Define your KPI classes:
  * You can use one of existing KPI classes, from `PrestaShop\PrestaShop\Adapter\Kpi` namespace,
  * You can create new classes - they must implement the `PrestaShop\PrestaShop\Core\Kpi\KpiInterface`
* Define a KPI row factory service in `src/PrestaShopBundle/Resources/config/services/core/kpi.yml`

    Example from translations page:
    ```yaml
    prestashop.core.kpi_row.factory.translations_page:
        class: PrestaShop\PrestaShop\Core\Kpi\Row\KpiRowFactory
        arguments:
            - '@prestashop.adapter.kpi.enabled_languages'
            - '@prestashop.adapter.kpi.main_country'
            - '@prestashop.adapter.kpi.translations'
    ```
    
    {{% notice note %}}The KPI row factory accepts an unlimited number of arguments, each argument being a KPI that will be built into a KPI row.
    {{% /notice %}}

* Build the KPI row in your controller's action and assign it to twig by returning it:

    ```php
    <?php
    public function showSettingsAction(Request $request)
    {
        // Create the KPI row factory service
        $kpiRowFactory = $this->get('prestashop.core.kpi_row.factory.your_page');

        return [
            // Assign the built KPI row to the view
            'kpiRow' => $kpiRowFactory->build(),
            ...
        ];
    }
    ```

* The final step is to render the KPI row with Twig, using `renderKpiRow` method from `CommonController` and passing it to the previously assigned `kpiRow` variable:
    ```twig
    {# This also works in Admin module controllers #}
    {% block translations_kpis_row %}
        <div class="row">
            {{ render(controller(
                'PrestaShopBundle:Admin\\Common:renderKpiRow',
                { 'kpiRow': kpiRow }
            )) }}
        </div>
    {% endblock %}
    ```

## Alter an existing Kpi row
{{< minver v="1.7.6" title="true" >}}

A hook allows you to alter the list of an existing Kpi row of the Back Office.

This hook is dynamic and is dispatched after the *Kpi row identifier*.

For instance, with a Kpi row identified by "foo":

```php
<?php
// we are in a module
public function hookActionFooKpiRowModifier(array $params)
{
    var_dump($params['kpis']); // access the complete list

    unset($params['kpis'][0]); // remove the first item

    $params['kpis'][] = new YourOwnKpi(...);
}
```
