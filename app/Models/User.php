<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'bio',
        'profile_image',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function posts(): HasMany {
        return $this->hasMany(Post::class, 'id_user'); // Relation 1-N avec les posts
    }

//    public  function EstMonPost($id)
//    {
//        $iduserConnecte=auth()->id();
//
//    }

public function sentInvitations()
{
    return $this->belongsToMany(User::class, 'invitations', 'sender_id', 'receiver_id')
                ->withPivot('status')
                ->withTimestamps();
}

// Invitations reçues par l'utilisateur
public function receivedInvitations()
{
    return $this->belongsToMany(User::class, 'invitations', 'receiver_id', 'sender_id')
                ->withPivot('status')
                ->withTimestamps();
}

public function hasSentFriendRequest($userId)
{
    return $this->sentInvitations()->where('receiver_id', $userId)->exists();
}

}
