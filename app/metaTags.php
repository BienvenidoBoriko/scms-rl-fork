<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class metaTags extends Model
{
    protected $fillable = [
        'name','value','type','id_user','id_post',
        'id_category','id_tag'
    ];
}
