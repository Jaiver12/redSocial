<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable =[
        'image_path',
        'description',
    ];

    //relacion One to Many / Uno a Muchos
    public function comments(){
        return $this->hasMany(Comment::class)->orderBy('id', 'desc');
    }

    public function likes(){
        return $this->hasMany(Like::class);
    }

    //Relacion de Muchos a Uno
    public function user(){
        return $this->belongsTo(User::class);
    }
}
