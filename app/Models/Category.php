<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'parent_id',
        'title',
        'description',
    ];

    public function parent(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }


    public function child()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function getParentTitleAttribute()
    {
        return $this->parent->title ?? 'without parent!';
    }

    // public function getChildTitleAttribute()
    // {
    //     return $this->child->title ?? 'without child!';
    // }
}
