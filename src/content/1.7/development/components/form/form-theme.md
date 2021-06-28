---
title: Form Theme
menuTitle: Form Theme
---

# Symfony Form Theme for PrestaShop

Symfony has a powerful [Form][sf-form-component] component that allows to create detailed class that defines how a form is supposed to behave in your application.

Symfony uses a FormRenderer to output the HTML document that contains the HTML form that matches the Form configuration.

```
{# templates/default/new.html.twig #}
{{ form_start(form, {'attr': {'novalidate': 'novalidate'}}) }}
{{ form_widget(form) }}
{{ form_end(form) }}
```

The above code aims to render different parts of the form using Twig.

PrestaShop relies on Twig FormRenderer and this renderer requires a **Form Theme** to function. A popular Form Theme being used is the [Bootstrap 4 Form Theme][sf-bootstrap4-form-theme].

The Form Theme is a set of Twig macros and functions that provide a way to render the different parts of a form: all possible inputs, labels, specific fields, specific options...

Example
```
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

PrestaShop Form themes are located in directory `src/PrestaShopBundle/Resources/views/Admin/TwigTemplateForm/`

### Original PrestaShop Form theme
{{< minver v="1.7.0" title="true" >}}

`bootstrap_4_layout.html.twig` is a copy of Symfony's original Bootstrap 4 form theme, with customizations made for PrestaShop. It relies on multiple files

- form_div_layout
- typeahead
- material

It is used to render Symfony forms vertically in PrestaShop Back-Office.

`bootstrap_4_horizontal_layout.html.twig` is a child Form theme of the above, used to render forms horizontally.

Twig templates that render forms can use this Form Theme when they use this statement
```
{% form_theme form 'PrestaShopBundle:Admin/TwigTemplateForm:bootstrap_4_layout.html.twig' %}
```

{{< figure src="../../img/old-form-theme-17.png" title="Original Form Theme example of rendering" >}}

### PrestaShop UI Kit Form theme
{{< minver v="1.7.7" title="true" >}}

Starting from 1.7.7 [a new Form Theme][pr-begin-ui-kit-form-theme] `prestashop_ui_kit_base.html.twig` was built from scratch. It extends Symfony Bootstrap 4 form theme as a base and aims to provide a cleaner and better integrated rendering.

`prestashop_ui_kit.html.twig` is a child Form theme of the above and also relies on `bootstrap_4_horizontal_layout`, in order to render forms horizontally.

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

This was counter productive as any change done in the Form Theme would not be applied to forms rendered in this way.

This is why a [refactoring project][form-theme-simplification-project] was launched in end of 2019 to rework all the Symfony forms of the Back-Office to be rendered, as much as possible, by the Form Theme only.

Which means ideally all forms in the Back-office are now rendered with a single statement:

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


[sf-form-component]: https://symfony.com/doc/current/forms.html
[sf-bootstrap4-form-theme]: https://symfony.com/doc/current/form/bootstrap4.html
[ui-kit]: {{< ref "/1.7/development/uikit.md" >}}
[pr-begin-ui-kit-form-theme]: https://github.com/PrestaShop/PrestaShop/pull/16964
[form-theme-simplification-project]: https://github.com/PrestaShop/PrestaShop/issues/16482
[example-pr-database-settings-form]: https://github.com/PrestaShop/PrestaShop/pull/21652
