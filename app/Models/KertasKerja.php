<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KertasKerja extends Model
{
    use HasFactory;

    protected $table = 'kertas_kerja';
    protected $guarded = ['id'];
    public $timestamps = false;
}
