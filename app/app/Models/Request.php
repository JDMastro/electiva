<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function startup()
    {
        return $this->belongsTo(Startup::class);
    }

    public function statu()
    {
        return $this->belongsTo(Request::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
