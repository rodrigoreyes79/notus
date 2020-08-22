<?php

namespace App\Providers;

use App\ClassNote;
use App\Policies\ClassNotePolicy;
use App\Policies\SubjectPolicy;
use App\Subject;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Silvanite\Brandenburg\Traits\ValidatesPermissions;

class AuthServiceProvider extends ServiceProvider
{

    use ValidatesPermissions;
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        ClassNote::class => ClassNotePolicy::class,
        Subject::class => SubjectPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        collect([
            'manageClassNotes',
            'manageAllClassNotes',
            'viewAllClassNotes',
            'viewClassNotes',
            'manageSubjects',
            'manageAllSubjects',
            'viewSubjects',
            'viewAllSubjects',
            'attachStudents',
            'onlyViewStudents',
        ])->each(function ($permission) {
            Gate::define($permission, function ($user) use ($permission) {
                if ($this->nobodyHasAccess($permission)) {
                    return true;
                }

                return $user->hasRoleWithPermission($permission);
            });
        });

        $this->registerPolicies();
    }
}
