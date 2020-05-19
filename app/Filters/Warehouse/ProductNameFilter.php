<?php

namespace App\Filters\Warehouse;

class ProductNameFilter
{
    /**
     * @param $builder
     * @param $value
     * @return mixed
     */
    public function filter($builder, $value)
    {
        return $builder->whereHas('products', function($q) use($value) {
            $q->where('name', 'LIKE', "%{$value}%");
        });
    }
}
