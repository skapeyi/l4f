<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sms extends Model
{
    protected $fillable = [
      'from','to', 'text','date','aft_id','link_id','message_id','type','status','cost'
    ];

    protected $attributes = [];
}
