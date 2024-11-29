<?php

namespace App\Models;

use App\Enum\CourseStatusEnum;
use App\Observers\CourseObserver;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;

#[ObservedBy([CourseObserver::class])]
class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'title',
        'description',
        'status',
        'publish_at',
        'created_by',
        'updated_by',
    ];

    protected $with = [
        'category',
        'creator',
        'updater',
    ];

    protected function casts()
    {
        return [
            'status' => CourseStatusEnum::class,
        ];
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updater(): BelongsTo
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
}
