<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $viewReports = Permission::create(['name' => 'view reports']);
        $editArticles = Permission::create(['name' => 'edit articles']);

        $admin = Role::create(['name' => 'admin']);
        $admin->givePermissionTo([$viewReports, $editArticles]);

        $editor = Role::create(['name' => 'editor']);
        $editor->givePermissionTo($editArticles);

        $viewer = Role::create(['name' => 'viewer']);
        $viewer->givePermissionTo($viewReports);
    }
}
