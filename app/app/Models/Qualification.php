<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Qualification extends Model
{
    use HasFactory;

    protected $fillable = [
        'rate',
        'startup_id',
        'user_id',
    ];

    public function startup()
    {
        return $this->belongsTo(Startup::class);
    }
}
