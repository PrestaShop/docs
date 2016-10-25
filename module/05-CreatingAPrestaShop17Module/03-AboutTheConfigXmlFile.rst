About the config.xml file
========================================

The ``config.xml`` file makes it possible to optimize the loading of the
module list in the back office.

::

    <?xml version="1.0" encoding="UTF-8" ?>
    <module>
      <name>mymodule</name>
      <displayName><![CDATA[My module]]></displayName>
      <version><![CDATA[1.0]]></version>
      <description><![CDATA[Description of my module.]]></description>
      <author><![CDATA[Firstname Lastname]]></author>
      <tab><![CDATA[front_office_features]]></tab>
      <confirmUninstall>Are you sure you want to uninstall?</confirmUninstall>
      <is_configurable>0</is_configurable>
      <need_instance>0</need_instance>
      <limited_countries></limited_countries>
    </module>

A few details:

-  ``is_configurable`` indicates whether the module has a configuration
   page or not.
-  ``need_instance`` indicates whether an instance of the module must be
   created when it is displayed in the module list. This can be useful
   if the module has to perform checks on the PrestaShop configuration,
   and display warning message accordingly.
-  ``limited_countries`` is used to indicate the countries to which the
   module is limited. For instance, if the module must be limited to
   France and Spain, use
   ``<limited_countries>fr,es</limited_countries>``.
