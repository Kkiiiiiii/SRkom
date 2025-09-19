<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ekstrakurikuler extends Model
{
    //
    protected $table = 'ekstrakurikuler';
    
    protected $primaryKey = 'id_ekskul';
    public $incrementing = true;
    protected $keyType = 'int';

     public $timestamps = false; 
}
