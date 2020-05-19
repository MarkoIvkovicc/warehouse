<?php

namespace App;

use App\Filters\Warehouse\WarehouseFilter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Warehouse extends Model
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
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function arrivals()
    {
        return $this->hasMany(Arrival::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function employees()
    {
        return $this->hasMany(Employee::class);
    }

    /**
     * @param Builder $builder
     * @param $request
     * @return mixed
     */
    public function scopeFilter(Builder $builder, $request)
    {
        return (new WarehouseFilter($request))->filter($builder);
    }
}
