<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //

    protected $fillable = [
        'id_user',
        'photo_post',
        'titre',
        'text',

    ];

    function user(){
        return $this->belongsTo(user::class,'id_user');
    }

    function comments(){
        return $this->hasMany(Comment::class,'id_post');
    }
    function likes(){
        return $this->hasMany(like::class,'id_post');
    }
}
