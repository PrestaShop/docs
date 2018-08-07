---
title: KPI block in Admin pages
weight: 4
---

# How to add a KPI block in admin pages?

A KPI block (also called KPI row) is shown here:

{{< figure src="/images/1.7/kpi-block.png" title="KPI Block" >}}

> Available since **PrestaShop** {{< minver v="1.7.5" >}}

You can follow these steps to easily add a KPI row to a modern page :
* define your KPI classes:
  * you can use one of existing KPI classes, from `PrestaShop\PrestaShop\Adapter\Kpi` namespace,
  * you can create new classes - they must implement the `PrestaShop\PrestaShop\Core\Kpi\KpiInterface`
* define a KPI row factory service in `src/PrestaShopBundle/Resources/config/services/core/kpi.yml`

    Example from translations page:
    ```yaml
    prestashop.core.kpi_row.factory.translations_page:
        class: PrestaShop\PrestaShop\Core\Kpi\Row\KpiRowFactory
        arguments:
            - '@prestashop.adapter.kpi.enabled_languages'
            - '@prestashop.adapter.kpi.main_country'
            - '@prestashop.adapter.kpi.translations'
    ```
    Note: the KPI row factory accepts unlimited number of arguments and each argument is a KPI, that will be built into a KPI row.

* Build the KPI row in your controller's action and assign it to twig by returning it:
    ```php
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
    {# It works also in Admin module controllers #}
    {% block translations_kpis_row %}
        <div class="row">
            {{ render(controller(
                'PrestaShopBundle:Admin\\Common:renderKpiRow',
                { 'kpiRow': kpiRow }
            )) }}
        </div>
    {% endblock %}
    ```
