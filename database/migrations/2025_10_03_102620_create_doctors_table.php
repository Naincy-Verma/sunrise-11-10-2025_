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
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
                $table->foreignId('speciality_id')
                  ->nullable()
                  ->constrained('our_specialties')  
                  ->onDelete('set null');
            

             // Basic Info (Homepage)
            $table->string('name');
            $table->text('description');
            $table->string('experience');
            $table->string('designation');
            $table->string('qualification');
           
            $table->string('profile_image');
            $table->string('profile_url');
            $table->string('appointment_url');

            // Detail Page Info
            $table->string('brief_profile_heading')->nullable();
            $table->text('brief_profile_description')->nullable();
            $table->string('brief_profile_image')->nullable();
            $table->text('brief_notable_records')->nullable(); 
            $table->json('brief_metrics')->nullable();
            
            // Professional  Achievements
            $table->string('professional_heading')->nullable();
            $table->json('professional_description')->nullable();

            //Training Program Conducted
            $table->string('training_heading')->nullable();
            $table->json('training_description')->nullable();
            $table->longText('training_record')->nullable();

            // Specialized Procedures
            $table->string('specialized_heading')->nullable(); 
            $table->string('specialized_subheading')->nullable();
            $table->json('specialized_description')->nullable();

            // Areas of Specialization
              $table->string('area_specialized_heading')->nullable(); 
            $table->json('areas_of_specialization')->nullable();

            // Professional Contributions
            $table->string('contributions_heading')->nullable();
            $table->longText('contributions_description')->nullable();
            $table->longText('latest_achievement')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */               
    public function down(): void
    {
        Schema::dropIfExists('doctors');
    }
};
