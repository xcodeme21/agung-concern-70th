<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            ['id' => 1, 'username' => 'superadmin', 'name' => 'superadmin', 'email' => 'superadmin@gmail.com', 'password' => md5('superrahasia')],
            ['id' => 2, 'username' => 'usher1', 'name' => 'usher1', 'email' => 'usher1@gmail.com', 'password' => md5('usherrahasia')],
            ['id' => 3, 'username' => 'usher2', 'name' => 'usher2', 'email' => 'usher2@gmail.com', 'password' => md5('usherrahasia')],
            ['id' => 4, 'username' => 'usher3', 'name' => 'usher3', 'email' => 'usher3@gmail.com', 'password' => md5('usherrahasia')],
            ['id' => 5, 'username' => 'usher4', 'name' => 'usher4', 'email' => 'usher4@gmail.com', 'password' => md5('usherrahasia')],
            ['id' => 6, 'username' => 'usher5', 'name' => 'usher5', 'email' => 'usher5@gmail.com', 'password' => md5('usherrahasia')],
            ['id' => 7, 'username' => 'usher6', 'name' => 'usher6', 'email' => 'usher6@gmail.com', 'password' => md5('usherrahasia')],
            ['id' => 8, 'username' => 'usher7', 'name' => 'usher7', 'email' => 'usher7@gmail.com', 'password' => md5('usherrahasia')],
            ['id' => 9, 'username' => 'usher8', 'name' => 'usher8', 'email' => 'usher8@gmail.com', 'password' => md5('usherrahasia')],
            ['id' => 10, 'username' => 'usher9', 'name' => 'usher9', 'email' => 'usher9@gmail.com', 'password' => md5('usherrahasia')],
            ['id' => 11, 'username' => 'usher10', 'name' => 'usher10', 'email' => 'usher10@gmail.com', 'password' => md5('usherrahasia')],
        ];

        foreach ($users as $user) {
            \Log::info('User data before updateOrCreate', ['user' => $user]);
            User::updateOrCreate(['id' => $user['id']], $user);
            \Log::info('User data after updateOrCreate', ['user' => $user]);
        }
    }
}
