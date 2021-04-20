<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Friend extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'friend_id',
        'accept',
    ];

    public function friends()
    {
        return $this->hasMany('App\Models\User', 'id', 'friend_id');
    }
}
