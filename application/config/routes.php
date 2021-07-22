<?php
return [
    // MainController
    '' =>[
        'controller' => 'main',
        'action' => 'index',
    ],
    // AccountController
    'account/login' =>[
        'controller' => 'account',
        'action' => 'login',
    ],
    'account/register' =>[
        'controller' => 'account',
        'action' => 'register',
    ],
    'account/confirm/{token:\w+}' =>[
        'controller' => 'account',
        'action' => 'confirm',
    ],
    'account/reset/{token:\w+}' =>[
        'controller' => 'account',
        'action' => 'reset',
    ],
    'account/logout' =>[
        'controller' => 'account',
        'action' => 'logout',
    ],
    'account/recovery' =>[
        'controller' => 'account',
        'action' => 'recovery',
    ],
    'account/settings' =>[
        'controller' => 'account',
        'action' => 'settings',
    ],
    // ObjectsController
    'objects' =>[
        'controller' => 'objects',
        'action' => 'show',
    ],
    'objects/add' =>[
        'controller' => 'objects',
        'action' => 'add',
    ],
    'objects/delete/{id:\d+}' =>[
        'controller' => 'objects',
        'action' => 'delete',
    ],
    'objects/edit/{id:\d+}' =>[
        'controller' => 'objects',
        'action' => 'edit',
    ],
    'settings/{id:\d+}' =>[
        'controller' => 'objects',
        'action' => 'settings',
    ],
    'settings/addworktype/{id:\d+}' =>[
        'controller' => 'objects',
        'action' => 'addworktype',
    ],
    // ProjectsController
    'projects/{id:\d+}' =>[
        'controller' => 'projects',
        'action' => 'show',
    ],
    'projects/add/{id:\d+}' =>[
        'controller' => 'projects',
        'action' => 'add',
    ],
    'projects/edit/{id:\d+}/{tag:\d+}' =>[
        'controller' => 'projects',
        'action' => 'edit',
    ],
    'projects/delete/{id:\d+}/{tag:\d+}' =>[
        'controller' => 'projects',
        'action' => 'delete',
    ],
    // RepresentativesController
    'representatives/{id:\d+}' =>[
        'controller' => 'representatives',
        'action' => 'show',
    ],
    'representatives/add/{id:\d+}' =>[
        'controller' => 'representatives',
        'action' => 'add',
    ],
    'representatives/edit/{id:\d+}/{tag:\d+}' =>[
        'controller' => 'representatives',
        'action' => 'edit',
    ],
    'representatives/delete/{id:\d+}/{tag:\d+}' =>[
        'controller' => 'representatives',
        'action' => 'delete',
    ],
    // WorksController
    'works/{id:\d+}' =>[
        'controller' => 'works',
        'action' => 'show',
    ],
    'works/add/{id:\d+}' =>[
        'controller' => 'works',
        'action' => 'add',
    ],
    'works/edit/{id:\d+}/{tag:\d+}' =>[
        'controller' => 'works',
        'action' => 'edit',
    ],
    'works/delete/{id:\d+}/{tag:\d+}' =>[
        'controller' => 'objects',
        'action' => 'delete',
    ],
    // MaterialsController
    'materials/{id:\d+}' =>[
        'controller' => 'materials',
        'action' => 'show',
    ],
    'materials/add/{id:\d+}' =>[
        'controller' => 'materials',
        'action' => 'add',
    ],
    'materials/edit/{id:\d+}/{tag:\d+}' =>[
        'controller' => 'materials',
        'action' => 'edit',
    ],
    'materials/delete/{id:\d+}/{tag:\d+}' =>[
        'controller' => 'materials',
        'action' => 'delete',
    ],
    // DrawingsController
    'drawings/{id:\d+}' =>[
        'controller' => 'drawings',
        'action' => 'show',
    ],
    'drawings/add/{id:\d+}' =>[
        'controller' => 'drawings',
        'action' => 'add',
    ],
    'drawings/edit/{id:\d+}/{tag:\d+}' =>[
        'controller' => 'drawings',
        'action' => 'edit',
    ],
    'drawings/delete/{id:\d+}/{tag:\d+}' =>[
        'controller' => 'drawings',
        'action' => 'delete',
    ],
    // ProtocolsController
    'protocols/{id:\d+}' =>[
        'controller' => 'protocols',
        'action' => 'show',
    ],
    'protocols/add/{id:\d+}' =>[
        'controller' => 'protocols',
        'action' => 'add',
    ],
    'protocols/edit/{id:\d+}/{tag:\d+}' =>[
        'controller' => 'protocols',
        'action' => 'edit',
    ],
    'protocols/delete/{id:\d+}/{tag:\d+}' =>[
        'controller' => 'protocols',
        'action' => 'delete',
    ],
    // DocumentsController
    'documents/{id:\d+}' =>[
        'controller' => 'documents',
        'action' => 'show',
    ],
    'documents/add/{id:\d+}' =>[
        'controller' => 'documents',
        'action' => 'add',
    ],
    'documents/edit/{id:\d+}/{tag:\d+}' =>[
        'controller' => 'documents',
        'action' => 'edit',
    ],
    'documents/delete/{id:\d+}/{tag:\d+}' =>[
        'controller' => 'documents',
        'action' => 'delete',
    ],
    'documents/download/{id:\d+}/{tag:\d+}' =>[
        'controller' => 'documents',
        'action' => 'download',
    ],

    // AdminController
    'admin/login' =>[
        'controller' => 'admin',
        'action' => 'login',
    ],
    'admin/logout' =>[
        'controller' => 'admin',
        'action' => 'logout',
    ],
    'admin/users' =>[
        'controller' => 'admin',
        'action' => 'users',
    ],
    'admin/users/{page:\d+}' =>[
        'controller' => 'admin',
        'action' => 'users',
    ],
    'admin/delete/{id:\d+}' =>[
        'controller' => 'admin',
        'action' => 'delete',
    ],
];