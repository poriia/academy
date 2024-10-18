<?php

namespace App\Enum;

enum TicketStatusEnum: string
{
    case PROCESSING = 'processing';
    case ANSWERED = 'answered';
    case FINISHED = 'finished';
}
