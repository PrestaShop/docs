---
title: Comparison between Classic translation system and New translation system
menuTitle: Which system to use?
---

# Comparison between Classic and New translation systems

Module developers might be confused by both the Classic and New translation systems coexisting together. This page aims to help you choose the best one for your module. 

## What translation system is best for my module?

The best translation system for your module depends on two factors:

- **The minimum version of PrestaShop you intend to support:**  
  If you target 1.7.5 or earlier, you need to use the Classic system.
- **Whether your module uses Symfony controllers / Twig:**  
  If your module features Symfony controllers or uses Twig, you need to use the New system.

If you target 1.7.6 or 1.7.7, you can choose one or the other. However, if you choose the New system, you will have to use Classic translation dictionaries (PHP-based).

<style type="text/css">
.support-yes, .example-yes {
  background-color: #8ce48c;
  text-align: center;
}
.support-no, .example-no {
  background-color: #e89b9b;
}
.example-yes, .example-no {
  display: inline-block;
  width: 1.1rem; 
  height: 1.1rem;
  margin-bottom: -2px;
}
</style>

<table>
  <thead>
    <tr>
      <th></th>
      <th colspan="9" style="text-align:center">Target Minimum Version</th>
    </tr>
    <tr class="h-version-titles">
      <th></th>
      <th>&le;&nbsp;1.7.5</th>
      <th>1.7.6</th>
      <th>1.7.7</th>
      <th>&ge;&nbsp;1.7.8</th>
    </tr>
  </thead>
<tbody>
  <tr>
    <td>Classic system</td>
    <td class="support-yes">
      <i class="fa fa-check" aria-hidden="true" title="Recommended system"></i>
      <span class="sr-only">Recommended system</span>
    </td>
    <td class="support-yes"><span class="sr-only">Yes</span></td>
    <td class="support-yes"><span class="sr-only">Yes</span></td>
    <td class="support-yes"><span class="sr-only">Yes</span></td>
  </tr>
    <tr>
    <td>New system</td>
    <td class="support-no"><span class="sr-only">Not supported</span></td>
    <td class="support-yes"><span class="sr-only">It depends</span> * </td>
    <td class="support-yes"><span class="sr-only">It depends</span> * </td>
    <td class="support-yes">
      <i class="fa fa-check" aria-hidden="true" title="Recommended system"></i>
      <span class="sr-only">Recommended system</span>
    </td>
  </tr>
</tbody>
</table>

**Legend:**

<i class="fa fa-check" aria-hidden="true"></i> = Recommended system

<span class="example-no"></span><span class="sr-only">No</span> = Not available

<span class="example-yes"></span><span class="sr-only">Yes</span> = Available

<span class="example-yes"> * </span><span class="sr-only">Yes</span> = Available, but only PHP dictionaries are supported <small>(no export)</small>

## Feature comparison

The chart below summarizes the differences between the two translation systems.

&nbsp;    | Classic System | New System
--------|---------|------
Available since | < 1.7 | 1.7.6+
Translation interface | File-oriented<br><small>(default interface)</small> | Translation domain-oriented<br><small>(requires opt-in)</small>
Wording contextualization / grouping | File where the wording appears | Translation domain
Automatic discovery of new wordings in module files | ✔️ Yes | ✔️ Yes
Custom translation storage | PHP-based dictionaries<br><small>(stored within the module directory)</small> | Database
Translation distribution | PHP-based dictionaries | • PHP-based dictionaries<br>• XLIFF files {{< minver v="1.7.8" >}}
Export formats | PHP-based dictionaries | XLIFF files {{< minver v="1.7.8" >}}
Export method | Copy files from the module's directory | Download via export interface {{< minver v="1.7.8" >}}
Supported environments | FO & BO | FO & BO 
Method to use in PHP | `l(...)` | `trans(...)`
Method to use in Smarty | `{l mod="modulename" ...}` | `{l d="Modules.Modulename.Something" ...}`
Method to use in Twig | _N/A_ | `trans(...)`
Supported in legacy controllers | ✔️ Yes | ✔️ Yes
Supported in Symfony controllers | ❌ No | ✔️ Yes

