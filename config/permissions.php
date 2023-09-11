<?php

/**
 * With this configuration you can define the permissions and roles of your application.
 * The permissions are defined in the following way:
 * - deploy-type: roles-and-permissions | permissions-only
 * array<string, array<string, array<string>>>
 * 'rol' => [
 *     'model|section' => [
 *        'action',
 *    ]
 * ].
 *
 * - deploy-type: permissions-only
 * array<int, string>
 */
$modelRules = [
    'list',
    'view',
    'create',
    'update',
    'destroy',
];

return [
    'admin' => [
        'user' => [
            ...$modelRules,
        ],
        'setting' => [
            'view',
        ],
    ],
];
