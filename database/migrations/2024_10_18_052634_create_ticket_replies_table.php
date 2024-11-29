<?php

use App\Models\User;
use App\Models\Ticket;
use App\Enum\TicketStatusEnum;
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
        Schema::create('ticket_replies', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Ticket::class);
            $table->foreignIdFor(User::class);
            $table->string('title', 50);
            $table->text('body');
            $table->enum('status', array_column(TicketStatusEnum::cases(), 'value'))->default(TicketStatusEnum::PROCESSING->value);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ticket_replies');
    }
};
