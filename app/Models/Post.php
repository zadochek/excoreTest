<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = [];

    /**
     * Method for getting category.
     *
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Method for getting user.
     *
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
