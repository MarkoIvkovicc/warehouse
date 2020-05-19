<?php

namespace App\Filters\Product;

class PriceMinFilter
{
    /**
     * @param $builder
     * @param $value
     * @return mixed
     */
    public function filter($builder, $value)
    {
        return $builder->where('price', '>=', $value);
    }
}
