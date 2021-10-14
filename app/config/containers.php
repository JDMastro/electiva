<?php

return [
    'bind' => [
        App\Models\Contracts\StartupContract::class => App\Models\Startup::class,
        App\Models\Contracts\KindstartupContract::class => App\Models\Kindstartup::class,
    ],
    'route_models' => [
        'startup' => App\Models\Startup::class,
        'kindstartup' =>  App\Models\Kindstartup::class,
    ],
    'observers' => []
];