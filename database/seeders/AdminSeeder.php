<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        #=======================================================================================#
        #			                   To add admin from seeders                               	#
        #=======================================================================================#
        User::firstOrCreate([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'gender' => 'male',
            'password' => bcrypt('123456789')
        ]);
        $admin = User::find(1);
        $makeAdmin = User::latest()->first(); //to get last row add in DB and make it admin
        $makeAdmin->assignRole('admin');


     

      //  $makeAdmins = User::latest()->take(1)->get();
       // foreach ($makeAdmins as $adminRole) {
        //    $adminRole->assignRole('admin');
       // }
    }
}
