<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class guru extends Model
{
    //
    protected $table = 'guru';

    protected $primaryKey = 'id_guru';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable =
     ['nama_guru','nip','mapel','foto'];

     public $timestamps = false; 
}
