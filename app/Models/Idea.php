<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Idea extends Model
{
    use HasFactory;

    public function product(){
        return $this->belongsTo(Product::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function votes(){
        return $this->morphMany(Vote::class, 'item');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
