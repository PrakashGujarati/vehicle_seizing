<?php

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    public function run()
    {
        $roles_insert = [
            
            
            /* Vehicle Seeder */

            "INSERT INTO `roles` (`id`, `name`, `guard_name`, `slug`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES (NULL, 'admin', 'web', 'Admin', '1', NULL, NULL, NULL);"
            ,
            "INSERT INTO `roles` (`id`, `name`, `guard_name`, `slug`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES (NULL, 'agent', 'web', 'Agent', '1', NULL, NULL, NULL);"
                    ];

        foreach ($roles_insert as $key => $role_insert) {
            DB::statement($role_insert);
        }
    }
}
