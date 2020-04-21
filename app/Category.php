<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name','slug','description','featured_img','meta_desc',
        'meta_title','visibility'
    ];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
