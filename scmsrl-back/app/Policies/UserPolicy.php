<?php

namespace App\Policies;

use App\User;
use App\rol;
use Illuminate\Support\Str;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
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
        $rol=rol::find($user->rol_id);
        return (Str::of('admin')->exactly($rol->name) || Str::of('author')->exactly($rol->name));
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\User  $model
     * @return mixed
     */
    public function view(User $user, User $model)
    {
        $rol=rol::find($user->rol_id);
        return (Str::of('admin')->exactly($rol->name) || Str::of('author')->exactly($rol->name));
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        $rol=rol::find($user->rol_id);
        return Str::of('admin')->exactly($rol->name) ;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\User  $model
     * @return mixed
     */
    public function update(User $user, User $model)
    {
        $rol=rol::find($user->rol_id);
        return Str::of('admin')->exactly($rol->name) || $user->id === $model->id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\User  $model
     * @return mixed
     */
    public function delete(User $user, User $model)
    {
        $rol=rol::find($user->rol_id);
       return Str::of('admin')->exactly($rol->name) && $user->id != $model->id;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\User  $model
     * @return mixed
     */
    public function restore(User $user, User $model)
    {
        $rol=rol::find($user->rol_id);
        return Str::of('admin')->exactly($rol->name);
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\User  $model
     * @return mixed
     */
    public function forceDelete(User $user, User $model)
    {
        $rol=rol::find($user->rol_id);
        return Str::of('admin')->exactly($rol->name);
    }
}
