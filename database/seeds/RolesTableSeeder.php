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
        $roles = [
            [
                'name' => 'admin',
                'display_name' => 'admin',
                'description' => 'admin only role'
            ],
            [
                'name' => 'Techar',
                'display_name' => 'Techar',
                'description' => 'Techar only role'
            ],
            [
                'name' => 'Student',
                'display_name' => 'Student',
                'description' => 'Student only role'
            ]
//
        ];

        foreach ($roles as $role)
        {

            $data = new Role();
            $data->name = $role['name'];
            $data->display_name = $role['display_name'];
            $data->description = $role['description'];
            $data->save();
        }
    }
}
