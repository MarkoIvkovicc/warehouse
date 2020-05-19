<?php

namespace App\Filters\Employee;

use App\Filters\AbstractFilter;

class EmployeeFilter extends AbstractFilter
{
    /**
     * @var array
     */
    protected $filters = [
        'warehouse' => WarehouseFilter::class,
        'ageMin' => AgeMinFilter::class,
        'ageMax' => AgeMaxFilter::class,
    ];
}
