<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            'name' => "Admin",
            'email' => 'notusadmin@mailinator.com',
            'password' => Hash::make('admin')
        ]);

        /** @var User $user */
        $user = User::find(1);
        $user->roles()->attach(1);
    }
}
