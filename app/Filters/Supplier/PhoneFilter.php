<?php

namespace App\Filters\Supplier;

class PhoneFilter
{
    /**
     * @param $builder
     * @param $value
     * @return mixed
     */
    public function filter($builder, $value)
    {
        return $builder->where('phone', 'LIKE', "%{$value}%");
    }
}
