<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApproveKertasKerja extends Model
{
    use HasFactory;

    protected $table = 'approve_kertas_kerja';
    protected $guarded = ['id'];
    public $timestamps = false;
}
