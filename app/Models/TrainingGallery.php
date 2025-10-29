<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TrainingGallery extends Model
{
    //
    protected $fillable = [
        'image'
    ];

    protected $table = 'training_gallery';
    public $timestamps = true;

}
