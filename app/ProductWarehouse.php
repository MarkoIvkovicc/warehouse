<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

/**
 * Class ProductWarehouse
 * @package App
 */
class ProductWarehouse extends Pivot
{
    /**
     * @var bool
     */
    public $timestamps = false;
}
