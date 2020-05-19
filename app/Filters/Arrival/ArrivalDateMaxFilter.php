<?php

namespace App\Filters\Arrival;

class ArrivalDateMaxFilter
{
    /**
     * @param $builder
     * @param $value
     * @return mixed
     */
    public function filter($builder, $value)
    {
        return $builder->where('arrival_date', '<=', $value);
    }
}
