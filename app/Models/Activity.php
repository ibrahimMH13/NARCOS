<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    //

    protected $guarded=[];

    //RelcationShip

    public function subject(){

        return $this->morphTo();
    }
}
