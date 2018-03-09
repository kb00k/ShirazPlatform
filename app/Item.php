<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends Model
{
    use SoftDeletes;
    public function category()
    {
        return $this->belongsTo('App\Category');
    }
    public function records()
    {
        return $this->hasMany('App\Record');
    }

    public function file()
    {
        return $this->hasOne('App\File');
    }
}
