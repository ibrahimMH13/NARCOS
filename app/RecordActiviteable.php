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


        foreach (static::getTypeEvents() as $even){
            static::$even(function ($model) use ($even){
                $model->recordActivity($even);
            });
        }
        static::deleting(function ($model){
            $model->activity()->delete();
        });

    }




    protected function recordActivity($event){

        $this->activity()->create([

            "user_id" =>auth()->user()->id,
            "type"  => $this->getActivityType($event),
        ]);

    }

    protected static function getTypeEvents(){
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