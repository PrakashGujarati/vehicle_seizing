<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->truncate();
        if (DB::table('roles')->get()->count() == 0) {
            $Roles = [
                [
                    'slug' => 'Admin',
                    'name' => 'Admin',
                    'permissions' => null,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'slug' => 'agent',
                    'name' => 'Agent',
                    'permissions' => null,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
               
            ];
            DB::table('roles')->insert($Roles);
        } else {
            echo "\e[31mTable is not empty, therefore NOT ";
        }
    }
}
