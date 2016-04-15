Notifications
================

Throughout the whole front office, the customer can receive notification messages from PrestaShop, to inform her about successes or errors, for instance.
Your theme can too send notifications.

The notification messages are not hardcoded in the template, but are send from the controller, so that you have consistency in case you updage/change your template.
Also, there is a good chance that all messages are already translated into your language!


Types of notifications
----------------------

An array of notification is passed to the templates, containing at least one of these:

* success: an action was performed and everything went well.
* error: something went wrong
* warning: important notice the merchant should know about.
* info: "just so you know"


Display them
------------------------------

Data are built this way:

// TODO INCLUDE JSON


In the Starter Theme, it looks like this:

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


Add your own message in your front controller
--------------------------------------

Your front controller holds the 4 following variables.

* $this->error
* $this->success
* $this->warning
* $this->danger

They are PHP arrays, and they hold messages as string.

Since PrestaShop 1.7, you can redirect AND display a message after an action.

.. code-block:: php

    $this->success[] = $this->l('Information successfully updated.');
    $this->redirectWithNotifications($this->getCurrentURL());
