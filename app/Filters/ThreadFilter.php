<?php
/**
 * Created by PhpStorm.
 * User: m_ibr
 * Date: 23/9/2017
 * Time: 4:47 PM
 */

namespace App\Filters;

use App\User;

class ThreadFilter extends Filter
{

    protected $filters=["by","popular","unreply"];
    /**
     * @param $builder
     * @param $username
     * @return mixed
     */
    protected function by($username)
    {
        $user = User::where("name", $username)->firstOrFail();
        return $this->builder->where("user_id", $user->id);
    }

    public function popular(){

        $this->builder->getQuery()->orders=[];
        return $this->builder->orderBy('replies_count','desc');
    }
}