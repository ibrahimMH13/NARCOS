<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    //
    protected $guarded=[];


    //RelationShip

public function reply(){

        return $this->belongsTo(Reply::class);
}
}
