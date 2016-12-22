<?php

namespace App\Traits;

/**
 * Class Orderable
 * @package App\Traits
 */
trait Orderable
{
    /**
     * @param $query
     * @return mixed
     */
    public function scopeLatestFirst($query){
    	return $query->orderBy('created_at', 'desc');
    }

    /**
     * @param $query
     * @return mixed
     */
    public function scopeOldestFirst($query){
        return $query->orderBy('created_at', 'asc');
    }
}

