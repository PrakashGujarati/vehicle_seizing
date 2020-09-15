<?php

use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles_insert = [
            
            
            /* Vehicle Seeder */

            "INSERT INTO `permissions` (`id`, `name`, `guard_name`, `slug`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES (NULL, 'vehicle-create', 'web', 'vehicle-create', '1', NULL, NULL, NULL);"
            ,
            "INSERT INTO `permissions` (`id`, `name`, `guard_name`, `slug`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES (NULL, 'vehicle-view', 'web', 'vehicle-view', '1', NULL, NULL, NULL);"
            ,
            "INSERT INTO `permissions` (`id`, `name`, `guard_name`, `slug`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES (NULL, 'vehicle-delete', 'web', 'vehicle-delete', '1', NULL, NULL, NULL);"
            ,
            "INSERT INTO `permissions` (`id`, `name`, `guard_name`, `slug`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES (NULL, 'vehicle-edit', 'web', 'vehicle-edit', '1', NULL, NULL, NULL);"
            ,
            

            
            /* office Seeder */

            "INSERT INTO `permissions` (`id`, `name`, `guard_name`, `slug`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES (NULL, 'office-create', 'web', 'office-create', '1', NULL, NULL, NULL);"
            ,
            "INSERT INTO `permissions` (`id`, `name`, `guard_name`, `slug`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES (NULL, 'office-view', 'web', 'office-view', '1', NULL, NULL, NULL);"
            ,
            "INSERT INTO `permissions` (`id`, `name`, `guard_name`, `slug`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES (NULL, 'office-delete', 'web', 'office-delete', '1', NULL, NULL, NULL);"
            ,
            "INSERT INTO `permissions` (`id`, `name`, `guard_name`, `slug`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES (NULL, 'office-edit', 'web', 'office-edit', '1', NULL, NULL, NULL);"
            ,


            
            /* head_offices Seeder */

            "INSERT INTO `permissions` (`id`, `name`, `guard_name`, `slug`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES (NULL, 'head_offices-create', 'web', 'head_offices-create', '1', NULL, NULL, NULL);"
            ,
            "INSERT INTO `permissions` (`id`, `name`, `guard_name`, `slug`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES (NULL, 'head_offices-view', 'web', 'head_offices-view', '1', NULL, NULL, NULL);"
            ,
            "INSERT INTO `permissions` (`id`, `name`, `guard_name`, `slug`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES (NULL, 'head_offices-delete', 'web', 'head_offices-delete', '1', NULL, NULL, NULL);"
            ,
            "INSERT INTO `permissions` (`id`, `name`, `guard_name`, `slug`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES (NULL, 'head_offices-edit', 'web', 'head_offices-edit', '1', NULL, NULL, NULL);"
            ,
        ];

        foreach ($roles_insert as $key => $role_insert) {
            DB::statement($role_insert);
        }
    }
}
