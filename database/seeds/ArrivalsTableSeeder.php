<?php

use App\Arrival;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArrivalsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Arrival::class, 10)->create();
    }
}
