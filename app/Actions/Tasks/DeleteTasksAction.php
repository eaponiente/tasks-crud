<?php

namespace App\Actions\Tasks;

use App\Models\Task;

class DeleteTasksAction
{
    public function execute(Task $task)
    {
        return $task->delete();
    }
}
