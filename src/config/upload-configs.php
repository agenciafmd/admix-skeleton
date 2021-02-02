<?php

return [
    ':skeleton_name_lower' => [
        'label' => 'imagem', //label do campo
        'multiple' => false, //se permite o upload multiplo
        'faker_dir' => false, #database_path('faker/:skeleton_name_lower/image'),
        'image' => [
            'sources' => [
                [
                    'conversion' => 'min-width-1366',
                    'media' => '(min-width: 1366px)',
                    'width' => 800,
                    'height' => 450,
                ],
                [
                    'conversion' => 'min-width-1280',
                    'media' => '(min-width: 1280px)',
                    'width' => 650,
                    'height' => 366,
                ],
            ],
        ],
    ],
];