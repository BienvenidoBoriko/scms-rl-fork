<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meta_tags extends Model
{

    protected $fillable = [
        'name','value','post_id'
    ];

    public function post()
    {
        return $this->belongsTo('App\Post');
    }
}
