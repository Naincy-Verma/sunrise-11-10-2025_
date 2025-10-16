<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Speciality extends Model
{
    protected  $table = 'our_specialties';
    protected $fillable = ['title', 'slug', 'icon', 'image' , 'description', 'status'];
}
