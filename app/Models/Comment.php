<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $primaryKey = 'comment_id';

    protected $fillable = ['comment_id','mov_id', 'user_id', 'content'];

    public function movie()
    {
        return $this->belongsTo(Movie::class, 'mov_id', 'Mov_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
