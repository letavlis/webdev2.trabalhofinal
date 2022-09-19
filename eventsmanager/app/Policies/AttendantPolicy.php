<?php

namespace App\Policies;

use App\Models\Attendant;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AttendantPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Attendant  $attendant
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Attendant $attendant)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Attendant  $attendant
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Attendant $attendant)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Attendant  $attendant
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Attendant $attendant)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Attendant  $attendant
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Attendant $attendant)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Attendant  $attendant
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Attendant $attendant)
    {
        //
    }
}
