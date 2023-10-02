<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users =  User::all();
        foreach ($users as  $user) {
            if ($user->type == 1 && $user->id == 1) 
            {
                $user->syncRoles('super admin');
            }elseif ($user->type == 2) 
            {
                $user->syncRoles('store');
            }elseif ($user->type == 1 && $user->id != 1) 
            {
                $user->syncRoles('admin');
            }
        }
    }
}
