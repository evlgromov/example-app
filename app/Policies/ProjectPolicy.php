<?php

namespace App\Policies;

use App\Models\Project;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProjectPolicy
{
    use HandlesAuthorization;

    /**
     * Может ли пользователь просматривать проекты другого пользователя
     */
    public function view(User $authUser): bool
    {
        return (bool) $authUser;
    }

    /**
     * Может ли пользователь создавать проекты
     */
    public function create(User $authUser): bool
    {
        return (bool) $authUser;
    }

    /**
     * Может ли пользователь редактировать проекты
     */
    public function update(User $authUser, Project $updatedProject): bool
    {
        return ($authUser->role === 'admin' or $authUser->id === $updatedProject->user_id);
    }

    /**
     * Может ли пользователь удалять проекты
     */
    public function delete(User $authUser, Project $deletedProject): bool
    {
        return ($authUser->role === 'admin' or $authUser->id === $deletedProject->user_id);
    }
}
