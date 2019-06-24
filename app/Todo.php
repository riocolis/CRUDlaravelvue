<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;

class Todo extends Model
{
    protected $fillable = [
        'name','status','user_id',
    ];

    ///Membuat Laravel
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
