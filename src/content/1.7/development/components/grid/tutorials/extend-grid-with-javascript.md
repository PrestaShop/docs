---
title: How to extend a Grid with Javascript extensions?
weight: 4
---

# Extend a grid with Javascript extensions. Preparation
Javascript grid extensions supplements grid functionality and enhances user experience.
For example, most grids contains SortingExtension which provides sorting by columns functionality, 
BulkActionCheckboxExtension which enables interactive selection of bulk actions and so on.

In this tutorial we use an example of taxes grid to show how to use extensions.
To start we will need to have a plain grid already created in php side
(you can find more docs about grid here https://devdocs.prestashop.com/1.7/development/components/grid).
After following some guides we should be ready. Our grid looks like this:
```
{% block content %}
  <div class="row justify-content-center">
    <div class="col-lg-12">
      {% include '@PrestaShop/Admin/Common/Grid/grid_panel.html.twig' with {'grid': taxGrid} %}
    </div>
  </div>
{% endblock %}

{% block javascripts %}
  {{ parent() }}

  <script src="{{ asset('themes/default/js/bundle/pagination.js') }}"></script>
{% endblock %}
```
{{< figure src="../../img/taxes_grid.png" title="Taxes grid example" >}}
Although the grid looks complete, none of the actions are working yet.
To get started, create javascript file for your page and add entry in your webpack config.
For our example, index.js will land in `admin-dev/themes/new-theme/js/pages/tax/index.js`, then
we add an entry point in `admin-dev/themes/new-theme/.webpack/common.js`.
Don't forget to add your compiled file path to html script tag (same as with pagination bundle above).

# Adding extensions

Lets open our index.js and start by importing Grid component from `admin-dev/themes/new-theme/js/components/grid/grid.js`
(note that the `admin-dev` part might differ, as it depends on PrestaShop installation).
Next - initiate the grid component by declaring `const taxGrid = new Grid('tax');`. In this case the argument `'tax'` represents the id of our grid.
```
import Grid from '../../components/grid/grid';

const $ = window.$;

$(() => {
  const taxGrid = new Grid('tax');
});
```

Now when you need specific extension, just import it from `admin-dev/themes/new-theme/js/components/grid/extension` and
add it to your grid - `taxGrid.addExtension(new SortingExtension());`.
After adding extensions, our index.js should look like this:

```
import Grid from '../../components/grid/grid';
import SortingExtension from '../../components/grid/extension/sorting-extension';
import FiltersResetExtension from '../../components/grid/extension/filters-reset-extension';
import ReloadListActionExtension from '../../components/grid/extension/reload-list-extension';
import ColumnTogglingExtension from '../../components/grid/extension/column-toggling-extension';
import SubmitRowActionExtension from '../../components/grid/extension/action/row/submit-row-action-extension';
import SubmitBulkExtension from '../../components/grid/extension/submit-bulk-action-extension';
import BulkActionCheckboxExtension from '../../components/grid/extension/bulk-action-checkbox-extension';
import ExportToSqlManagerExtension from '../../components/grid/extension/export-to-sql-manager-extension';

const $ = window.$;

$(() => {
  const taxGrid = new Grid('tax');

  taxGrid.addExtension(new ExportToSqlManagerExtension());
  taxGrid.addExtension(new ReloadListActionExtension());
  taxGrid.addExtension(new SortingExtension());
  taxGrid.addExtension(new FiltersResetExtension());
  taxGrid.addExtension(new ColumnTogglingExtension());
  taxGrid.addExtension(new SubmitRowActionExtension());
  taxGrid.addExtension(new SubmitBulkExtension());
  taxGrid.addExtension(new BulkActionCheckboxExtension());
});
```
That's it, the last thing to do is to run the compiler and extensions should be working.
