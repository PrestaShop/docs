****************
Theme.yml
****************

The theme. yml defines all the theme configuration like version number, layouts, compatibility range, hook configuration...

theme description
=========================

Name must match directory name

Users will be able to choose each page's layout from the theme's settings page. Layouts are automatically parsed from the templates/layouts folder so this configuration key is optional, but it allows designers to provide some more user friendly info than just a filename.

.. code-block:: yaml

  name: StarterTheme # The name must match the directory name
  display_name: Starter Theme
  version: 1.0.0
  author:
    name: "John Doe"
    email: "pub@prestashop.com"
    url: "http://www.prestashop.com"
  meta:
    compatibility:
        from: 1.7.0.0
        to: ~
    available_layouts:
      layout-full-width:
        name: Full width layout
        description: Ideal for product pages to maximize picture size
      layout-left-side-column:
        name: One small left column
        description: Great for CMS pages to show advertisements on the side


Global settings
====================

configuration
------------------

change PrestaShop configuration when the theme is enabled

.. code-block:: yaml

  global_settings:
    configuration:
      PS_QUICK_VIEW: false
      NEW_PRODUCTS_NBR: 4
      PS_PNG_QUALITY: 8




Modules
----------------------

.. code-block:: yaml

  global_settings:
    modules:
      to_enable:
        # All modules below are enabled when
        # the theme is enabled (and installed if needed).
        # They are disabled when the theme is disabled.
        - my-custom-module
        - yippeeslider
      to_disable:
        # All modules below are disabled when the theme is enabled.
        # They are re-enabled when the theme is disabled.
        - homeslider
        - blockwishlist


global_settings:
  hooks:
    custom_hooks:
      - name: displayFooterBefore
        title: displayFooterBefore
        description: Add a widget area above the footer
    modules_to_hook:
      displayHeaderTop:
        # displayHeaderTop will have exactly the following
        # modules hooked to it, in the specified order.
        # Each module in this list will be unhooked
        # from all other display hooks it is hooked to.
        - blocklanguages
        - blockcurrencies
        - blockuserinfo
      displayHeaderMiddle:
        # displayHeaderMiddle will have whatever is currently hooked to it
        # kept hooked to it, and blocksearch will be appended
        # to the list (or moved to the end if already hooked there).
        - ~
        - blocksearch
      displayHeaderBottom:
        # displayHeaderBottom will have blocktopmenu and blockcart
        # prepended to it.
        - blocktopmenu
        - blockcart
        - ~
      displayFooter:
        - blocknewsletter
      displayLeftColumn:
        # blockcategories is hooked on all pages on displayLeftColumn
        - blockcategories
        # blocktags is hooked on displayLeftColumn on all pages
        # except "category" and "index"
        - blocktags:
            except_pages:
              - category
              - index


Image settings
--------------------

When theme will be enabled, all image types will be removed Template must declare their image type.

.. code-block:: yaml

  global_settings:
    image_types:
      cart_default:
        width: 80
        height: 80
        scope: [products]
      small_default:
        width: 125
        height: 125
        scope: [products, categories, manufacturers, suppliers]
      medium_default:
        width: 300
        height: 300
        scope: [products, categories, manufacturers, suppliers]
      large_default:
        width: 500
        height: 500
        scope: [products]
      home_default:
        width: 250
        height: 250
        scope: [products]
      category_default:
        width: 960
        height: 350
        scope: [categories]
      product_listing:
        width: 220
        height: 220
        scope: [products, categories, manufacturers, suppliers]
      large_banner:
        width: 960
        height: 400
        scope: [categories]


Theme settings
---------------------

All the settings below can be changed through an interface in the theme's administration panel, and only depend on the theme / shop combination.
When this file is parsed by PrestaShop, this configuration key (theme_settings) is copied to a file name settings_n.yml where n is the id of the shop where the theme is installed.
When configuration is changed through the interface, only the settings_n.yml file is updated and theme.yml remains unchanged.

.. code-block:: yaml

  global_settings:
    theme_settings:
      default_layout: layout-full-width
      layouts:
        # Specific layout for some pages
        identity: layout-left-side-column
        order-confirmation: layout-left-side-column
