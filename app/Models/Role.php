<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $guarded = [];

    /**
     * Method for getting users
     * 
     * @return array
     */
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
