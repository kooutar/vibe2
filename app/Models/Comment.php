<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $table='_comments';
    protected $fillable = [
        'commentaire',
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
