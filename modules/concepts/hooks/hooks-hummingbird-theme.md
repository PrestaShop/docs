---
title: Hooks on Hummingbird Theme
weight: 3
---

# Hooks on Hummingbird Theme

Hummingbird theme introduced a brand new UI for the PrestaShop front office. 

A visual map of hook locations was created by the Design team at PrestaShop. 

{{% notice note %}}
This page integrates Figma iframes, it may require heavy resources and cause performance issues on slower machines.
{{% /notice %}}

{{< toc >}}


## Home page

<iframe style="border: 1px solid rgba(0, 0, 0, 0);" width="100%" height="450" src="https://www.figma.com/embed?embed_host=share&url=https%3A%2F%2Fwww.figma.com%2Ffile%2FHKGzVBx5p2JaFrFocGe6p0%2FHook-Cartography%3Ftype%3Ddesign%26node-id%3D128%253A15442%26mode%3Ddesign%26t%3DIcCnIO2KXW3WErLh-1" allowfullscreen></iframe>

| Hook |  |
| --- | --- |
| `displayAfterTitleTag` | [Documentation]({{< relref "/8/modules/concepts/hooks/list-of-hooks/displayAfterTitleTag">}}) |
| `displayAfterBodyOpeningTag` | [Documentation]({{< relref "/8/modules/concepts/hooks/list-of-hooks/displayAfterBodyOpeningTag">}}) |
| `displayBanner` | [Documentation]({{< relref "/8/modules/concepts/hooks/list-of-hooks/displayBanner">}}) |
| `displayNav1` | [Documentation]({{< relref "/8/modules/concepts/hooks/list-of-hooks/displayNav1">}}) |
| `displayNav2` | [Documentation]({{< relref "/8/modules/concepts/hooks/list-of-hooks/displayNav2">}}) |
| `displayTop` | [Documentation]({{< relref "/8/modules/concepts/hooks/list-of-hooks/displayTop">}}) |
| `displayNavFullWidth` | [Documentation]({{< relref "/8/modules/concepts/hooks/list-of-hooks/displayNavFullWidth">}}) |
| `displayWrapperTop` | |
| `displayContentWrapperTop` | |
| `displayContentWrapperBottom` |  |
| `displayWrapperBottom` |  |
| `displayFooterBefore` | [Documentation]({{< relref "/8/modules/concepts/hooks/list-of-hooks/displayFooterBefore">}}) |
| `displayFooter` | [Documentation]({{< relref "/8/modules/concepts/hooks/list-of-hooks/displayFooter">}}) |
| `displayMyAccountBlock` | [Documentation]({{< relref "/8/modules/concepts/hooks/list-of-hooks/displayMyAccountBlock">}}) |
| `displayFooterAfter` | [Documentation]({{< relref "/8/modules/concepts/hooks/list-of-hooks/displayFooterAfter">}}) |
| `displayBeforeBodyClosingTag` | [Documentation]({{< relref "/8/modules/concepts/hooks/list-of-hooks/displayBeforeBodyClosingTag">}}) |

## Category page

<iframe style="border: 1px solid rgba(0, 0, 0, 0.1);" width="100%" height="450" src="https://www.figma.com/embed?embed_host=share&url=https%3A%2F%2Fwww.figma.com%2Ffile%2FHKGzVBx5p2JaFrFocGe6p0%2FHook-Cartography%3Ftype%3Ddesign%26node-id%3D128%253A15444%26mode%3Ddev" allowfullscreen></iframe>

| Hook |  |
| --- | --- |
| `displayLeftColumn` | [Documentation]({{< relref "/8/modules/concepts/hooks/list-of-hooks/displayLeftColumn">}}) |
| `displayHeaderCategory` | [Documentation]({{< relref "/8/modules/concepts/hooks/list-of-hooks/displayHeaderCategory">}}) |
| `displayFooterCategory` | [Documentation]({{< relref "/8/modules/concepts/hooks/list-of-hooks/displayFooterCategory">}}) |

## Product page

