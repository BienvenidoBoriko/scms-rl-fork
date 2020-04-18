<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class rol extends Model
{
    protected $table='rols';
    protected $fillable = [
        'name','description'
    ];
}
