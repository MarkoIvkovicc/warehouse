<?php

namespace App\Filters\Arrival;

class ProductFilter
{
    /**
     * @param $builder
     * @param $value
     * @return mixed
     */
    public function filter($builder, $value)
    {
        return $builder->where('product_id', '=', $value);
    }
}
