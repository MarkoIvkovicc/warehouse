<?php

use App\Role;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_admin = new Role();
        $role_admin->name = 'admin';
        $role_admin->description = 'An admin have all privileges';
        $role_admin->save();

        $role_manager = new Role();
        $role_manager->name = 'manager';
        $role_manager->description = 'A manager have complete CRUD except arrivals. Arrivals are read-only.';
        $role_manager->save();

        $role_employee = new Role();
        $role_employee->name = 'employee';
        $role_employee->description = 'An employee can only edit arrivals. Other things are read-only.';
        $role_employee->save();
    }
}
