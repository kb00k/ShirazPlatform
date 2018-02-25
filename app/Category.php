<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;
    public function articles()
    {
        return $this->hasMany('App\Article');
    }

    public function files()
    {
        return $this->hasMany('App\File');
    }

    public function transactions()
    {
        return $this->hasMany('App\Transaction');
    }

    public function tickets()
    {
        return $this->hasMany('App\Tickets');
    }

    public function items()
    {
        return $this->hasMany('App\Item');
    }

    public function settings()
    {
        return $this->hasMany('App\Category');
    }
}