<iframe style="border: 1px solid rgba(0, 0, 0, 0.1);" width="100%" height="450" src="https://www.figma.com/embed?embed_host=share&url=https%3A%2F%2Fwww.figma.com%2Ffile%2FHKGzVBx5p2JaFrFocGe6p0%2FHook-Cartography%3Ftype%3Ddesign%26node-id%3D128%253A15447%26mode%3Ddev" allowfullscreen></iframe>

| Hook |  |
| --- | --- |
| `displayProductActions` | [Documentation]({{< relref "/8/modules/concepts/hooks/list-of-hooks/displayProductActions">}}) |
| `displayProductAdditionalInfo` | [Documentation]({{< relref "/8/modules/concepts/hooks/list-of-hooks/displayProductAdditionalInfo">}}) |
| `displayProductButtons` |  |
| `displayAfterProductThumbs` | [Documentation]({{< relref "/8/modules/concepts/hooks/list-of-hooks/displayAfterProductThumbs">}}) |
| `displayReassurance` | [Documentation]({{< relref "/8/modules/concepts/hooks/list-of-hooks/displayReassurance">}}) |
| `displayLeftColumnProduct` | [Documentation]({{< relref "/8/modules/concepts/hooks/list-of-hooks/displayLeftColumnProduct">}}) |
| `displayRightColumnProduct` | [Documentation]({{< relref "/8/modules/concepts/hooks/list-of-hooks/displayRightColumnProduct">}}) |
| `displayFooterProduct` | [Documentation]({{< relref "/8/modules/concepts/hooks/list-of-hooks/displayFooterProduct">}}) |
| `displayCardModalContent` |  |
| `displayCardModalFooter` |  |
| `displayProductAdditionalInfo` | [Documentation]({{< relref "/8/modules/concepts/hooks/list-of-hooks/displayProductAdditionalInfo">}}) |

## Cart page

<iframe style="border: 1px solid rgba(0, 0, 0, 0.1);" width="100%" height="450" src="https://www.figma.com/embed?embed_host=share&url=https%3A%2F%2Fwww.figma.com%2Ffile%2FHKGzVBx5p2JaFrFocGe6p0%2FHook-Cartography%3Ftype%3Ddesign%26node-id%3D128%253A15450%26mode%3Ddev" allowfullscreen></iframe>

| Hook |  |
| --- | --- |
| `displayShoppingCart` | [Documentation]({{< relref "/8/modules/concepts/hooks/list-of-hooks/displayShoppingCart">}}) |
| `displayCartExtraProductActions` | [Documentation]({{< relref "/8/modules/concepts/hooks/list-of-hooks/displayCartExtraProductActions">}}) |
| `displayReassurance` | [Documentation]({{< relref "/8/modules/concepts/hooks/list-of-hooks/displayReassurance">}}) |
| `displayShoppingCartFooter` | [Documentation]({{< relref "/8/modules/concepts/hooks/list-of-hooks/displayShoppingCartFooter">}}) |
| `displayCrossSellingShoppingCart` | [Documentation]({{< relref "/8/modules/concepts/hooks/list-of-hooks/displayCrossSellingShoppingCart">}}) |

## Checkout flow

<iframe style="border: 1px solid rgba(0, 0, 0, 0.1);" width="100%" height="450" src="https://www.figma.com/embed?embed_host=share&url=https%3A%2F%2Fwww.figma.com%2Ffile%2FHKGzVBx5p2JaFrFocGe6p0%2FHook-Cartography%3Ftype%3Ddesign%26node-id%3D128%253A15452%26mode%3Ddev" allowfullscreen></iframe>

