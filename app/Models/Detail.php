<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'detailkorban';

    public function tambah(){
        
    }
    
    public function detailkorban(){
        
        return $this->belongsTo('App\detailkorban');
        
    }
}
