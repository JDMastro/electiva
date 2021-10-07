<?php

namespace App\Http\Controllers;

use Request;
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
            //->where('startups.name','LIKE','%'."tw"."%");
        }

        $startups = $startups->paginate(21)->appends($queries);

        echo $name = Request::get('search');

        return View('welcome')->with('startups',$startups);
    }

    public function Search(StartupContract $startupContract, Request $request, $kindstartups = null)
    {
        //echo $kindstartups;
        $like = $request::input('name');

        if($kindstartups == null)
        {
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
            ->where('startups.name','LIKE', $like."%");
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
            ->orderBy('avg', 'DESC')
            ->where([
                ['startups.name','LIKE',$like."%"],
                ['kindstartups.name', '=', $kindstartups],
            ]);
            //->where('kindstartups.name',"=" ,$kindstartups);
        }

        $startups = $startups->paginate(21);

        return View('welcome')->with('startups',$startups);
    }

    public function GetStartupByUser(StartupContract $startupContract, $id)
    {
        $startups = $startupContract->select(
            'startups.id as sid', 
            'startups.name as sname', 
            'startups.img', 
            'kindstartups.name as kname', 
        DB::raw('avg(rate) as avg'),
        DB::raw('count(requests.id) as count'))
        ->join('qualifications','startups.id','=','qualifications.startup_id')
        ->join('kindstartups','startups.kindstartup_id','=','kindstartups.id')
        ->leftJoin('requests','requests.startup_id','=','startups.id')
        ->groupBy('startups.id')
        ->orderBy('avg', 'DESC')
        ->where('startups.user_id', $id)->paginate(21);

        return response()->json(['data' => $startups]);
    }

}
