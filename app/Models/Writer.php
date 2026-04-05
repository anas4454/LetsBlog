<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Writer extends Model
{
    /** @use HasFactory<\Database\Factories\WriterFactory> */
    use HasFactory;

     public function blog(){
       return  $this->hasMany(Blog::class);
    }

    
}
