<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions =  [
        // Users
        'view users',
        'create users',
        'edit users',
        'delete users',

        // Products
        'view products',
        'create products',
        'edit products',
        'delete products',

        'view categories',
        'create categories',
        'edit categories',
        'delete categories',
        ];

        foreach ($permissions as $permission) {
            \Spatie\Permission\Models\Permission::firstOrCreate(['name' => $permission]);
        }
    }

}
