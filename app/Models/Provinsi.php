<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Provinsi extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'provinsi';

    public function tambah(){

        
    }

    protected $fillable = [
        'id',
        'id_bencana',
        'id_kecamatan',
        'waktu_bencana',
        'status',

    ];
}
