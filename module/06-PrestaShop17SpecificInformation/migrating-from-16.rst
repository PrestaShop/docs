**********************************
Migrating from 1.6
**********************************


BACKWARD COMPAT' BROKEN:

* Payment module have change, check doc.


ENSURE:

* We changed all variables passed to smarty, make sure what you use is still assigned
* $link is deprecated (even if it's still passed to smarty, it will be removed at some point), use {url} helper
* make sure your use the new way of calling templates: `fetch(module:modulename/views/template.tpl)`
* make sure you dont add your assets with hardcoded path in displayHeader hook (no change but it's bad)
* Smarty is automatically escaped
 * Remove all `|escape:'html':'UTF-8'` (FOR FRONT TEMPLATES ONLY)
 * Add `nofilter` if you print html
* Only rely documented variables !
