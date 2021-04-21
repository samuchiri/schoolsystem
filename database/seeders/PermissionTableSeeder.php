<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
 
 Role::create(['name' => 'Admin']);
 Role::create(['name' => 'Student']);

Permission::create(['name' => 'Create Student']);
Permission::create(['name' => 'View Student']);
Permission::create(['name' => 'Update Student']);
Permission::create(['name' => 'Delete Student']);
// these are created in student policy

Permission::create(['name' => 'Create User']);
Permission::create(['name' => 'View User']);
Permission::create(['name' => 'Update User']);
Permission::create(['name' => 'Delete User']);
// these are created in user policy
Permission::create(['name' => 'Create Course']);
Permission::create(['name' => 'View Course']);
Permission::create(['name' => 'Update Course']);
Permission::create(['name' => 'Delete Course']);
// these are created in course policy

    }
}
// seeders are used to fill a database with dummy data. 

