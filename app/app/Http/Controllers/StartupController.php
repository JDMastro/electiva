<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contracts\StartupContract;
use DB;

class StartupController extends Controller
{
    public function Index()
    {
        $startups = DB::table('startups')
        ->join('qualifications','startups.id','=','qualifications.startup_id')
        ->join('kindstartups','startups.kindstartup_id','=','kindstartups.id')
        ->selectRaw('startups.id as sid, startups.name as sname, startups.img, kindstartups.name as kname, avg(rate) as avg')
        ->groupBy('startups.id')
        ->orderBy('avg', 'DESC')
        ->paginate(21);
    
        return View('welcome')->with('startups',$startups);
    }
}
