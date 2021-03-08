<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Voyage
 * @package App\Models
 * @property int id
 */
class Voyage extends Model
{
    use HasFactory;

    public function etapes(): HasMany
    {
        return $this->hasMany(Etape::class, 'voyage_id');
    }
}
