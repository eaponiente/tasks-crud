<?php

namespace App\Actions\Tasks;

use App\Models\Task;

class GetTasksAction
{
    public function execute(array $data)
    {
        return Task::query()->paginate($data['limit'] ?? 15);
    }
}
