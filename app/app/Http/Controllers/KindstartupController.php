<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\KindstartupResource;
use App\Models\Contracts\KindstartupContract;


class KindstartupController extends Controller
{
    function index(KindstartupContract $kindstartupContract) : JsonResource
    {
        return KindstartupResource::collection($kindstartupContract->all());
    }
}
