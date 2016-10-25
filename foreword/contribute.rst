Contribute
=============================





How to request a new hook (with a nice PR)
--------------------------------------------

* Add hook where you want it in the codebase
* Declare it in XML

How to name it
^^^^^^^^^^^^^^^^^^^^^^^^

Action prefix for hook that do stuff.
Display prefix for hook that display stuff.
After and Before should be used at the end (ActionProductUpdateBefore
instead of ActionBeforeProductUpdate)

What to pass as a param
^^^^^^^^^^^^^^^^^^^^^^^^

Think about what you need but think even more about what other people might need.

If you need an order, pass the whole object instead of the only the ID.
