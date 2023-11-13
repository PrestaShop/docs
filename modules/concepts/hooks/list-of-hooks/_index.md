---
menuTitle: List of hooks
title: List of hooks
type: 
chapter: false
aliases:
 - /8/modules/sample-modules/example-hooks
mostViewedPage: true
---

# List of hooks

{{% notice tip %}}
**Search tip:** Some hooks are generated dynamically, so their names are documented in a generic way.

For example, `actionAdminCustomersFormModifier` is documented as `action<AdminControllerClassName>FormModifier`. 
A regex based search has been implemented, and generic hooks should be matched. However, when you see a controller name or action in the hook name and you can't find it, try searching for a part of the hook name, like `FormModifier`.
{{% /notice %}}

{{% notice tip %}}
Looking for available hooks in the front office? [Check out our hook mapping project]({{<relref "/8/themes/hummingbird/hooks-hummingbird-theme">}}), which provides a visual representation of hook availability in the Hummingbird theme.
{{% /notice %}}

## Search for a hook

<div id="hookFilter" class="quickfilter">
  <input type="text" name="filter" id="filter" placeholder="Type to filter">
  <p class="empty">No hooks found</p>
</div>

<script src="/js/hookFilter.js"></script>

{{<hookList>}}