<?php

use App\ProductWarehouse;
use Illuminate\Database\Seeder;

class ProductsWarehousesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(ProductWarehouse::class, 3)->create();
    }
}
