<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function jokes()
    {
        return $this->hasMany(Joke::class);
    }
    //.کار نکرد و اطلاعاتی نداد . چون روابط جداول را درست نکرده بودم. 
    // public function likes()
    // {
    //     return $this->hasManyThrough(Like::class , Joke::class,'user_id', 'id', 'like_id');
    // }

    public function user_name()
    {
//return "user name";
return $this->name;
    }


}
