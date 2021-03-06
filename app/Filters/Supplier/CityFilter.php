<?php

namespace App\Filters\Supplier;

class CityFilter
{
    /**
     * @param $builder
     * @param $value
     * @return mixed
     */
    public function filter($builder, $value)
    {
        return $builder->where('city', 'LIKE', "%{$value}%");
    }
}
