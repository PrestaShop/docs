---
title: Cleaning up
weight: 60
---

# Cleaning up

Once everything is migrated, refactored, extracted to specific classes and working like a charm, it's time to remove the old, migrated parts:

* Delete the old controller.
* Delete the old templates (delete the `admin-dev/themes/default/template/controller/{name}` folder.
* Delete the related "legacy tests".
