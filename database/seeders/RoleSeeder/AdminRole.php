<?php

namespace Database\Seeders\RoleSeeder;

use App\PermissionsManager\Admin\AdminPermissionManager;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AdminRole
{
    public static function seed()
    {
        $role = Role::where('name', 'Admin')->first();
        if (empty($role)) 
            $role = Role::create(['name' => 'Admin']);

        $permissionManager = new AdminPermissionManager();
        $permissions = $permissionManager->getPermissions();

        // Existing role permissions
        $existingPermissions = $role->permissions->pluck('name')->toArray();
        $shouldRevokePermissions = array_diff($existingPermissions, $permissions);

        if(count($shouldRevokePermissions) > 0) {
            $role->revokePermissionTo($shouldRevokePermissions);
            echo "Admin - REVOKING PERMISSIONS - :\n---" . implode("\n---", $shouldRevokePermissions)."\n";
        }

        foreach($permissions as $index => $permissionName) {
            echo ("Admin - GIVING PERMISSION : ".$permissionName." ".$index." of ". count($permissions)) . "\n";
            $permission = Permission::where('name', $permissionName)->first();
            if(empty($permission)) {
                Permission::create(['name' => $permissionName]);
            }
            
            if(!$role->hasPermissionTo($permissionName)) {
                $role->givePermissionTo($permissionName);
            }
        }
    }
}