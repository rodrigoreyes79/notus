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
        $permissions = collect([
            'assignRoles' => ['admin'],
            'attachStudents' => ['admin'],
            'canBeGivenAccess' => ['admin'],
            'manageAllClassNotes' => ['admin'],
            'manageAllSubjects' => ['admin'],
            'manageClassNotes' => ['admin', 'teacher'],
            'manageRoles' => ['admin'],
            'manageSubjects' => ['admin'],
            'manageUsers' => ['admin'],
            'viewAllClassNotes' => ['admin'],
            'viewAllSubjects' => ['admin'],
            'viewClassNotes' => ['admin', 'teacher'],
            'viewNova' => ['admin', 'teacher'],
            'viewRoles' => ['admin'],
            'viewSubjects' => ['admin', 'teacher'],
            'viewUsers' => ['admin', 'teacher']
        ]);

        $this->addRole('Admin', 'admin', $permissions);
        $this->addRole('Teacher', 'teacher', $permissions);
    }

    private function addRole($name, $slug, $permissions){
        $id = Role::insertGetId([
            "name" => $name,
            "slug" => $slug
        ]);

        /** @var Role $adminRole */
        $role = Role::find($id);

        $permissions->filter(function($value, $key) use ($slug) {
            return collect($value)->contains($slug);
        })->each(function($value, $p) use ($role) {
            $role->grant($p);
        });
    }
}
