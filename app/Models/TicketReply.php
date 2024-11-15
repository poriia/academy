<?php

namespace App\Models;

use App\Enum\TicketStatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TicketReply extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'ticket_id',
        'title',
        'body',
        'status',
    ];

    protected $with = ['user'];

    protected function casts()
    {
        return [
            'status' => TicketStatusEnum::class,
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function ticket(): BelongsTo
    {
        return $this->belongsTo(Ticket::class);
    }
}
