<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    protected $fillable = ['no','tanggal','fasility_id','lama','status','keterangan'];

    public function fasility()
    {
        return $this->belongsTo(Fasility::class);
    }
}
