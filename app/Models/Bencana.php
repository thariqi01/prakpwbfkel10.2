<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Bencana extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'bencana';

    public function tambah(){

    }
    
    public function bencana(){

        return $this->belongsTo('App\Bencana');

    }
}
