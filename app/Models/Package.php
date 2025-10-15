<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $fillable =[
        'heading',
        'tests'
    ];

    protected $casts =[
        'tests' => 'array'
    ];

    protected $table ='packages';
    public $timestamps =true;
}
