<?php

use App\Warehouse;
use Illuminate\Database\Seeder;

class WarehousesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        factory(Warehouse::class, 12)->create()->each(
            function ($warehouse) {
                $warehouse->employees()->saveMany(factory(\App\Employee::class, 5)->make());
                $products = \App\Product::inRandomOrder()->limit(5)->get();
                foreach ($products as $product) {
                    $insertData[] = ['product_id' => $product->id];
                }

                if (isset($insertData)) {
                    $warehouse->products()->attach($insertData);
                }
            }
        );
    }
}
