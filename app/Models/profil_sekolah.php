<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class profil_sekolah extends Model
{
    //
    protected $table = 'profil_sekolah';


    protected $primaryKey = 'id_profil';
    public $incrementing = true;
    protected $keyType = 'int';
       
    protected $fillable =
     ['nama_sekolah','kepala_sekolah','foto','logo','npsn','alamat','kontak','visi_misi','tahun_berdiri','deskripsi'];

     public $timestamps = false; 
}
