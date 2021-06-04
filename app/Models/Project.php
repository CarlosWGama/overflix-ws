<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $hidden = ['created_at', 'updated_at'];
    protected $with = ['videos'];

    public function getImageAttribute($value) {
        return asset('imgs/projects/' . $value);
    }

    public function videos() {
        return $this->hasMany(Video::class);
    }
}
