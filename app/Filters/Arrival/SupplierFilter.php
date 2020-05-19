<?php

namespace App\Filters\Arrival;

class SupplierFilter
{
    /**
     * @param $builder
     * @param $value
     * @return mixed
     */
    public function filter($builder, $value)
    {
        return $builder->where('supplier_id', '=', $value);
    }
}
