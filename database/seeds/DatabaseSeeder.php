<?php

use App\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        User::create([
            'first_name' => 'John',
            'last_name' => 'Doe',
            'username' => 'test',
            'email' => 'test@test.com',
            'password' => bcrypt('test'),
        ]);
    }
}