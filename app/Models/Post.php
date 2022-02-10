<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [];

    //Define the database relationship between Post and User
    public function user()
    {
        $this->belongsTo(User::class);
    }
}
