---
title: Domain References
weight: 60
---

# List of available Commands and Queries

## CustomerMessage domain

-------------------------

## CustomerService domain

### CustomerService Queries

#### GetCustomerServiceSignature

_Gets signature for replying in customer thread_

Must be constructed with|Handled by|Query result
------------------------|----------|------------
LanguageId `$languageId`| **GetCustomerServiceSignatureHandler**|`string`


#### GetCustomerThreadForViewing

_Gets customer thread for viewing_

Must be constructed with|Handled by|Query result
------------------------|----------|------------
CustomerThreadId `$customerThreadId`| **GetCustomerThreadForViewingHandler**|_CustomerThreadView_

### CustomerService Commands

#### UpdateCustomerThreadStatusCommand

_Updates customer thread with given status_

Must be constructed with|Handled by
------------------------|----------|------------
CustomerThreadId `$customerThreadId`<br>CustomerThreadStatus `$customerThreadStatus`| **UpdateCustomerThreadStatusHandler**|


#### ForwardCustomerThreadCommand

_Forwards customer thread_

Must be constructed with|Handled by
------------------------|----------|------------
(optional) EmployeeId `$employeeId`<br/>CustomerThreadId `$customerThreadId`<br/>(optional) Email `$email`<br/>string `$comment`| **ForwardCustomerThreadHandler**

