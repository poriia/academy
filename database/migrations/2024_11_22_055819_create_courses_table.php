<?php

use App\Models\Category;
use App\Enum\CourseStatusEnum;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255);
            $table->foreignIdFor(Category::class);
            $table->string('description')->nullable();
            $table->enum('status', array_column(CourseStatusEnum::cases(), 'value'))->default(CourseStatusEnum::PENDING->value);
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
        Schema::dropIfExists('courses');
    }
};
