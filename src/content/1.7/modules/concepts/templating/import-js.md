---
title: How to import core js files 
menuTitle: Import core js files
weight: 4
aliases:
- 1.7/modules/templating/
---

# How to import core js files
{{< minver v="1.7.8" title="true">}}

Most of times, you want to use the [global JavaScript components][global JavaScript components] object but in some cases, you may wants to import a component using a static path such as `admin-dev/themes/new-theme/js/components/auto-complete-search.ts`.

**We do not recommend to do this**, but in case you absolutly need it be careful to import the file without any extensions:

```javascript
// Incorrect
import AutoCompletSearch from '../../../../admin-dev/themes/new-theme/js/components/auto-complete-search.js'
import AutoCompletSearch from '../../../../admin-dev/themes/new-theme/js/components/auto-complete-search.ts'

// Correct
import AutoCompletSearch from '../../../../admin-dev/themes/new-theme/js/components/auto-complete-search'
```

As you're importing this, we consider that you're using a bundler such as Webpack or Parcel. If the file you're trying to import is a TypeScript file, you'll need to add the `TypeScript loader` to you're project and a `tsconfig` file.

Example of a TypeScript loader:
```javascript
{
  test: /\.ts?$/,
  use: 'ts-loader',
  exclude: /node_modules/,
},
```

Example of a TypeScript config file:
```javascript
{
  "compilerOptions": {
    "outDir": "./public/",
    "noImplicitAny": true,
    "module": "es6",
    "target": "es5",
    "strict": true,
    "moduleResolution": "node",
    "allowSyntheticDefaultImports": true,
    "allowJs": true,
    "baseUrl": "./",
    "paths": {
      "@app/*": ["js/app/*"],
      "@js/*": ["js/*"],
      "@pages/*": ["js/pages/*"],
      "@components/*": ["js/components/*"],
      "@scss/*": ["scss/*"],
      "@node_modules/*": ["node_modules/*"],
      "@vue/*": ["js/vue/*"],
      "@PSTypes/*": ["js/types/*"]
    },
    "typeRoots": ["js/types", "node_modules/@types"]
  },
  "ts-node": {
    "compilerOptions": {
      "module": "commonjs"
    }
  }
}
```


[global JavaScript components]: {{< ref "/1.7/development/components/global-components" >}}
