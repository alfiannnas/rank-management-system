<?php

namespace App\PermissionsManager\User;

use App\PermissionsManager\PermissionsManager;

class UserPermissionManager extends PermissionsManager
{
    public $permissions = [
        'Rank Management - Can List Data',
        'Rank Management - Can Create Data',
        'Rank Management - Can View Data',
        'Rank Management - Can Edit Data',
        'Rank Management - Can Delete Data',
        'Rank Management - Can Print Data',
    ];
}