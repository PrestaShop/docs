---
title: Symfony extension concepts
weight: 8
---

# Symfony extension concepts

PrestaShop modules acts as Symfony bundles, extension points are added continuously in each minor version:

| Version  | Symfony features                                               |
|----------|----------------------------------------------------------------|
| 1.7.3    | [Twig templates][1] and [Services][2]                          |
| 1.7.4    | [Configuration Forms][3] and [Console commands][4]             |
| 1.7.5    | [Modern controllers and Security][5]                           |
| 1.7.6    | [Doctrine ORM][6] and [Entity forms][7]                        |
| 1.7.7    | [Controllers as services][8]                     |

[1]: {{< ref "1.7/modules/concepts/templating/_index.md" >}}
[2]: {{< ref "1.7/modules/concepts/services/_index.md" >}}
[3]: {{< ref "1.7/modules/concepts/forms/admin-forms.md" >}}
[4]: {{< ref "1.7/modules/concepts/commands.md" >}}
[5]: {{< ref "1.7/modules/concepts/controllers/admin-controllers/_index.md" >}}
[6]: {{< ref "1.7/modules/concepts/doctrine/_index.md" >}}
[7]: {{< ref "1.7/modules/sample-modules/grid-and-identifiable-object-form-hooks-usage/_index.md" >}}
[8]: {{< ref "1.7/modules/concepts/controllers/admin-controllers/override-decorate-controller.md" >}}
