<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class siswa extends Model
{
    //
    public $table = 'siswa';
    protected $primaryKey = 'id_siswa';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable =
     ['nisn','nama_siswa','jenis_kelamin','tahun_masuk'];
    public $timestamps = false; 
}
