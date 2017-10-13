<?php
/**
 * Created by PhpStorm.
 * User: m_ibr
 * Date: 13/10/2017
 * Time: 7:46 PM
 */

namespace App;


use App\Models\Activity;

trait RecordActiviteable
{

    protected static function bootRecordActiviteable()
    {


         static::created(function ($thread) {
           $e='created';
            $thread->recordActivity($e);
        });
    }




    protected function recordActivity($event){

        $this->activity()->create([

            "user_id" =>auth()->user()->id,
            "type"  => $this->getActivityType($event),
        ]);

    }

    protected function getTypeEvent(){
            return ["created"];
    }
    protected function getActivityType($event){

        return $event.'_'. strtolower((new\ReflectionClass($this))->getShortName());
    }

    //RelactionShip

    public function activity(){

        return $this->morphMany('App\Models\Activity','subject');
    }

}