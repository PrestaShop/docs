---
title: Symfony Form Theme for PrestaShop
weight: 10
---

# Symfony Form Theme for PrestaShop

## PrestaShop usage

PrestaShop relies on Twig's FormRenderer, which requires a **Form Theme** to function. [Bootstrap 4 Form Theme][sf-bootstrap4-form-theme] is a popular one.

The Form Theme is a set of Twig macros and functions that provide a way to render the different parts of a form: every label, input type, and specific option has its own macro.

Example for the date widget:

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
{{% /notice %}}

Originally, Symfony forms in PrestaShop were developed using the field-by-field rendering technique, where each field is rendered individually ([see example](https://github.com/PrestaShop/PrestaShop/blob/1.7.7.0/src/PrestaShopBundle/Resources/views/Admin/Configure/AdvancedParameters/Employee/Blocks/employee_options.html.twig)). This method allows a fine-grained control of the rendering, but limits the extension capacities, which is why
it is progressively being replaced by a new one (read below).

This form theme is a copy of Symfony's original Bootstrap 4 form theme, with customizations made for PrestaShop.

Its base theme is `bootstrap_4_layout.html.twig`. Used to render Symfony forms vertically, it relies on multiple files:

- form_div_layout
- typeahead
- material

By default, PrestaShop's Twig templates will use `bootstrap_4_horizontal_layout.html.twig` (as configured in PrestaShop's `/app/config/config.yml` file). This child of the above theme render forms horizontally instead of vertically.

{{< figure src="../img/old-form-theme-17.png" title="Original Form Theme example of rendering" >}}


#### Files mapping

If you use `bootstrap_4_layout.html.twig` Form Theme, you will have the Original PrestaShop Form theme and the fields will be rendered vertically, one under the other.

If you use `bootstrap_4_horizontal_layout.html.twig` Form Theme, you will have the Original PrestaShop Form theme and the fields will be rendered horizontally, one next to the other, on the same row.

### PrestaShop UI Kit Form theme
{{< minver v="1.7.7" title="true" >}}

Starting on 1.7.7 [a new Form Theme][pr-begin-ui-kit-form-theme] has been built from scratch to support the simplified form rendering technique. This means that the full form is rendered using a single `form_widget(form)` statement. This allows developers to customize the rendering by customizing the Form Theme, not the form. The changes performed on the Form Theme are done globally rather than on a single page.

Contrary to the original form theme, this theme _extends_ Symfony's Bootstrap 4 form theme, allowing it to inherit all improvements done to Symfony's own form theme since the original release of PrestaShop 1.7.0.

`prestashop_ui_kit.html.twig` extends `prestashop_ui_kit_base.html.twig` and also relies on `bootstrap_4_horizontal_layout`, in order to render forms horizontally.

Once all forms have been updated to work with the UI Kit Form Theme, it will become the default. Until then, Twig templates that need to rely on this theme need to activate it using the following statement:

```
{% form_theme form 'PrestaShopBundle:Admin/TwigTemplateForm:prestashop_ui_kit_base.html.twig' %}
```

{{< figure src="../img/ui-kit-form-theme.png" title="UI Kit Form Theme example of rendering" >}}

#### Files mapping

If you use `prestashop_ui_kit_base.html.twig` Form Theme, you will have the PrestaShop UI Kit Form theme and the fields will be rendered vertically, one under the other.

If you use `prestashop_ui_kit.html.twig` Form Theme, you will have the Original PrestaShop Form theme and the fields will be rendered horizontally, one next to the other, on the same row.


[sf-bootstrap4-form-theme]: https://symfony.com/doc/3.4/form/bootstrap4.html
[ui-kit]: {{< ref "/1.7/development/uikit.md" >}}
[pr-begin-ui-kit-form-theme]: https://github.com/PrestaShop/PrestaShop/pull/16964
[example-pr-database-settings-form]: https://github.com/PrestaShop/PrestaShop/pull/21652
