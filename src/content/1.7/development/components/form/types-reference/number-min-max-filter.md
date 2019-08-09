---
title: NumberMinMaxFilterType
---

# NumberMinMaxFilterType

The `NumberMinMaxFilterType` represents two `NumberType` fields - one holds minimum value of float number type and other holds maximum value.
`NumberType` is one of the native symfony types.

## Type options

| Option   | Type    | Default | Description                           |
| -------- | ------- | ------- | ------------------------------------- |
| min_field_options  | array   | array ( 'attr' => array ( 'placeholder' => $this->trans('Min', [], 'Admin.Global')), )   | Accepts all possible values that `NumberType` has |
| max_field_options | array | array ( 'attr' => array ( 'placeholder' => $this->trans('Max', [], 'Admin.Global')), )   | Accepts all possible values that `NumberType` has      |

## Required Javascript components
    
None.

## Preview example

{{< figure src="../img/min_max_inputs.png" title="NumberMinMaxFilterType rendered in grid" >}}

This type is built for grid filters usage but can be used in forms as well.