<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Berita extends Model
{
    //
     protected $table = 'berita';
     protected $primaryKey = 'id_berita';
     public $timestamps = false; 

      protected $fillable = [
        'judul', 'isi', 'tanggal', 'gambar','id_user'
    ];

      public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }
}
