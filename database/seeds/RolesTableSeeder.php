<?php

use Larashop\Models\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'name' => 'admin',
                'display_name' => 'Administrator',
                'description' => 'User has access to all system functionality'
            ],
            [
                'name' => 'shop-keeper',
                'display_name' => 'Shop Keeper',
                'description' => 'User can create create data in the system'
            ]
        ];

        foreach ($roles as $key => $value) {
            Role::create($value);
        }
    }
}
