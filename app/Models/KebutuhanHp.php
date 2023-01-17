<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KebutuhanHp extends Model
{
    use HasFactory;
    protected $table='kebutuhan_hp';
    protected $guarded=['id_kh'];

    public $timestamps = false;
}
