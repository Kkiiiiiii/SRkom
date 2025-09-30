<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class galeri extends Model
{
    //
    protected $table = 'galeri';

    protected $primaryKey = 'id_galeri';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable =
     ['judul','keterangan','file','kategori','tanggal'];

    public $timestamps = false; 
}
