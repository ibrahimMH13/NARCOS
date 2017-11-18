<?php

namespace App\Models;

use App\RecordActiviteable;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    //
     protected $guarded = [];
     use RecordActiviteable;

    public function favorite(){
        return $this->morphTo();
    }

}
