<?php

namespace App\Filters\Warehouse;

use App\Filters\AbstractFilter;

class WarehouseFilter extends AbstractFilter
{
    /**
     * @var array
     */
    protected $filters = [
        'product' => ProductNameFilter::class,
        'stock'=> StockFilter::class,
        'city' => CityFilter::class,
    ];
}
