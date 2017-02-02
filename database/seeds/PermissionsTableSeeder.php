<?php

use Larashop\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            [
                'name' => 'create',
                'display_name' => 'Create Record',
                'description' => 'Allow user to create a new DB record'
            ],
            [
                'name' => 'edit',
                'display_name' => 'Edit Record',
                'description' => 'Allow user to edit an existing DB record'
            ],
            [
                'name' => 'delete',
                'display_name' => 'Delete Record',
                'description' => 'Allow user to delete an existing DB record'
            ],
            [
                'name' => 'users',
                'display_name' => 'Manage Users',
                'description' => 'Allow user to manage system users'
            ]
        ];

        foreach ($permissions as $key => $value) {
            Permission::create($value);
        }
    }
}