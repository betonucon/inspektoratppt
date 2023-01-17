<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Viewkertaskerja extends Model
{
    use HasFactory;

    protected $table = 'view_kertas_kerja';
    protected $guarded = ['id'];
    public $timestamps = false;
}
