<?php

namespace App\Filters\Product;

class StockMinFilter
{
    /**
     * @param $builder
     * @param $value
     * @return mixed
     */
    public function filter($builder, $value)
    {
        return $builder->where('stock', '>=', $value);
    }
}
