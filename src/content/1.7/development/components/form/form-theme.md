---
title: Form Theme
---

# Symfony Form Theme for PrestaShop

Symfony's [Form feature][sf-form-component] leverages Form Types to detail how your forms are supposed to behave in your application, handle validation, and mapping the forms to your data structures. In addition to that, Symfony forms can also render themselves to HTML using a FormRenderer and Twig.

The code below renders a whole form using Twig:

```twig
{# templates/default/new.html.twig #}
{{ form_start(form) }}
{{ form_widget(form) }}
{{ form_end(form) }}
```

PrestaShop relies on Twig's FormRenderer, which requires a **Form Theme** to function. [Bootstrap 4 Form Theme][sf-bootstrap4-form-theme] is a popular one.

The Form Theme is a set of Twig macros and functions that provide a way to render the different parts of a form: every label, input type, and specific option has its own macro.

Example for the date widget::

```twig
{%- block date_widget -%}
  {%- if widget == 'single_text' -%}
    {{ block('form_widget_simple') }}
  {%- else -%}
    <div {{ block('widget_container_attributes') }}>
      {{- date_pattern|replace({
        '{{ year }}':  form_widget(form.year),
        '{{ month }}': form_widget(form.month),
        '{{ day }}':   form_widget(form.day),
      })|raw -}}
    </div>
  {%- endif -%}
{%- endblock date_widget -%}
```

## PrestaShop form themes

PrestaShop Form themes are located in the `src/PrestaShopBundle/Resources/views/Admin/TwigTemplateForm/` directory.

### Original PrestaShop Form theme

{{% notice warning %}}
**This theme is limited and deprecated.**

Originally, Symfony forms in PrestaShop were developed using the field-by-field rendering technique, where each field is rendered individually ([see example](https://github.com/PrestaShop/PrestaShop/blob/1.7.7.0/src/PrestaShopBundle/Resources/views/Admin/Configure/AdvancedParameters/Employee/Blocks/employee_options.html.twig)). It's not possible to use the simplified `form_widget(form)` rendering method using this form theme, so it's progressively being replaced by a new one (read below).
{{% /notice %}}

This form theme is a copy of Symfony's original Bootstrap 4 form theme, with customizations made for PrestaShop.

Its base theme is `bootstrap_4_layout.html.twig`. Used to render Symfony forms vertically, it relies on multiple files:

- form_div_layout
- typeahead
- material

By default, PrestaShop's Twig templates will use `bootstrap_4_horizontal_layout.html.twig` (as configured in PrestaShop's `/app/config/config.yml` file). This child of the above theme render forms horizontally instead of vertically.

{{< figure src="../../img/old-form-theme-17.png" title="Original Form Theme example of rendering" >}}

### PrestaShop UI Kit Form theme
{{< minver v="1.7.7" title="true" >}}

Starting on 1.7.7 [a new Form Theme][pr-begin-ui-kit-form-theme] has been built from scratch to support the simplified form rendering technique described in the example at the top of this article.

Contrary to the original form theme, this theme _extends_ Symfony's Bootstrap 4 form theme, allowing it to inherit all improvements done to Symfony's own form theme since the original release of PrestaShop 1.7.0.

`prestashop_ui_kit.html.twig` extends `prestashop_ui_kit_base.html.twig` and also relies on `bootstrap_4_horizontal_layout`, in order to render forms horizontally.

Once all forms have been updated to work with the UI Kit Form Theme, it will become the default. Until then, Twig templates using this theme need activate it using this statement:

```
{% form_theme form 'PrestaShopBundle:Admin/TwigTemplateForm:prestashop_ui_kit_base.html.twig' %}
```

{{< figure src="../../img/ui-kit-form-theme.png" title="UI Kit Form Theme example of rendering" >}}


## Refactoring our forms to rely fully on the UI Kit Form Theme

In the first Symfony pages of PrestaShop, the Form Theme was used in a minimalist way, a lot of the HTML structure was hardcoded
```
<div class="form-group row">
  {{ ps.label_with_help('Enable invoices'|trans, 'If enabled, ...'|trans({}, 'Admin.Orderscustomers.Help')) }}
  <div class="col-sm">
    {{ form_errors(invoiceOptionsForm.enable_invoices) }}
    {{ form_widget(invoiceOptionsForm.enable_invoices) }}
  </div>
</div>
<div class="form-group row">
  {{ ps.label_with_help('Enable tax breakdown'|trans, 'If required, show the total amount per rate of the corresponding tax.'|trans({}, 'Admin.Orderscustomers.Help')) }}
  <div class="col-sm">
    {{ form_errors(invoiceOptionsForm.enable_tax_breakdown) }}
    {{ form_widget(invoiceOptionsForm.enable_tax_breakdown) }}
  </div>
</div>
<div class="form-group row">
  {{ ps.label_with_help('Enable product image'|trans, 'Adds a ...'|trans({}, 'Admin.Orderscustomers.Help')) }}
  <div class="col-sm">
    {{ form_errors(invoiceOptionsForm.enable_product_images) }}
    {{ form_widget(invoiceOptionsForm.enable_product_images) }}
  </div>
</div>
```

This was counterproductive as any change done in the Form Theme would not be applied to forms rendered in this way.

This is why a [refactoring project][form-theme-simplification-project] was launched at the end of 2019 to rework all the Symfony forms of the Back-Office to be rendered, as much as possible, by the Form Theme only.

This means ideally all forms in the Back-office are now rendered with a single statement:

```
{{ form_widget(form) }}
```

See the example of the [database settings form rework][example-pr-database-settings-form].

While working on this project, this allowed us to improve a lot the Form Theme capabilities, which becomes an asset for module developers that use it to render forms inside their modules.

Not only the Form Theme allows module developers to avoid writing forms manually, it also makes sure their forms fit with PrestaShop visual identity.

Finally, when the Form Theme fully controls the rendering, it is possible to greatly modify how the form is built and rendered by modifying the FormType properties. This allows module developers to modify PrestaShop built-in forms without having to override the templates.

### Project status

In PrestaShop 1.7.8.0, **85%** of the forms have been refactored to rely fully on the UI Kit Form Theme.

The last forms to be reworked will be delivered in the next version:
- Product preferences form
- Invoices settings form
- Delivery slip options form
- Payment preferences form
- Category add/edit form
- Employee add/edit form
- Employee options form
- Profile add/edit form

You can find the detailed status of the project on the [GitHub tracking issue][form-theme-simplification-project].


[sf-form-component]: https://symfony.com/doc/3.4/forms.html
[sf-bootstrap4-form-theme]: https://symfony.com/doc/3.4/form/bootstrap4.html
[ui-kit]: {{< ref "/1.7/development/uikit.md" >}}
[pr-begin-ui-kit-form-theme]: https://github.com/PrestaShop/PrestaShop/pull/16964
[form-theme-simplification-project]: https://github.com/PrestaShop/PrestaShop/issues/16482
[example-pr-database-settings-form]: https://github.com/PrestaShop/PrestaShop/pull/21652
