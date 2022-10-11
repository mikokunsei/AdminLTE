<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    //pengecualian field untuk diproses
    protected $guarded = [];
    
    protected $date = ['craeted_at'];
}
