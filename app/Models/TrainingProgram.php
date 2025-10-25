<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TrainingProgram extends Model
{
    //
    protected $fillable = [
        's_no',
        'training_course',
        'duration',
        'schedule',
    ];

    public $timestamps =true;
    protected $table = 'training_programs';
}
