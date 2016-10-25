Notifications
=============================

Throughout the whole front office, the customer can receive notification messages
from PrestaShop, to inform her about successes or errors for instance.
Your theme can too send notifications when certain events occur.

The notification messages are not hardcoded in the template files, but are sent
from the controller, so that you have consistency in case you update/change your theme.
Also, this way there is a better chance that all notification messages are already
translated into your language!


Types of notifications
------------------------------

An array of notification is passed to the templates, containing at least one of these:

+-------------+-----------------------------------------------------------------+
| success     | An action was performed and everything went well.               |
+-------------+-----------------------------------------------------------------+
| error       | Something went wrong.                                           |
+-------------+-----------------------------------------------------------------+
| warning     | Important notice the merchant should know about.                |
+-------------+-----------------------------------------------------------------+
| info        | "just so you know".                                             |
+-------------+-----------------------------------------------------------------+


How to display notifications
------------------------------


In the Starter Theme, `notifications are implemented as a partial template file <https://github.com/PrestaShop/StarterTheme/blob/master/templates/_partials/notifications.tpl>`_:

.. code-block:: smarty

  <aside id="notifications">
    <div class="container">
      {if $notifications.error}
        <article class="alert alert-danger" role="alert">
          <ul>
            {foreach $notifications.error as $notif}
              <li>{$notif}</li>
            {/foreach}
          </ul>
        </article>
      {/if}

      {if $notifications.warning}
        <article class="alert alert-warning" role="alert">
          <ul>
            {foreach $notifications.warning as $notif}
              <li>{$notif}</li>
            {/foreach}
          </ul>
        </article>
      {/if}

      {if $notifications.success}
        <article class="alert alert-success" role="alert">
          <ul>
            {foreach $notifications.success as $notif}
              <li>{$notif}</li>
            {/foreach}
          </ul>
        </article>
      {/if}

      {if $notifications.info}
        <article class="alert alert-info" role="alert">
          <ul>
            {foreach $notifications.info as $notif}
              <li>{$notif}</li>
            {/foreach}
          </ul>
        </article>
      {/if}
    </div>
  </aside>

...and are then `included in the template file <https://github.com/PrestaShop/StarterTheme/blob/master/templates/checkout/checkout.tpl#L18-L20>`_:

.. code-block:: smarty

    {block name='notifications'}
      {include file='_partials/notifications.tpl'}
    {/block}


Add your own message in your front controller
------------------------------------------------

Your front controller holds `the 4 following variables <https://github.com/PrestaShop/PrestaShop/blob/develop/classes/controller/FrontController.php#L618-L640>`_:

* ``$this->error``
* ``$this->success``
* ``$this->warning``
* ``$this->danger``

They are PHP arrays, and they hold messages as a string.

Since PrestaShop 1.7, you can `redirect the customer AND display a message after an action <https://github.com/PrestaShop/PrestaShop/blob/develop/classes/controller/FrontController.php#L553-L572>`_.

.. code-block:: php

    $this->success[] = $this->l('Information successfully updated.');
    $this->redirectWithNotifications($this->getCurrentURL());
