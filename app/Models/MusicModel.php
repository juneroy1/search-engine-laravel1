<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MusicModel extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'details',
    ];
    protected $table = 'musics';
}
