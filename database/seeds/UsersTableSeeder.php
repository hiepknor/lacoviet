<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();

        $users = [
            // Admin
            [
                'name'	        => 'Admin',
                'email'         => 'admin@ecommerce.com',
                'password'      => '$2y$10$QNf5iYdhmFxVn7OMrtZJQemkt46VPLZtGmU6ncJk3LERyd1r/zSqW', // Encrypted password is: adminpass
            ],
        ];

        DB::table('users')->insert($users);
    }
}
