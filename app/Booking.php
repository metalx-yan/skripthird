<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = ['tanggal','image','fasility_id','status','user_id'];

    public function fasility()
    {
        return $this->belongsTo(Fasility::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
