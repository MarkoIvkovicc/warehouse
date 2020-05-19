<?php

namespace App\Filters\Product;

class WarehouseFilter
{
    /**
     * @param $builder
     * @param $value
     * @return mixed
     */
    public function filter($builder, $value)
    {
        return $builder->whereHas('warehouses', function($q) use($value) {
            $q->where('id', '=', $value);
        });
    }
}
