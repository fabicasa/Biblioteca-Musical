<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Album
 *
 * @property-read \App\Models\Artista $cantante
 * @method static \Illuminate\Database\Eloquent\Builder|Album newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Album newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Album query()
 * @mixin \Eloquent
 * @property int $id
 * @property string $nombres
 * @property int $artistas_id
 * @property string $lanzamiento
 * @property string $caratula
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Album whereArtistasId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Album whereCaratula($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Album whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Album whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Album whereLanzamiento($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Album whereNombres($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Album whereUpdatedAt($value)
 */
class Album extends Model
{
    use HasFactory;
    protected $table ='albumes';

    public function artista()
    {
        return $this->belongsTo(Artista::class,'artistas_id');
    }
    public function canciones()
    {
        return $this->hasMany(Cancion::class);
    }
}
