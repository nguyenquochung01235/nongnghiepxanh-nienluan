<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Roles;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminRoles = Roles::where('name', 'ad')->first();
        $hrRoles = Roles::where('name', 'hr')->first();

        $admin = Admin::where('admin_email','hungnq28@nongnghiepxanh.com.vn')->first();
        
        // $admin->roles()->detach();
        $admin->roles()->attach($adminRoles);
        $admin->roles()->attach($hrRoles);
        // $hr->roles()->attach($hrRoles);
       
    }
}
