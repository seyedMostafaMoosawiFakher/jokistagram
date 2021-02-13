<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'joke_id',
        'user_id',
    ];


    public function joke()
    {
        return $this->belongsTo(Joke::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // می خواستم بدون ایجاد رابطه درون جدول، رابطه را از اینجا ایجاد کنم. نشد. 
    // hase one joke 

    // public function jokes()
    // {
    //     return $this->hasMany(Joke::class);
    // }
}
