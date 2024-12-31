<?php

namespace App\PermissionsManager\Admin;

use App\PermissionsManager\PermissionsManager;

class AdminPermissionManager extends PermissionsManager
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