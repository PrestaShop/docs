---
title: IntegerMinMaxFilterType
---

# IntegerMinMaxFilterType

The `IntegerMinMaxFilterType` represents two `IntegerType` fields - one holds minimum value of integer type and other holds maximum value.
`IntegerType` is one of the native symfony types.

## Type options

| Option   | Type    | Default | Description                           |
| -------- | ------- | ------- | ------------------------------------- |
| min_field_options  | array   | array ( 'attr' => array ( 'placeholder' => $this->trans('Min', [], 'Admin.Global'), 'min' => 0, 'step' => 1, ), )   | Accepts all possible values that `IntegerType` has`*` |
| max_field_options | array | array ( 'attr' => array ( 'placeholder' => $this->trans('Max', [], 'Admin.Global'), 'min' => 0, 'step' => 1, ), )   | Accepts all possible values that `IntegerType` has`*`      |

`*` - this type overrides `step` attribute to 1 due to not allow adding floating point numbers as available option.

## Required Javascript components
    
None.

## Preview example

{{< figure src="../img/min_max_inputs.png" title="IntegerMinMaxFilterType rendered in grid" >}}

This type is built for grid filters usage but can be used in forms as well.