<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ticket extends Model
{
    use SoftDeletes;
    public function category()
    {
        return $this->belongsTo('App\Category');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function attachments()
    {
        return $this->hasMany('App\TicketAttachment');
    }

    public function replays()
    {
        return $this->hasMany('App\TicketReplay');
    }
}
