---
title: Right-To-Left languages
---

# Right-to-Left languages

PrestaShop supports Right-to-Left (RTL) languages natively, both in the Back Office and the Front Office. It can automatically transform themes to make them compatible with RTL languages.
 
Any Front Office theme can be transformed automatically by PrestaShop. Read "[RTL support][rtl-support]" in the Themes section to learn more about this system.

## Back Office support

The Back Office uses the same "theme-flipping" system as the Front Office feature. While for Front Office themes the transformation procedure must be triggered manually, in the BO this is performed automatically whenever an RTL language is activated on the shop, either by installing an RTL language or by setting up a language as RTL via edit in the BO.

### Regenerating the RTL theme

{{% notice note %}}
This assumes you have read the "RTL support" article linked above. 
{{% /notice %}}

{{% notice info %}}
Remember that PrestaShop won't overwrite already existing files. You need to delete the files you want to regenerate beforehand.
{{% /notice %}}

If you changed something in your Back Office theme and you want your change to be applied to the RTL theme, you can regenerate any RTL generated file by using this simple trick:

1. First, delete the `_rtl.css` file you want to regenerate.
2. Go to _International > Localization_, then click the "Languages" tab.
3. Edit any language.
4. Toggle the "Is RTL language" (see figure below) to "Yes" and save.\
   If the language was already RTL, toggle it to "No" and save before changing it back to "Yes". 

{{< figure src="../img/rtl-edit-language.png" title="Toggling RTL for a language" >}}  

[rtl-support]: {{< ref "/8/themes/reference/rtl" >}}
