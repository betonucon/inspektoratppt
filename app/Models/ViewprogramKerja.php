<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ViewprogramKerja extends Model
{
    use HasFactory;

    protected $table = 'view_program_kerja';
    protected $guarded = ['id'];
    public $timestamps = false;
}
