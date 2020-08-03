<?php

namespace App\Policies;

use App\Subject;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Gate;

class SubjectPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return Gate::any(['viewAllSubjects', 'viewSubjects'], $user);
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\Subject  $subject
     * @return mixed
     */
    public function view(User $user, Subject $subject)
    {
        if($user->can('viewAllSubjects')){
            return true;
        }

        $userDictatesSubject = $user->subjects->pluck('id')->contains($subject->id);
        $userStudiesSubject = $user->enrollments->pluck('id')->contains($subject->id);
        return $user->can('viewClassNotes') && ($userDictatesSubject || $userStudiesSubject);
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return Gate::any(['manageSubjects', 'manageAllSubjects'], $user);
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Subject  $subject
     * @return mixed
     */
    public function update(User $user, Subject $subject)
    {
        if($user->can('manageAllSubjects')){
            return true;
        }

        $userDictatesSubject = $user->subjects->pluck('id')->contains($subject->id);
        $userStudiesSubject = $user->enrollments->pluck('id')->contains($subject->id);
        return $user->can('manageSubjects') && ($userDictatesSubject || $userStudiesSubject);

    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Subject  $subject
     * @return mixed
     */
    public function delete(User $user, Subject $subject)
    {
        return $this->update($user, $subject);
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Subject  $subject
     * @return mixed
     */
    public function restore(User $user, Subject $subject)
    {
        return $this->update($user, $subject);
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Subject  $subject
     * @return mixed
     */
    public function forceDelete(User $user, Subject $subject)
    {
        return $this->update($user, $subject);
    }

    /**
     * Determine whether the user can attach a student to a subject.
     * @param User $user
     * @param Subject $podcast
     * @param User $student
     * @return bool
     */
    public function attachAnyUser(User $user, Subject $subject)
    {
        return $user->can('attachStudents');
    }

    public function detachUser(User $user, Subject $subject, User $detachedUser)
    {
        return $user->can('attachStudents');
    }

}
