<?php

namespace App\Filters\Arrival;

class ArrivalStockMinFilter
{
    /**
     * @param $builder
     * @param $value
     * @return mixed
     */
    public function filter($builder, $value)
    {
        return $builder->where('arrival_stock', '>=', $value);
    }
}
