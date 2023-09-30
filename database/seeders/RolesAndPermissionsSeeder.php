<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::updateOrCreate( [ 'name' => 'admin' ,'guard_name' => 'web'] )  ;
        Role::updateOrCreate( [ 'name' => 'customer' ,'guard_name' => 'web'] )  ;
        Role::updateOrCreate( [ 'name' => 'store' ,'guard_name' => 'web'] )  ;
        Role::updateOrCreate( [ 'name' => 'super admin' ,'guard_name' => 'web'] )  ;
    }
}
