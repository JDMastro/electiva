<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contracts\StartupContract;
use DB;

class StartupController extends Controller
{
    public function Index(StartupContract $startupContract)
    {
        $startups = new $startupContract;

        $queries = [];

        if(request()->has('kindstartups')){
            $startups = $startupContract->select(
                'startups.id as sid', 
                'startups.name as sname', 
                'startups.img', 
                'kindstartups.name as kname', 
            DB::raw('avg(rate) as avg'))
            ->join('qualifications','startups.id','=','qualifications.startup_id')
            ->join('kindstartups','startups.kindstartup_id','=','kindstartups.id')
            ->groupBy('startups.id')
            ->orderBy('avg', 'DESC')
            ->where('kindstartups.name', request('kindstartups'));

            $queries['kindstartups'] = request('kindstartups');
        }else{
            $startups = $startupContract->select(
                'startups.id as sid', 
                'startups.name as sname', 
                'startups.img', 
                'kindstartups.name as kname', 
            DB::raw('avg(rate) as avg'))
            ->join('qualifications','startups.id','=','qualifications.startup_id')
            ->join('kindstartups','startups.kindstartup_id','=','kindstartups.id')
            ->groupBy('startups.id')
            ->orderBy('avg', 'DESC');
        }

        $startups = $startups->paginate(21)->appends($queries);

        return View('welcome')->with('startups',$startups);
    }
}
