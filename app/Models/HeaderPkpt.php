<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HeaderPkpt extends Model
{
    use HasFactory;
    protected $table = 'header_pkpt';
    protected $guarded = ['id'];
    public $timestamps = false;
}
