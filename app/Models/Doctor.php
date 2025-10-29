<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $fillable = [
        'name',
        'description',
        'experience',
        'designation',
        'qualification',
        'speciality',
        'profile_image',
        'profile_url',
        'appointment_url',
        'brief_profile_heading',
        'brief_profile_description',
        'brief_profile_image',
         'brief_notable_records',
        'professional_heading',
        'training_heading',
        'training_record',
        'specialized_heading',
        'specialized_subheading',
        'area_specialized_heading',
        'contributions_heading',
        'contributions_description',
        'latest_achievement'
    ];

    protected $casts = [
        'brief_metrics' => 'array',
         'professional_description' => 'array',
         'training_description' => 'array',
         'specialized_description' => 'array',
          'areas_of_specialization' => 'array',
    ];

    public $timestamps = true;
    protected $table = "doctors";

    public function speciality()
    {
        return $this->belongsTo(Speciality::class);
    }
}
