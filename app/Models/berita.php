<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class berita extends Model
{
    //
     protected $table = 'berita';

     public $timestamps = false; 

      public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