| Hook |  |
| --- | --- |
| `displayPersonalInformationTop` | [Documentation]({{< relref "/8/modules/concepts/hooks/list-of-hooks/displayPersonalInformationTop">}}) |
| `displayCustomerAccountForm` | [Documentation]({{< relref "/8/modules/concepts/hooks/list-of-hooks/displayCustomerAccountForm">}}) |
| `displayCheckoutSummaryTop` | [Documentation]({{< relref "/8/modules/concepts/hooks/list-of-hooks/displayCheckoutSummaryTop">}}) |
| `displayReassurance` | [Documentation]({{< relref "/8/modules/concepts/hooks/list-of-hooks/displayReassurance">}}) |
| `displayBeforeCarrier` | [Documentation]({{< relref "/8/modules/concepts/hooks/list-of-hooks/displayBeforeCarrier">}}) |
| `displayAfterCarrier` | [Documentation]({{< relref "/8/modules/concepts/hooks/list-of-hooks/displayAfterCarrier">}}) |
| `displayPaymentTop` | [Documentation]({{< relref "/8/modules/concepts/hooks/list-of-hooks/displayPaymentTop">}}) |
| `displayPaymentByBinaries` | [Documentation]({{< relref "/8/modules/concepts/hooks/list-of-hooks/displayPaymentByBinaries">}}) |
| `displayPaymentReturn` | [Documentation]({{< relref "/8/modules/concepts/hooks/list-of-hooks/displayPaymentReturn">}}) |
| `displayOrderConfirmation` | [Documentation]({{< relref "/8/modules/concepts/hooks/list-of-hooks/displayOrderConfirmation">}}) |
| `displayRightColumn` | [Documentation]({{< relref "/8/modules/concepts/hooks/list-of-hooks/displayRightColumn">}}) |
| `displayOrderConfirmation2` | [Documentation]({{< relref "/8/modules/concepts/hooks/list-of-hooks/displayOrderConfirmation2">}}) |

## Contact page

<iframe style="border: 1px solid rgba(0, 0, 0, 0.1);" width="100%" height="450" src="https://www.figma.com/embed?embed_host=share&url=https%3A%2F%2Fwww.figma.com%2Ffile%2FHKGzVBx5p2JaFrFocGe6p0%2FHook-Cartography%3Ftype%3Ddesign%26node-id%3D128%253A15459%26mode%3Ddev" allowfullscreen></iframe>

| Hook |  |
| --- | --- |
| `displayContactLeftColumn` | [Documentation]({{< relref "/8/modules/concepts/hooks/list-of-hooks/displayContactLeftColumn">}}) |
| `displayContactRightColumn` | [Documentation]({{< relref "/8/modules/concepts/hooks/list-of-hooks/displayContactRightColumn">}}) |
| `displayContactContent` | [Documentation]({{< relref "/8/modules/concepts/hooks/list-of-hooks/displayContactContent">}}) |
| `displayGDPRContent` |  |

## Connexion page

<iframe style="border: 1px solid rgba(0, 0, 0, 0.1);" width="100%" height="450" src="https://www.figma.com/embed?embed_host=share&url=https%3A%2F%2Fwww.figma.com%2Ffile%2FHKGzVBx5p2JaFrFocGe6p0%2FHook-Cartography%3Ftype%3Ddesign%26node-id%3D128%253A15461%26mode%3Ddev" allowfullscreen></iframe>

| Hook |  |
| --- | --- |
| `displayCustomerLoginFormAfter` | [Documentation]({{< relref "/8/modules/concepts/hooks/list-of-hooks/displayCustomerLoginFormAfter">}}) |
| `displayCustomerAccountFormTop` | [Documentation]({{< relref "/8/modules/concepts/hooks/list-of-hooks/displayCustomerAccountFormTop">}}) |
| `displayCustomerAccountForm` | [Documentation]({{< relref "/8/modules/concepts/hooks/list-of-hooks/displayCustomerAccountForm">}}) |

## My account

<iframe style="border: 1px solid rgba(0, 0, 0, 0.1);" width="100%" height="450" src="https://www.figma.com/embed?embed_host=share&url=https%3A%2F%2Fwww.figma.com%2Ffile%2FHKGzVBx5p2JaFrFocGe6p0%2FHook-Cartography%3Ftype%3Ddesign%26node-id%3D128%253A15463%26mode%3Ddev" allowfullscreen></iframe>

| Hook |  |
| --- | --- |
| `displayCustomerAccount` | [Documentation]({{< relref "/8/modules/concepts/hooks/list-of-hooks/displayCustomerAccount">}}) |
| `displayOrderDetail` | [Documentation]({{< relref "/8/modules/concepts/hooks/list-of-hooks/displayOrderDetail">}}) |
| `displayAdditionalCustomerAddressFields` | [Documentation]({{< relref "/8/modules/concepts/hooks/list-of-hooks/displayAdditionalCustomerAddressFields">}}) |
