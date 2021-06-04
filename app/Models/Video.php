<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $hidden = ['created_at', 'updated_at'];

    //Retorna a URL completa do Vídeo
    public function getUrlAttribute($value) {
        return asset('videos/' . $value);
    }


}
