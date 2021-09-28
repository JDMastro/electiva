<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Contracts\StartupContract;
use Illuminate\Support\Facades\DB;

class Startup extends Model implements StartupContract
{
    use HasFactory;

    protected $fillable = [
        'name',
        'img',
        'email',
        'user_id',
        'kindstartup_id'
    ];


    public function getId() : int { return $this-> getAttribute('id'); }
    public function getName() : string { return $this-> getAttribute('name'); }
    public function getImg() : string { return $this-> getAttribute('img'); }
    public function getKindstartupId() : int { return $this-> getAttribute('kindstartup_id'); }
    public function getUserId() : int { return $this-> getAttribute('user_id'); }













   

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function kindstartup()
    {
        return $this->belongsTo(Kindstartup::class);
    }

    public function requests()
    {
        return $this->hasMany(Request::class);
    }

    public function qualifications()
    {
        return $this->hasMany(Qualification::class);
    }








    //------------------

    public function avg() {
        $result = $this->qualifications()
        ->select(DB::raw('avg(rate) as avg, startup_id'))
        ->groupBy('startup_id');
        return $result;
     }

   



}
