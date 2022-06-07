<?php
# 2 level
$user = [
    'id' => 1,
    'name' => 'ahmed',
    'activities' => [
        'gym', 'reading'
    ],
    'orders' => [
        '150 EGP', '250 EGP'
    ]
];
// echo $user['id'];
// echo $user['activities'][0];
// echo $user['orders'][0];
// echo $user['orders'][1];

# 3 levels
$users = [
    [
        'id' => 1,
        'name' => 'ahmed',
        'activities' => [
            'gym', 'reading'
        ],
        'orders' => [
            '150 EGP', '250 EGP'
        ]
    ],
    [
        'id' => 2,
        'name' => 'mohamed',
        'activities' => [
            'swimming', 'running'
        ],
        'orders' => [
            '1000 EGP', '20 EGP'
        ]
    ]
];

// echo "{$users[0]['name']} Activities's {$users[0]['activities'][0]} , {$users[0]['activities'][1]}";

// echo "{$users[1]['name']} Orders: {$users[1]['orders'][0]} , {$users[1]['orders'][1]}";

# 3 levels
$users = [
    (object)[
        'id' => 1,
        'name' => 'ahmed',
        'activities' => [
            'gym', 'reading'
        ],
        'orders' => [
            '150 EGP', '250 EGP'
        ]
    ],
    (object)[
        'id' => 2,
        'name' => 'mohamed',
        'activities' => [
            'swimming', 'running'
        ],
        'orders' => [
            '1000 EGP', '20 EGP'
        ]
    ]
];

// echo "{$users[0]->name} Orders {$users[0]->orders[0]} , {$users[0]->orders[1]}";

// echo "{$users[1]->name} Activites {$users[1]->activities[0]} ,{$users[1]->activities[1]}";