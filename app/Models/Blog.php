<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    /** @use HasFactory<\Database\Factories\BlogFactory> */
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'image',
        'description',
        'writer_id',
        'user_id',
    ];

    public function writer(){
       return  $this->belongsTo(Writer::class , 'writer_id');
    }

   
}
