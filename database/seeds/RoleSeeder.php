<?php

use Illuminate\Database\Seeder;
use Silvanite\Brandenburg\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $id = Role::insertGetId([
            "name" => "Admin",
            "slug" => "admin"
        ]);

        /** @var Role $adminRole */
        $adminRole = Role::find($id);

        $permissions = collect([
            'assignRoles',
            'attachStudents',
            'canBeGivenAccess',
            'manageAllClassNotes',
            'manageAllSubjects',
            'manageClassNotes',
            'manageRoles',
            'manageSubjects',
            'manageUsers',
            'viewAllClassNotes',
            'viewAllSubjects',
            'viewClassNotes',
            'viewNova',
            'viewRoles',
            'viewSubjects',
            'viewUsers'
        ]);
        $permissions->each(function($p) use ($adminRole) {
            $adminRole->grant('$p');
        });
    }
}
