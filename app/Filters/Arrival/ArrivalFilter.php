<?php

namespace App\Filters\Arrival;

use App\Employee;
use App\Filters\AbstractFilter;

class ArrivalFilter extends AbstractFilter
{
    /**
     * @var array
     */
    protected $filters = [
        'arrivalDateMax' => ArrivalDateMaxFilter::class,
        'arrivalDateMin' => ArrivalDateMinFilter::class,
        'arrivalStockMax' => ArrivalStockMaxFilter::class,
        'arrivalStockMin' => ArrivalStockMinFilter::class,
        'expireDays' => ExpireDateFilter::class,
        'employee' => EmployeeFilter::class,
        'product' => ProductFilter::class,
        'supplier' => SupplierFilter::class,
        'warehouse' => WarehouseFilter::class,
    ];
}
