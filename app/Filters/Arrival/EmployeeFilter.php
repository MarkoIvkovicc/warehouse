<?php

namespace App\Filters\Arrival;

class EmployeeFilter
{
    /**
     * @param $builder
     * @param $value
     * @return mixed
     */
    public function filter($builder, $value)
    {
        return $builder->where('employee_id', '=', $value);
    }
}
