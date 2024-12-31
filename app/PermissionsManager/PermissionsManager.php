<?php

namespace App\PermissionsManager;

class PermissionsManager
{
    public $permissions = array();

    public function getPermissions(): array
    {
        return $this->permissions;
    }
}