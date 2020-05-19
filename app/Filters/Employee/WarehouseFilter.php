<?php

namespace App\Filters\Employee;

class WarehouseFilter
{
    /**
     * @param $builder
     * @param $value
     * @return mixed
     */
    public function filter($builder, $value)
    {
        return $builder->where('warehouse_id', '=', $value);
    }
}
