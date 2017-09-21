<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    //


    //RelationShip

    public function user(){

        return $this->belongsTo(User::class);
    }
}
