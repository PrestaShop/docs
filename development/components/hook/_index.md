---
title: The Hook component
menuTitle: Hook
chapter: true
---

# The Hook component

One of the main ways Modules interact with PrestaShop is through "Hooks" – PrestaShop's event system. Hooks are extension points which are placed throughout the system, allowing subscribing Modules to be notified of system events, inject content, or even alter the behavior of PrestaShop. 

There are two types of hooks:

- **Display hooks** – Integrated mainly (but not exclusively) in templates, they allow modules to provide content that will be injected at a specific place in a page. Display hook names usually start with _"display"_.
- **Action hooks** – Allow modules to be informed of something happening in the system, and optionally alter the system’s behavior by modifying the provided data. Action hook names usually start with _"action"_.

## In this section

{{% children /%}}

## Related reading

- [List of hooks]({{< relref "/8/modules/concepts/hooks/list-of-hooks" >}})
