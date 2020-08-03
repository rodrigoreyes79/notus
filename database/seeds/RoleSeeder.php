<?php

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Silvanite\Brandenburg\Role::insert([
            "name" => "Admin",
            "slug" => "admin"
        ]);
    }
}
