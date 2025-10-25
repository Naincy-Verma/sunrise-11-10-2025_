<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  
    public function up(): void
    {
        Schema::create('vision_missions', function (Blueprint $table) {
            $table->id();
            $table->string('icon_vission')->nullable();
            $table->string('heading_vission')->nullable();
            $table->text('vission_description')->nullable();
            $table->string('icon_mission')->nullable();
            $table->string('heading_mission')->nullable();
            $table->text('mission_description')->nullable();
            $table->json('stats')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visions_missions');
    }
};
