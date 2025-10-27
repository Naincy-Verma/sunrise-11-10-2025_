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
        Schema::create('program_registrations', function (Blueprint $table) {
            $table->id();
             $table->string('name');
            $table->string('email');
            $table->string('mobile');
            $table->string('source');
            $table->foreignId('training_program_id')->nullable()->constrained('training_programs')->nullOnDelete();
            $table->string('document'); // Attach Doc
            $table->string('location');
            $table->text('message');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('program_registrations');
    }
};
