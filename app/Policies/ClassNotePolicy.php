<?php

namespace App\Policies;

use App\ClassNote;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Gate;

class ClassNotePolicy
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
        return Gate::any(['viewAllClassNotes', 'viewClassNotes'], $user);
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\ClassNote  $classNote
     * @return mixed
     */
    public function view(User $user, ClassNote $classNote)
    {
        if($user->can('viewAllClassNotes')){
            return true;
        }

        $userDictatesSubject = $user->subjects->pluck('id')->contains($classNote->subject_id);
        return $user->can('viewClassNotes') && $userDictatesSubject;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return Gate::any(['manageClassNotes', 'manageAllClassNotes'], $user);
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\ClassNote  $classNote
     * @return mixed
     */
    public function update(User $user, ClassNote $classNote)
    {
        if($user->can('manageAllClassNotes')){
            return true;
        }

        $userDictatesSubject = $user->subjects->pluck('id')->contains($classNote->subject_id);
        return $user->can('manageClassNotes') && $userDictatesSubject;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\ClassNote  $classNote
     * @return mixed
     */
    public function delete(User $user, ClassNote $classNote)
    {
        return $this->update($user, $classNote);
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\ClassNote  $classNote
     * @return mixed
     */
    public function restore(User $user, ClassNote $classNote)
    {
        return $this->update($user, $classNote);
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\ClassNote  $classNote
     * @return mixed
     */
    public function forceDelete(User $user, ClassNote $classNote)
    {
        return $this->update($user, $classNote);
    }
}
