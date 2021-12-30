<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use hasFactory, SoftDeletes;
    
    protected $table = 'role';

    public function tambah(){

        
    }
}
