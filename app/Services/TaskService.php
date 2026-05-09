<?php

namespace App\Services;

use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class TaskService
{
    /**
     * Get all tasks for the given user.
     *
     * @param User $user
     * @return Collection
     */
    public function getUserTasks(User $user): Collection
    {
        return $user->tasks()->latest()->get();
    }

    /**
     * Create a new task for the user.
     *
     * @param User $user
     * @param array $data
     * @return Task
     */
    public function createTask(User $user, array $data): Task
    {
        return $user->tasks()->create($data);
    }

    /**
     * Update the given task.
     *
     * @param Task $task
     * @param array $data
     * @return bool
     */
    public function updateTask(Task $task, array $data): bool
    {
        if (isset($data['completed'])) {
            $data['completed'] = (bool) $data['completed'];
        } else {
            $data['completed'] = false;
        }

        return $task->update($data);
    }

    /**
     * Delete the given task.
     *
     * @param Task $task
     * @return bool|null
     */
    public function deleteTask(Task $task): ?bool
    {
        return $task->delete();
    }
}
