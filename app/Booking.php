<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = ['tanggal','image','fasility_id','status'];

    public function fasility()
    {
        return $this->belongsTo(Fasility::class);
    }
}
