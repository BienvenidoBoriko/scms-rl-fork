<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title','status','id_author','published_at','plain_text',
        'html','featured_img','cover_image','featured','custom_except','slug',
         'tags','category'
    ];

    public function tags()
    {
        return $this->belongsToMany('App\Tag', 'post_tags');
    }
}
