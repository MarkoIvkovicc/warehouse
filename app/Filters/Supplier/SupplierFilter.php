<?php

namespace App\Filters\Supplier;

use App\Filters\AbstractFilter;

class SupplierFilter extends AbstractFilter
{
    /**
     * @var array
     */
    protected $filters = [
        'city' => CityFilter::class,
        'phone' => PhoneFilter::class,
    ];
}
