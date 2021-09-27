<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contracts\StartupContract;

class StartupController extends Controller
{
    public function Index(StartupContract $startupContract)
    {
        return $startupContract->with(['kindstartup', 'avg'])->paginate(20);
    }
}
