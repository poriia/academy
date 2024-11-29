<?php

namespace App\Enum;

enum LessonStatusEnum: string
{
    case DISABLE = 'DISABLE';
    case ACTIVE = 'ACTIVE';
    case PENDING = 'PENDING';
}
