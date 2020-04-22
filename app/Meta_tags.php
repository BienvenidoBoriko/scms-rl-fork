<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meta_tags extends Model
{

    protected $fillable = [
        'name','value','type','id_owner'
    ];
}
