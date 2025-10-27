<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('quick_enquiries', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('mobile_number', 13 );
             // Foreign key reference to time_slots table
            $table->foreignId('time_slot_id')
                ->nullable()
                ->constrained('time_slots')
                ->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quick_enquiries');
    }
};
