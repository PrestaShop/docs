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

[1]: {{< ref "8/modules/concepts/templating/" >}}
[2]: {{< ref "8/modules/concepts/services/" >}}
[3]: {{< ref "8/modules/concepts/forms/admin-forms" >}}
[4]: {{< ref "8/modules/concepts/commands" >}}
[5]: {{< ref "8/modules/concepts/controllers/admin-controllers/" >}}
[6]: {{< ref "8/modules/concepts/doctrine" >}}
[7]: {{< ref "8/modules/sample-modules/grid-and-identifiable-object-form-hooks-usage" >}}
[8]: {{< ref "8/modules/concepts/controllers/admin-controllers/override-decorate-controller" >}}
