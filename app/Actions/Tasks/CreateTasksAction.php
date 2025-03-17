<?php

namespace App\Actions\Tasks;

use App\Enums\TaskStatus;
use App\Models\Task;

class CreateTasksAction
{
    public function execute(array $data): Task
    {
        $data['status'] = TaskStatus::PENDING->value;

        return Task::create($data);
    }
}
