<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PatientEducation extends Model
{
    //
    protected $fillable = [
        'heading',
        'description'
    ];

        protected $casts = [
        'description' => 'array',
    ];


    public $timestamps = true;
    protected $table = "patient_educations";
}
