<?php

namespace App\Policies;

use App\Category;
use App\User;
use App\rol;
use Illuminate\Support\Str;

use Illuminate\Auth\Access\HandlesAuthorization;

class CategoryPolicy
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
     * @param  \App\Category  $category
     * @return mixed
     */
    public function view(User $user, Category $category)
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
        return (Str::of('admin')->exactly($rol->name) || Str::of('author')->exactly($rol->name));
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Category  $category
     * @return mixed
     */
    public function update(User $user, Category $category)
    {
        //return true;
         $rol=rol::find($user->rol_id);
       return Str::of('admin')->exactly($rol->name);
    }


    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Category  $category
     * @return mixed
     */
    public function delete(User $user, Category $category)
    {
        return true;
        /* $rol=rol::find($user->rol_id);
       return Str::of('admin')->exactly($rol->name); */
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Category  $category
     * @return mixed
     */
    public function restore(User $user, Category $category)
    {
        $rol=rol::find($user->rol_id);
       return Str::of('admin')->exactly($rol->name);
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Category  $category
     * @return mixed
     */
    public function forceDelete(User $user, Category $category)
    {
        $rol=rol::find($user->rol_id);
       return Str::of('admin')->exactly($rol->name);
    }
}
