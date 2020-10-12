<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Artista
 *
 * @property int $id
 * @property string $nombres
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Artista newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Artista newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Artista query()
 * @method static \Illuminate\Database\Eloquent\Builder|Artista whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Artista whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Artista whereNombres($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Artista whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Album[] $albumes
 * @property-read int|null $albumes_count
 * @property string $perfil
 * @method static \Illuminate\Database\Eloquent\Builder|Artista wherePerfil($value)
 */
class Artista extends Model
{
    use HasFactory;
    public function albumes()
    {
        return $this->hasMany(Album::class);
    }
}

