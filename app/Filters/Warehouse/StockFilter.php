<?php

namespace App\Filters\Warehouse;

class StockFilter
{
    /**
     * @param $builder
     * @param $value
     * @return mixed
     */
    public function filter($builder, $value)
    {
        //not working . ..
        return $builder->whereHas('products', function($q) use($value) {
            $q->where('stock', '>=', $value);
        });
    }
}
