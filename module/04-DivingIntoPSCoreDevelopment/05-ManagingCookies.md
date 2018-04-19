Managing Cookies
================

PrestaShop uses encrypted cookies to store all the session information,
for visitors/clients as well as for employees/administrators.

The Cookie class (`/classes/Cookie.php`) is used to read and write
cookies.

In order to access the cookies from within PrestaShop code, you can use
this:

    $this->context->cookie;

All the information stored within a cookie is available using this code:

    $this->context->cookie->variable;

    If you need to access the PrestaShop cookie from non-PrestaShop code, you can use this code:
    include_once('path_to_prestashop/config/config.inc.php');
    include_once('path_to_prestashop/config/settings.inc.php');
    include_once('path_to_prestashop/classes/Cookie.php');
    $cookie = new Cookie('ps'); // Use "psAdmin" to read an employee's cookie.

Data stored in a visitor/client's cookie
----------------------------------------

  ----------------------------
  Token      Description
  ---------- -----------------
  date\_a dd The date and time
             the cookie was
             created (in
             YYYY-MM-DD
             HH:MM:SS format).

  id\_lan g  The ID of the
             selected
             language.

  id\_cur    The ID of the
  rency      selected
             currency.

  last\_v    he ID of the last
  isited     visited category
  \_catego   of product
  ry T       listings.

  ajax\_b    Whether the cart
  lockcar    block is
  t\_disp    "expanded" or
  lay        "collapsed".

  viewed     The IDs of
             recently viewed
             products as a
             comma-separate d
             list.

  id\_wis    The ID of the
  hlist      current wishlist
             displayed in the
             wishlist block.

  checked    Whether the
  TOS        "Terms of
             service" checkbox
             has been ticked
             (1 if it has and
             0 if it hasn't).

  id\_gue st The guest ID of
             the visitor when
             not logged in.

  id\_con    The connection ID
  nection s  of the visitor's
             current session.

  id\_cus    The customer ID
  tomer      of the visitor
             when logged in.

  custome    The last name of
  r\_last    the customer.
  name       

  custome    The first name of
  r\_firs    the customer.
  tname      

  logged     Whether the
             customer is
             logged in.

  passwd     The MD5 hash of
             the
             `_COOKIE_KEY_` in
             `config/setti ngs
             .inc.php`
             and the password
             the customer used
             to log in.

  email      The email address
             that the customer
             used to log in.

  id\_car t  The ID of the
             current cart
             displayed in the
             cart block.

  checksu m  The Blowfish
             checksum used to
             determine whether
             the cookie has
             been modified by
             a third party.
             The customer will
             be logged out and
             the cookie
             deleted if the
             checksum doesn't
             match.
  ----------------------------

Data stored in an employee/administrator's cookie
-------------------------------------------------

  ----------------------------
  Token      Description
  ---------- -----------------
  date\_a dd The date and time
             the cookie was
             created (in
             YYYY-MM-DD
             HH:MM:SS format).

  id\_lan g  The ID of the
             selected
             language.

  id\_emp    The ID of the
  loyee      employee.

  lastnam e  The last name of
             the employee.

  firstna me The first name of
             the employee.

  email      The email address
             the employee used
             to log in.

  profile    The ID of the
             profile that
             determines which
             tabs the employee
             can access.

  passwd     The MD5 hash of
             the
             `_COOKIE_KEY_` in
             `config/setti ngs
             .inc.php`
             and the password
             the employee used
             to log in.

  checksu m  The Blowfish
             checksum used to
             determine whether
             the cookie has
             been modified by
             a third party. If
             the checksum
             doesn't match,
             the customer will
             be logged out and
             the cookie is
             deleted.
  ----------------------------


