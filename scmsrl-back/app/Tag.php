<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = [
        'name','slug','description','featured_img','meta_desc',
        'meta_title'
    ];

    public function posts()
    {
        return $this->belongsToMany('App\Post','post_tags');
    }
}
