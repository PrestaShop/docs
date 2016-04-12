notifications
================

Throughout the whole site user get flash notifications messages from PRestaShop to inform him about success or error

No message is hardcoded to the template. All message from controller so we have consistency in case you updage/change template
Plus there is a good chance all messages are already translated in your language

4 types of notifications
-----------------------------

An array of notification is passed to the templates, containing:

* success: performed action and everything went well
* error: didnt work
* warning: important notice
* info: "just so you know"

Display them
------------------------------

Data are like:

INCLUDE JSON


In starter theme it looks like:


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


Add message in your front controller
--------------------------------------

Your front controller holds the 4 following variables, they are arrays and they hold messages as string.

* $this->error
* $this->success
* $this->warning
* $this->danger


Since PrestaShop 1.7 you can redirect AND display a message after.

.. code-block:: php

    $this->success[] = $this->l('Information successfully updated.');
    $this->redirectWithNotifications($this->getCurrentURL());
