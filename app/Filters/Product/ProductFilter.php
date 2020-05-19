<?php

namespace App\Filters\Product;

use App\Filters\AbstractFilter;

class ProductFilter extends AbstractFilter
{
    /**
     * @var array
     */
    protected $filters = [
        'category' => CategoryFilter::class,
        'warehouse' => WarehouseFilter::class,
        'stockMin'=> StockMinFilter::class,
        'stockMax' => StockMaxFilter::class,
        'priceMin' => PriceMinFilter::class,
        'priceMax' => PriceMaxFilter::class,
    ];
}
