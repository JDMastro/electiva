<?php

return [
    'bind' => [
        App\Models\Contracts\StartupContract::class => App\Models\Startup::class,
    ],
    'route_models' => [
        'startup' => App\Models\Startup::class,
    ],
    'observers' => []
];