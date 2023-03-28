<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roleAdmin = Role::create(['name' => 'admin']);
        $roleEditor = Role::create(['name' => 'editor']);
        //$roleDoctor = Role::create(['name' => 'doctor']);
        //$rolePatient = Role::create(['name' => 'patient']); 


        Permission::create(['name' => 'create patient'])->syncRoles([$roleAdmin, $roleEditor]);
    }
}
