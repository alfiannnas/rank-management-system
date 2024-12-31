<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name' => 'Rank Management - Can Create Data']);
        Role::create(['name' => 'admin']);

        $roleAdmin = Role::findByName('admin');
        $roleAdmin->givePermissionTo('Rank Management - Can Create Data');
    }
}
