<?php

namespace App\Policies;

use App\Models\delivery;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class deliveryPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\delivery  $delivery
     * @return mixed
     */
    public function view(User $user, delivery $delivery)
    {
        return $user->id == $delivery->user_id;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\delivery  $delivery
     * @return mixed
     */
    public function update(User $user, delivery $delivery)
    {
                return $user->id == $delivery->user_id;

    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\delivery  $delivery
     * @return mixed
     */
    public function delete(User $user, delivery $delivery)
    {
                return $user->id == $delivery->user_id and $delivery->status != 1;

    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\delivery  $delivery
     * @return mixed
     */
    public function restore(User $user, delivery $delivery)
    {
              return $user->id == $delivery->user_id;

    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\delivery  $delivery
     * @return mixed
     */
    public function forceDelete(User $user, delivery $delivery)
    {
        return $user->id == $delivery->user_id;
        
    }
}
