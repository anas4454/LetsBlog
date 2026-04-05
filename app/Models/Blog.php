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
        'writerId',
        'userId',
    ];

    public function writer(){
       return  $this->belongsTo(Writer::class , 'writerId');
    }

    public function user(){
        return  $this->belongsTo(User::class , 'userId');
     }
}
