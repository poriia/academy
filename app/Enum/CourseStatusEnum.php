<?php

namespace App\Enum;

enum CourseStatusEnum: string
{
    case DISABLE = 'DISABLE';
    case ACTIVE = 'ACTIVE';
    case PENDING = 'PENDING';
}
