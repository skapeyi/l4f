<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BulkLog extends Model
{
    protected $fillable =[
      'message','recipients'
    ];
}
