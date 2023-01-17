<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pkpt extends Model
{
    use HasFactory;
    protected $table = 'pkpt';
    protected $guarded = ['id'];

    public $timestamps = false;

    public function getOpd()
    {
        return $this->belongsTo('App\Models\Opd', 'opd', 'id');
    }

    public function getResiko()
    {
        return $this->belongsTo('App\Models\M_TingkatResiko', 'tingkat_resiko', 'id');
    }

    public function jenisPengawasan()
    {
        return $this->belongsTo('App\Models\JenisPengawasan', 'jenis_pengawasan', 'id');
    }
    public function lhp()
    {
        return $this->belongsTo('App\Models\Lhp', 'id_pkpt', 'id');
    }
}
