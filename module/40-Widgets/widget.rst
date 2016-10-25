********************
Widgets
********************


The goal
==========

Widgets introduce 2 majors features for theme developer.

1. Use module directly into your theme

If you want to use a module, like a social sharing button module for example,
and if this module is a widget for PrestaShop 1.7, you can use something like:

.. code-block:: smarty

		<div class="product-description">
			...
		</div>

		<div id="product-social-sharing">
			{widget name="socialsharing"}
		</div>

As long as this module is installed, it will work.

With PrestaShop 1.6, you would have add to declare and hook and make sure the
module was hooked on it.

This allow you to fully control the layout of your page and display module the
way you want.


2. They can be hooks on any display hook

When you hook a widget on any display hook the module will execute the
default method.

It means that you can still have different behavior for different hooks but
now you can have a default behavior and make your module work on any hook.


How to make a module
====================

To make it available, your module has to implement the `WidgetInterface`
https://github.com/PrestaShop/PrestaShop/blob/develop/src/Core/Module/WidgetInterface.php

This interface declare 2 mandatory methods: `renderWidget` and
`getWidgetVariables`.


==================  ===========
Method      				Description
------------------  -----------
getWidgetVariables 	This method must return all variable that you want to assign to smarty.
renderWidget 				Return the generated view (fetch smarty template)
==================  ===========

`$hookname` is passed to each method, this will allow you to have a different
behavior according to the hook.


Example
=========

.. code-block:: php

		public function renderWidget($hookName = null, array $configuration = [])
		{
				if ($hookName == null && isset($configuration['hook'])) {
						$hookName = $configuration['hook'];
				}
				if (preg_match('/^displayNav\d*$/', $hookName)) {
						$template_file = 'nav.tpl';
				} elseif ($hookName == 'displayLeftColumn') {
						$template_file = 'ps_contactinfo-rich.tpl';
				} else {
						$template_file = 'ps_contactinfo.tpl';
				}
        $this->smarty->assign($this->getWidgetVariables($hookName, $configuration));
        return $this->fetch('module:'.$this->name.'/'.$template_file);
		}
		public function getWidgetVariables($hookName = null, array $configuration = [])
		{
				$address = $this->context->shop->getAddress();
				$contact_infos = [
						'company' => Configuration::get('PS_SHOP_NAME'),
						'address' => [
								'formatted' => AddressFormat::generateAddress($address, array(), '<br />'),
								'address1' => $address->address1,
								'address2' => $address->address2,
								'postcode' => $address->postcode,
								'city' => $address->city,
								'state' => (new State($address->id_state))->name[$this->context->language->id],
								'country' => (new Country($address->id_country))->name[$this->context->language->id],
						],
						'phone' => Configuration::get('PS_SHOP_PHONE'),
						'fax' => Configuration::get('PS_SHOP_FAX'),
						'email' => Configuration::get('PS_SHOP_EMAIL'),
				];
				return [
						'contact_infos' => $contact_infos,
				];
		}
