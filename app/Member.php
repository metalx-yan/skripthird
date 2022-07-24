<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $fillable = ['nik', 'name', 'email', 'telp', 'alamat'];
}
