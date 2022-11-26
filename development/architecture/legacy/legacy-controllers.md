---
title: Legacy Controllers
useMermaid: true
---

# Legacy Controllers

Legacy controllers are based on PrestaShop's custom framework and go a long way back. All front controllers and all Admin controllers that haven't been migrated to Symfony yet are based on this.

## Execution flow

Legacy controllers work best when a Controller performs a single action, for example, render a page. The process has been divided in several methods, which simplifies customization via method override.

<div class='mermaid'>
%%{ init: { 'flowchart': { 'curve': 'stepAfter' } } }%%
graph TB
    A(("Controller::run()")) --> B("init()<br><i><small>Initializes the controller</small></i>")    
    B:::importantStep --> C{"checkAccess()<br><i><small>Check if the controller<br>is available for the<br> current user/viistor</small></i>"}
    C:::decision -- false --> D("initCursedPage()<br><i><small>Assigns Smarty variables when access is forbidden</small></i>")
    D --> E("smartyOutputContent()<br><i><small>Display page content</small></i>")
    E:::importantStep
    C -- true --> G("setMedia()<br><i><small>Sets controller CSS and JS files</small></i>")
    G:::notAlwaysRun --> H("postProcess()<br><i><small>Used to process user input</small></i>")
    H:::importantStep --> I{"has redirect_after"}
    I:::decision -- true --> J("redirect()<br><i><small>Redirects to redirect_after after<br>the process if there is no error</small></i>")
    I -- false --> K("initHeader()<br><i><small>Assigns Smarty variables<br>for the page header</small></i>")
    J --> K
    K:::notAlwaysRun --> L{"viewAccess()<br><i><small>Check if the current user/visiter<br>has valid view permissions</small></i>"}
    L:::decision -- false --> M("Add access denied error message<br><i><small>Added to errors property</small></i>")
    L -- true --> N("initContent()<br><i><small>Assigns Smarty variables<br>for the page main content</small></i>")
    M --> O("initFooter()<br><i><small>Assigns Smarty variables for the page footer</small></i>")
    N:::importantStep --> O
    O:::notAlwaysRun --> P{"is ajax"}
    P:::decision -- false --> Q("display()<br><i><small>Displays page content</small></i>")
    P -- true --> R("displayAjax{action}()<br><i><small>Displays page content<br>for ajax requests</small></i>")
    Q:::importantStep
    R:::importantStep
    subgraph Legend
        direction LR
        S:::notAlwaysRun
        S("Not always Run")
        T:::importantStep
        T("Important step")
    end
    classDef notAlwaysRun fill:#fff0c4;
    classDef importantStep fill:#c7e6ce;
    classDef decision fill:#e2d0e5;
    classDef default fill:#FFFFFF;
    style Legend fill:#FFFFFF,stroke:#CCCCCC,stroke-width:1px;
</div>