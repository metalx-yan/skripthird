<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $fillable = ['customer','product','kuantitas','harga','order','total_order'];
}
