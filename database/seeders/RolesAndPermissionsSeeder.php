<?php

namespace Database\Seeders;

use App\Models\User;
use App\Security\Permissions;
use App\Security\Roles;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = Roles::SUPPORTED_ROLES;
        foreach ($roles as $role) {
            Role::firstOrCreate(['name' => $role]);
        }

        $permissions = Permissions::SUPPORTED_PERMISSIONS;
        $admin_role = Role::where('name', Roles::Admin)->first();
        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
            if ($admin_role && !$admin_role->hasPermissionTo($permission)) {
                $admin_role->givePermissionTo($permission);
            }
        }

        $default_admin_emails = env('DEFAULT_ADMIN_EMAILS');
        if ($default_admin_emails && $admin_role) {
            $default_admin_emails = explode(',', $default_admin_emails);
            foreach ($default_admin_emails as $default_admin_email) {
                $user = User::where('email', $default_admin_email)->first();
                print_r($user);
                if ($user) {
                    $user->assignRole($admin_role);
                }
            }
        }
    }
}
