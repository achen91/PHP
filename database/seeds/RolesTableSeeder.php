<?php

use App\Role;
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
        // Create Roles
        $roles = [
            [
                'name'  =>  'Gymie会员',
            ],
            [
                'name'  =>  '管理员',
            ],
            [
                'name'  =>  '经理',
            ],
        ];

        foreach ($roles as $role) {
            Role::create($role);
        }
    }
}
