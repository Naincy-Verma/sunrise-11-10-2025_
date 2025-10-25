<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Excellence extends Model
{
    //
    protected $fillable = [
        'heading',
        'description',
        'image'
    ];

    public $timestamps = true;
    protected $table = 'excellences';
}
