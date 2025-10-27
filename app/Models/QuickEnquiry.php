<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuickEnquiry extends Model
{
    //
    protected $fillable = [
        'name' ,
        'mobile_number',
        'time_slot_id',
    ];

    protected $table = 'quick_enquiries';
    public $timestamps= true;

    public function timeSlot()
    {
        return $this->belongsTo(TimeSlot::class, 'time_slot_id');
    }
}
