<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Kota extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'kota';

    public function tambah(){
        
    }
    
    public function kota(){
        return $this->belongsTo('App\Kota');
    }
}
