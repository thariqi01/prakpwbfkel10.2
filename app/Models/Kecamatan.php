<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    use HasFactory;

    protected $table = 'kecamatan';

    public function tambah(){
        
    }
    
    public function kecamatan(){
        
        return $this->belongsTo('App\Kecamatan');
        
    }
}
