---
title: Theme FAQ
---

# Theme FAQ

**Q:** Why new-theme directory does not have a package.json?

**A:** If you use PrestaShop's production ZIP release instead of the sources, new-theme directory will not have a package.json. `npm run build` will then fail.

```
Module build failed: Error: Couldn't find preset "env" relative to directory
```

You can solve this by changing to a release for development or by copy the necessary json file to your new-theme folder, navigate there and run `npm install`.