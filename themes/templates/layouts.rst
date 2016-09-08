Templates and layouts
===========================

PrestaShop template file are based on the `Smarty 3 template engine <http://www.smarty.net/v3_overview>`_.

All template files must be stored in the theme's `templates/` subfolder. For instance, the default theme
has its template files in the following folder: `/themes/classic/templates`.

Templates are then split between various functionnaly-specific subfolders: checkout-related template files
are stored in the `/templates/checkout` subfolder, customer-related templates are in `/templates/customer`,
etc. Each of these folders can in turn have their own `_partials` subfolder.

Template files should be written so that a single .tpl can generate a whole HTML page -- unless they are
inside a `_partials` folder or subfolder (see our coding standard, linked from the Prologue chapter
of this documentation).


