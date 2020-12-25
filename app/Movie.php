<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $fillable = ['user_id', 'url', 'comment'];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
