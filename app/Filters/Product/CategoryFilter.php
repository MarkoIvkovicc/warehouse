<?php

namespace App\Filters\Product;

class CategoryFilter
{
    /**
     * @param $builder
     * @param $value
     * @return mixed
     */
    public function filter($builder, $value)
    {
        return $builder->where('category_id', '=', $value);
    }
}
