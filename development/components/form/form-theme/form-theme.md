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

## PrestaShop UI Kit Form theme

PrestaShop Form theme is located in the `src/PrestaShopBundle/Resources/views/Admin/TwigTemplateForm/` directory.

PrestaShop UI Kit Form theme aim is to allow developers to be able to render full forms using a single `form_widget(form)` statement. This allows developers to customize the rendering by customizing the Form Theme, not the form. The changes performed on the Form Theme are done globally rather than on a single page.

This theme extends Symfony's Bootstrap 4 form theme, allowing it to inherit all improvements done to Symfony's own form theme.

`prestashop_ui_kit.html.twig` extends `prestashop_ui_kit_base.html.twig` and also relies on `bootstrap_4_horizontal_layout`, in order to render forms horizontally.

Until it becomes the default Form Theme, Twig templates that need to rely on this theme need to activate it using the following statement:

```
{% form_theme form '@PrestaShop/Admin/TwigTemplateForm/prestashop_ui_kit_base.html.twig' %}
```

{{< figure src="../img/ui-kit-form-theme.png" title="UI Kit Form Theme example of rendering" >}}

[sf-bootstrap4-form-theme]: https://symfony.com/doc/4.4/form/bootstrap4.html
