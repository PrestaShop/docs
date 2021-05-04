---
title: Orders

weight: 42

chapter: true
---

# Orders related code specifics

### Context state manager

Order pages were migrated to Symfony framework, but some legacy methods are still used (they are too ambiguous for
refactoring at this stage). Some of those methods, especially the ones related to cart modifications, are closely
coupled with the Context. However, the context became inconsistent, so we had to introduce the [ContextStateManager](https://github.com/PrestaShop/PrestaShop/blob/develop/src/Adapter/ContextStateManager.php),
which allows us to make sure the context contains what we expect before calling certain methods.
