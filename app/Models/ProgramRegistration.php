<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProgramRegistration extends Model
{
    protected $fillable = [
        'name',
        'email',
        'mobile',
        'source',
        'training_program_id',
        'document',
        'location',
        'message'
    ];

    public $timestamps= true;
    protected $table ='program_registrations';

    public function trainingProgram()
    {
        return $this->belongsTo(TrainingProgram::class);
    }
}
