<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fasility extends Model
{
    protected $fillable = ['name','category_id','image','desc','price','satuan'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    
    public function peminjaman()
    {
        return $this->hasMany(Peminjaman::class);
    }
}
