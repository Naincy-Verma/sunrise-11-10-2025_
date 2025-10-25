<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vision_Mission extends Model
{
    protected $fillable = [
       'icon_vission',
        'heading_vission',
        'vission_description',
        'icon_mission',
        'heading_mission',
        'mission_description',
        'stats',
    ];

    public $timestamps = true;
    protected $table = "vision_missions";
}
