<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Contracts\KindstartupContract;


class Kindstartup extends Model implements KindstartupContract
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];


    public function startups()
    {
        return $this->hasMany(Startup::class);
    }



    public function getId() : int { return $this-> getAttribute('id'); }
    public function getName() : string { return $this-> getAttribute('name'); }
}
