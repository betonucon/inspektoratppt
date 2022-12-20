<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lhpdoc extends Model
{
    use HasFactory;
    protected $table='lhp_doc';
    protected $guarded=['id'];

    public $timestamps = false;
}
