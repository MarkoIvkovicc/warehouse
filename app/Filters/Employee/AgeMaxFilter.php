<?php

namespace App\Filters\Employee;

class AgeMaxFilter
{
    /**
     * @param $builder
     * @param $value
     * @return mixed
     */
    public function filter($builder, $value)
    {
        return $builder->where('age', '<=', $value);
    }
}
