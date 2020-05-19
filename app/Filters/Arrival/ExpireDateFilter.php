<?php

namespace App\Filters\Arrival;

class ExpireDateFilter
{
    /**
     * @param $builder
     * @param $value
     * @return mixed
     * @throws \Exception
     */
    public function filter($builder, $value) {
        $dateNow = new \DateTime(date('Y') . '-' . date('m') . '-' . date('d'));
        $dateNow->add(new \DateInterval('P' . $value . 'D'));

        $requestExpireDate = $dateNow->format('Y-m-d');

        return $builder->where('expire_date', '<=', $requestExpireDate);
    }
}
