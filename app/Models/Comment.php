<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Comment extends Model
{
    use HasFactory;

    protected $appends = ['own_comment'];

    public function idea(){
        return $this->belongsTo(Idea::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function getOwnCommentAttribute(){
        return Str::contains($this->user->email, 'codepotato.co.uk', );
    }
}
