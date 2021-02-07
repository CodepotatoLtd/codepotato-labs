<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function ideas(){
        return $this->hasMany(Idea::class);
    }

    public function votes(){
        return $this->hasMany(Vote::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
