<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, 20)->create()->each(
            function ($user) {
                $roles = \App\Role::pluck('id')->toArray();
                $user->roles()->attach($this->random_value($roles));
            }
        );
    }

    private function random_value($array, $default=null)
    {
        $k = mt_rand(0, count($array) - 1);
        return isset($array[$k])? $array[$k]: $default;
    }
}
