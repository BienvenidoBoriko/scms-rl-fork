<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title','status','user_id','published_at','plain_text',
        'html','featured_img','featured','custom_except','slug','category_id'
    ];

    public function tags()
    {
        return $this->belongsToMany('App\Tag','post_tags')->withTimeStamps();
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }
}
