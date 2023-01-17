<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_Status_Lhp extends Model
{
    use HasFactory;

    protected $table = 'm_status_lhp';
    protected $guarded = ['id'];
    public $timestamps = false;
}
