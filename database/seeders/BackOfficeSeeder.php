<?php

namespace Database\Seeders;

use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;
use Illuminate\Database\Seeder;

class BackOfficeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // creates the super user
        $user = \App\Models\User::factory()->create([
            'name' => 'Backoffice User',
            'email' => 'backoffice@example.com',
        ]);

        // and assign the role
        $user->assignRole(['Backoffice']);
    }
}
