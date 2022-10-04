---
title: How to import Core JavaScript files 
menuTitle: Import Core JavaScript files
weight: 4
---

# How to import Core JavaScript files
{{< minver v="1.7.8" title="true">}}

Most of the time, you will use the [global JavaScript components][global JavaScript components] object. However, in some cases, you might want to import a Core component using a static path, such as `admin-dev/themes/new-theme/js/components/auto-complete-search.ts`.

**We don't recommend doing this.** If you absolutely need it, make sure to remove the file extension from the import path:

```js
// Incorrect
import AutoCompletSearch from '../../../../admin-dev/themes/new-theme/js/components/auto-complete-search.js'
import AutoCompletSearch from '../../../../admin-dev/themes/new-theme/js/components/auto-complete-search.ts'

// Correct
import AutoCompletSearch from '../../../../admin-dev/themes/new-theme/js/components/auto-complete-search'
```

If you need to carry out the above import, it is likely you will be using a bundler such as Webpack or Parcel. If the file you are trying to import is a TypeScript file, you need to add the TypeScript loader to your project and a `tsconfig` file.

Example of a TypeScript loader:
```js
{
  test: /\.ts?$/,
  use: 'ts-loader',
  exclude: /node_modules/,
},
```

Example of a TypeScript configuration file:
```js
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


[global JavaScript components]: {{< ref "/8/development/components/global-components" >}}
