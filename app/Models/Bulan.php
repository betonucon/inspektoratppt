<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bulan extends Model
{
    use HasFactory;

    protected $table = 'm_bulan';
    protected $guarded = ['id'];

    public $timestamps = false;
}
