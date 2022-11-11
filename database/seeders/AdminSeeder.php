<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admins = [
            [
                'name' => 'Admin',
                'email' => 'admin@portfolio.com',
                'password' => bcrypt('11223344'),
                'user_role' => 'admin',
                'email_verified_at' => now()
            ],
        ];

        foreach ($admins as $admin) {
            User::Create($admin);
        }
    }
}
