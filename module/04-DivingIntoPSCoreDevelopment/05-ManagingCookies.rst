Managing Cookies
========================================

PrestaShop uses encrypted cookies to store all the session information,
for visitors/clients as well as for employees/administrators.

The Cookie class (``/classes/Cookie.php``) is used to read and write
cookies.

In order to access the cookies from within PrestaShop code, you can use
this:

::

    $this->context->cookie;

All the information stored within a cookie is available using this code:

::

    $this->context->cookie->variable;

::

    If you need to access the PrestaShop cookie from non-PrestaShop code, you can use this code:
    include_once('path_to_prestashop/config/config.inc.php');
    include_once('path_to_prestashop/config/settings.inc.php');
    include_once('path_to_prestashop/classes/Cookie.php');
    $cookie = new Cookie('ps'); // Use "psAdmin" to read an employee's cookie.

Data stored in a visitor/client's cookie
---------------------------------------------------

+---------+----------------+
| Token   | Description    |
+=========+================+
| date\_a | The date and   |
| dd      | time the       |
|         | cookie was     |
|         | created (in    |
|         | YYYY-MM-DD     |
|         | HH:MM:SS       |
|         | format).       |
+---------+----------------+
| id\_lan | The ID of the  |
| g       | selected       |
|         | language.      |
+---------+----------------+
| id\_cur | The ID of the  |
| rency   | selected       |
|         | currency.      |
+---------+----------------+
| last\_v | he ID of the   |
| isited\ | last visited   |
| _catego | category of    |
| ry      | product        |
| T       | listings.      |
+---------+----------------+
| ajax\_b | Whether the    |
| lockcar | cart block is  |
| t\_disp | "expanded" or  |
| lay     | "collapsed".   |
+---------+----------------+
| viewed  | The IDs of     |
|         | recently       |
|         | viewed         |
|         | products as a  |
|         | comma-separate |
|         | d              |
|         | list.          |
+---------+----------------+
| id\_wis | The ID of the  |
| hlist   | current        |
|         | wishlist       |
|         | displayed in   |
|         | the wishlist   |
|         | block.         |
+---------+----------------+
| checked | Whether the    |
| TOS     | "Terms of      |
|         | service"       |
|         | checkbox has   |
|         | been ticked (1 |
|         | if it has and  |
|         | 0 if it        |
|         | hasn't).       |
+---------+----------------+
| id\_gue | The guest ID   |
| st      | of the visitor |
|         | when not       |
|         | logged in.     |
+---------+----------------+
| id\_con | The connection |
| nection | ID of the      |
| s       | visitor's      |
|         | current        |
|         | session.       |
+---------+----------------+
| id\_cus | The customer   |
| tomer   | ID of the      |
|         | visitor when   |
|         | logged in.     |
+---------+----------------+
| custome | The last name  |
| r\_last | of the         |
| name    | customer.      |
+---------+----------------+
| custome | The first name |
| r\_firs | of the         |
| tname   | customer.      |
+---------+----------------+
| logged  | Whether the    |
|         | customer is    |
|         | logged in.     |
+---------+----------------+
| passwd  | The MD5 hash   |
|         | of the         |
|         | ``_COOKIE_KEY_ |
|         | ``             |
|         | in             |
|         | ``config/setti |
|         | ngs.inc.php``  |
|         | and the        |
|         | password the   |
|         | customer used  |
|         | to log in.     |
+---------+----------------+
| email   | The email      |
|         | address that   |
|         | the customer   |
|         | used to log    |
|         | in.            |
+---------+----------------+
| id\_car | The ID of the  |
| t       | current cart   |
|         | displayed in   |
|         | the cart       |
|         | block.         |
+---------+----------------+
| checksu | The Blowfish   |
| m       | checksum used  |
|         | to determine   |
|         | whether the    |
|         | cookie has     |
|         | been modified  |
|         | by a third     |
|         | party. The     |
|         | customer will  |
|         | be logged out  |
|         | and the cookie |
|         | deleted if the |
|         | checksum       |
|         | doesn't match. |
+---------+----------------+

Data stored in an employee/administrator's cookie
------------------------------------------------------------

+---------+----------------+
| Token   | Description    |
+=========+================+
| date\_a | The date and   |
| dd      | time the       |
|         | cookie was     |
|         | created (in    |
|         | YYYY-MM-DD     |
|         | HH:MM:SS       |
|         | format).       |
+---------+----------------+
| id\_lan | The ID of the  |
| g       | selected       |
|         | language.      |
+---------+----------------+
| id\_emp | The ID of the  |
| loyee   | employee.      |
+---------+----------------+
| lastnam | The last name  |
| e       | of the         |
|         | employee.      |
+---------+----------------+
| firstna | The first name |
| me      | of the         |
|         | employee.      |
+---------+----------------+
| email   | The email      |
|         | address the    |
|         | employee used  |
|         | to log in.     |
+---------+----------------+
| profile | The ID of the  |
|         | profile that   |
|         | determines     |
|         | which tabs the |
|         | employee can   |
|         | access.        |
+---------+----------------+
| passwd  | The MD5 hash   |
|         | of the         |
|         | ``_COOKIE_KEY_ |
|         | ``             |
|         | in             |
|         | ``config/setti |
|         | ngs.inc.php``  |
|         | and the        |
|         | password the   |
|         | employee used  |
|         | to log in.     |
+---------+----------------+
| checksu | The Blowfish   |
| m       | checksum used  |
|         | to determine   |
|         | whether the    |
|         | cookie has     |
|         | been modified  |
|         | by a third     |
|         | party. If the  |
|         | checksum       |
|         | doesn't match, |
|         | the customer   |
|         | will be logged |
|         | out and the    |
|         | cookie is      |
|         | deleted.       |
+---------+----------------+
