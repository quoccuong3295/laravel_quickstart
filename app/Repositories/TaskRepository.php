<?php
namespace App\Repositories;
use App\Models\User;
class TaskRepository
{
    public function forUser(User $user){
        return $user->tasks()
            ->orderBy('create_at','asc')
            ->get();
    }
}

