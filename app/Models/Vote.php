<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    use HasFactory;

    public function item(){
        return $this->morphTo('item');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
