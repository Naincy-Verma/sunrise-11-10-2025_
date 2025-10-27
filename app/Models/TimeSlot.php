<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TimeSlot extends Model
{
    //
    protected $fillable = [
        'start_time',
        'end_time',
        'status',
    ];

     protected $table = 'time_slots';
    public $timestamps = true;

    public function enquiries()
    {
        return $this->hasMany(Enquiry::class, 'time_slot_id');
    }

}
