<?php

namespace App\Enum;

enum LessonContentTypeStatusEnum: string
{
    case TEXT = 'TEXT';
    case VIDEO = 'VIDEO';
    case AUDIO = 'AUDIO';
    case QUIZ = 'QUIZ';
}
