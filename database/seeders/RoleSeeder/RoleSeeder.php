<?php

namespace Database\Seeders\RoleSeeder;

use App\PermissionsManager\Admin\AdminPermissionManager;
use App\PermissionsManager\User\UserPermissionManager;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder
{
    public static function seed()
    {
        //Admin Role
        $adminRole = Role::where('name', 'Admin')->first();
        if (empty($adminRole)) {
            $adminRole = Role::create(['name' => 'Admin']);
        }

        $permissionManager = new AdminPermissionManager();
        $permissions = $permissionManager->getPermissions();

        // Existing role permissions
        $existingPermissions = $adminRole->permissions->pluck('name')->toArray();
        $shouldRevokePermissions = array_diff($existingPermissions, $permissions);

        if(count($shouldRevokePermissions) > 0) {
            $adminRole->revokePermissionTo($shouldRevokePermissions);
            echo "Admin - REVOKING PERMISSIONS - :\n---" . implode("\n---", $shouldRevokePermissions)."\n";
        }

        foreach($permissions as $index => $permissionName) {
            echo ("Admin - GIVING PERMISSION : ".$permissionName." ".$index." of ". count($permissions)) . "\n";
            $permission = Permission::where('name', $permissionName)->first();
            if(empty($permission)) {
                Permission::create(['name' => $permissionName]);
            }
            
            if(!$adminRole->hasPermissionTo($permissionName)) {
                $adminRole->givePermissionTo($permissionName);
            }
        }

       // User Role
        $userRole = Role::where('name', 'User')->first();
        if (empty($userRole)) {
            $userRole = Role::create(['name' => 'User']);
        }

        $permissionManager = new UserPermissionManager();
        $permissions = $permissionManager->getPermissions();

        // Existing role permissions
        $existingPermissions = $userRole->permissions->pluck('name')->toArray();
        $shouldRevokePermissions = array_diff($existingPermissions, $permissions);

        if(count($shouldRevokePermissions) > 0) {
            $userRole->revokePermissionTo($shouldRevokePermissions);
            echo "User - REVOKING PERMISSIONS - :\n---" . implode("\n---", $shouldRevokePermissions)."\n";
        }

        foreach($permissions as $index => $permissionName) {
            echo ("User - GIVING PERMISSION : ".$permissionName." ".$index." of ". count($permissions)) . "\n";
            $permission = Permission::where('name', $permissionName)->first();
            if(empty($permission)) {
                Permission::create(['name' => $permissionName]);
            }
            
            if(!$userRole->hasPermissionTo($permissionName)) {
                $userRole->givePermissionTo($permissionName);
            }
        }
    }
}