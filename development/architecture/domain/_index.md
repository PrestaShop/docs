---
title: Domain-driven architecture
menuTitle: Domain-driven architecture
weight: 60
summary: "Where PrestaShop architecture is going"
---

# Domain-driven architecture

PrestaShop's architecture is progressively evolving into a new generation, inspired by Eric Evans's [Domain-driven design (or DDD)](https://en.wikipedia.org/wiki/Domain-driven_design).

This new design aims to make the architecture easier to understand, maintain and extend, and is driven by the following basic principles:

- Objects and their interactions should be designed in a way that closely represents business concepts and interactions, instead of technical abstractions.
- Optimize for consistency rather than reusability.

One of the main features at the heart of this design is _Command-Query Responsibility Segregation_, or CQRS.

## Read more

{{% children /%}}
