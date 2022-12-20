<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisPengawasan extends Model
{
    use HasFactory;
    protected $table='m_jenis_pengawasan';
    protected $guarded=['id'];

    public $timestamps = false;
}
