<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class like extends Model
{
    //
    protected $table='like';
    protected $fillable = [
        'id_user',
        'id_post',
    ];

    function Post(){
        return $this->belongsTo(Post::class);
    }
    function user(){
        return $this->belongsTo(User::class,'id_user');
    }
}
