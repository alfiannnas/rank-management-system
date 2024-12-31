<?php

namespace Database\Seeders;

use Database\Seeders\RoleSeeder\AdminRole;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    public function run()
    {
        AdminRole::seed();
    }
}