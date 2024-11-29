<?php

namespace App\Models;

use App\Enum\LessonStatusEnum;
use Illuminate\Database\Eloquent\Model;
use App\Enum\LessonContentTypeStatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Lesson extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_id',
        'title',
        'description',
        'status',
        'publish_at',
        'is_private',
        'content_type',
    ];

    protected $with = ['replies'];

    protected function casts()
    {
        return [
            'status' => LessonStatusEnum::class,
            'content_type' => LessonContentTypeStatusEnum::class,
        ];
    }
}
