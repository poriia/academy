<?php

namespace App\Observers;

use App\Models\Course;

class CourseObserver
{
    /**
     * Handle the Course "created" event.
     */
    public function creating(Course $course): void
    {
        if (!$course->isDirty('created_by')) {
            $course->created_by = auth()->user()->id;
        }
        if (!$course->isDirty('updated_by')) {
            $course->updated_by = auth()->user()->id;
        }
    }

    /**
     * Handle the Course "updated" event.
     */
    public function updating(Course $course): void
    {
        if (!$course->isDirty('updated_by')) {
            $course->updated_by = auth()->user()->id;
        }
    }
}
