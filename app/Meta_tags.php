<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class metaTags extends Model
{
    protected $table="metaTags";

    protected $fillable = [
        'name','value','type','id_owner'
    ];
}
