<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Statu extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
    ];

    public function requests()
    {
        return $this->hasMany(Request::class);
    }
}
