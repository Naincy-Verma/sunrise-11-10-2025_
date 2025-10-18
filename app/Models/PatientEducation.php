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

    public $timestamps = true;
    protected $table = "patient_educations";
}
