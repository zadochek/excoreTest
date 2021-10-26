<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = [];

    /**
     * Creates a one-to-many relationship with a table of posts.
     *
     */
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
