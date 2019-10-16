<?php

return [
    'name' => ':skeleton_friendly_name',
    'icon' => 'icon fe-:skeleton_icon',
    'sort' => 20,
    'default_sort' => [
        '-is_active',
        'name',
    ],
];
