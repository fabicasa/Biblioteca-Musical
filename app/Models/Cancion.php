<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cancion extends Model
{
    use HasFactory;
    protected $table ='canciones';
    public function album()
    {
        return $this->belongsTo(Album::class,'album_id');
    }
}
