<?php

namespace App\Http\Controllers;

use Request;
use App\Models\Contracts\StartupContract;
use DB;
use Exception;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Requests\StartupStoreRequest;
use App\Http\Resources\StartupResource;




class StartupController extends Controller
{
    public function Homeview(StartupContract $startupContract)
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
            ->leftJoin('qualifications','startups.id','=','qualifications.startup_id')
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
            ->leftJoin('qualifications','startups.id','=','qualifications.startup_id')
            ->join('kindstartups','startups.kindstartup_id','=','kindstartups.id')
            ->groupBy('startups.id')
            ->orderBy('avg', 'DESC');
            //->where('startups.name','LIKE','%'."tw"."%");
        }

        $startups = $startups->paginate(21)->appends($queries);

        //echo $name = Request::get('search');

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
            ->leftJoin('qualifications','startups.id','=','qualifications.startup_id')
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
            ->leftJoin('qualifications','startups.id','=','qualifications.startup_id')
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
        DB::raw('avg(coalesce(rate,0)) as avg'),
        DB::raw('count(requests.id) as count'))
        ->leftJoin('qualifications','startups.id','=','qualifications.startup_id')
        ->join('kindstartups','startups.kindstartup_id','=','kindstartups.id')
        ->leftJoin('requests','requests.startup_id','=','startups.id')
        ->groupBy('startups.id')
        ->orderBy('avg', 'DESC')
        ->where('startups.user_id', $id)->paginate(21);

        return response()->json(['data' => $startups]);
    }

    public function Store(StartupContract $startupContract, StartupStoreRequest $request) : StartupResource
    {

        //error_log($request->img);
       
        if($request->img != null){
            $imageName = time().'.'.$request->img->extension();
            $request->img->move(public_path('img'), $imageName);
            return new StartupResource($startupContract->create([
                "name" => $request->name,
                "user_id" => $request->userId,
                "img" => $imageName,
                "kindstartup_id" => $request->kindStartupId,
            ]));
        }else{
            return new StartupResource($startupContract->create([
                "name" => $request->name,
                "user_id" => $request->userId,
                "img" => "ggg.png",
                "kindstartup_id" => $request->kindStartupId,
            ]));
        }

        

        //return new StartupResource($startupContract->create());
    }

   

}
