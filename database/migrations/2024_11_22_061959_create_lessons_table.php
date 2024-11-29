<?php

use App\Models\Course;
use App\Enum\LessonStatusEnum;
use Illuminate\Support\Facades\Schema;
use App\Enum\LessonContentTypeStatusEnum;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('lessons', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255);
            $table->foreignId(Course::class);
            $table->string('description')->nullable();
            $table->enum('content_type', array_column(LessonContentTypeStatusEnum::cases(), 'value'));
            $table->enum('status', array_column(LessonStatusEnum::cases(), 'value'))->default(LessonStatusEnum::PENDING->value);
            $table->timestamp('publish_at')->nullable();
            $table->tinyInteger('is_private')->default(1);
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lessons');
    }
};
