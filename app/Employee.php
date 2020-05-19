<?php

namespace App;

use App\Filters\Employee\EmployeeFilter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

/**
 * Class Employee
 * @package App
 */
class Employee extends Model
{
    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @var array
     */
    protected $fillable = ['name', 'age', 'job_description', 'warehouse_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function arrivals()
    {
        return $this->hasMany(Arrival::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function warehouse()
    {
        return $this->belongsTo(Warehouse::class);
    }

    /**
     * @param Builder $builder
     * @param $request
     * @return mixed
     */
    public function scopeFilter(Builder $builder, $request)
    {
        return (new EmployeeFilter($request))->filter($builder);
    }
}
