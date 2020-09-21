<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Riwayat extends Model
{
    public $timestamps = false;
    protected $fillable = ['tanggal','nama','tipe','perusahaan','tujuan'];
}
