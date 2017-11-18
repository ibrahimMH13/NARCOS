<?php

namespace App\Models;

use App\RecordActiviteable;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    //
    use RecordActiviteable;
    protected $guarded=[];


    //RelationShip

public function reply(){

        return $this->morphTo();
}
}
