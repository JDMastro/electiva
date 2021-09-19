<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Startup extends Model
{
    use HasFactory;

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
}
