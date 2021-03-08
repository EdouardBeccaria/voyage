<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Etape
 * @package App\Models
 * @property int id
 * @property string type
 * @property string transport_number
 * @property string departure
 * @property string arrival
 * @property string seat
 * @property string gate
 * @property string baggage_drop
 */
class Etape extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'transport_number',
        'departure',
        'arrival',
        'seat',
        'gate',
        'baggage_drop',
        'voyage_id'
    ];
}
