<?php

namespace App;

use App\Filters\Supplier\SupplierFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Supplier
 * @package App
 */
class Supplier extends Model
{
    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @var array
     */
    protected $fillable = ['name', 'address', 'city', 'phone'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function arrivals()
    {
        return $this->hasMany(Arrival::class);
    }

    /**
     * @param Builder $builder
     * @param $request
     * @return mixed
     */
    public function scopeFilter(Builder $builder, $request)
    {
        return (new SupplierFilter($request))->filter($builder);
    }
}
