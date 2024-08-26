<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $primaryKey = 'Mov_id';
    protected $table = 'movies';
    protected $fillable = [
        'Mov_title',
        'Mov_year',
        'Mov_time',
        'Mov_lang',
        'Mov_dt_rel',
        'Mov_photo',
        'Mov_rel_country',
        'created_at',
        'updated_at'
    ];
    public function comments()
    {
        return $this->hasMany(Comment::class, 'mov_id', 'Mov_id');
    }
}
