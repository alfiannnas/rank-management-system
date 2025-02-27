<?php

namespace Database\Seeders;

use Database\Seeders\RoleSeeder\RoleSeeder as RoleSeeders;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    public function run()
    {
        RoleSeeders::seed();
    }
}