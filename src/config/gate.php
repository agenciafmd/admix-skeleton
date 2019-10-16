<?php

return [
    [
        'name' => config(':package_name.name'),
        'policy' => '\:namespace_vendor\:namespace_skeleton_name\Policies\:skeleton_namePolicy',
        'abilities' => [
            [
                'name' => 'visualizar',
                'method' => 'view',
            ],
            [
                'name' => 'criar',
                'method' => 'create',
            ],
            [
                'name' => 'atualizar',
                'method' => 'update',
            ],
            [
                'name' => 'deletar',
                'method' => 'delete',
            ],
            [
                'name' => 'restarurar',
                'method' => 'restore',
            ],
        ],
        'sort' => 10,
    ],
];
