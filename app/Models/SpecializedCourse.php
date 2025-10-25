<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SpecializedCourse extends Model
{
    //
    protected $fillable = [
        'title',
        'sub_title',
        'badge_label',
        'price',
        'features',
        'button_text',
        'status',
    ];

    protected $casts = [
        'features' => 'array'
    ];

    protected $table = 'specialized_courses';
    public $timestamps = true;
    
}
