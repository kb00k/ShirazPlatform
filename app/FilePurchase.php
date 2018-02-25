<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FilePurchase extends Model
{
    public function file()
    {
        return $this->belongsTo('App\File');
    }
}
