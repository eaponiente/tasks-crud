<?php

namespace App\Enums;

namespace App\Enums;

enum TaskStatus: string
{
    case PENDING = 'pending';
    case IN_PROGRESS = 'in_progress';
    case COMPLETED = 'completed';

    public static function values(): array
    {
        return array_map(fn ($case) => $case->value, self::cases());
    }
}
