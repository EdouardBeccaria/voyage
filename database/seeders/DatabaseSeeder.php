<?php

namespace Database\Seeders;

use App\Models\Etape;
use App\Models\Voyage;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        /** @var Voyage $voyage1 */
        $voyage1 = Voyage::query()->create();
        Etape::query()->create([
            'type' => "train",
            'transport_number' => "78A",
            'departure' => "Madrid",
            'arrival' => "Barcelona",
            'seat' => "45B",
            'voyage_id' => $voyage1->id
        ]);
        Etape::query()->create([
            'type' => "bus",
            'transport_number' => "airpot",
            'departure' => "Barcelona",
            'arrival' => "Gerona Airport",
            'seat' => null,
            'voyage_id' => $voyage1->id
        ]);
        Etape::query()->create([
            'type' => "plane",
            'transport_number' => "SK455",
            'departure' => "Gerona Airport",
            'arrival' => "Stockholm",
            'seat' => "3A",
            'gate' => "45B",
            'baggage_drop' => "344",
            'voyage_id' => $voyage1->id
        ]);
        Etape::query()->create([
            'type' => "plane",
            'transport_number' => "SK22",
            'departure' => "Stockholm",
            'arrival' => "New York JFK",
            'seat' => "7B",
            'gate' => "22",
            'baggage_drop' => null,
            'voyage_id' => $voyage1->id
        ]);

        /** @var Voyage $voyage2 */
        $voyage2 = Voyage::query()->create();
        Etape::query()->create([
            'type' => "bus",
            'transport_number' => "B1",
            'departure' => "Grasse",
            'arrival' => "Cannes",
            'seat' => null,
            'voyage_id' => $voyage2->id
        ]);
        Etape::query()->create([
            'type' => "train",
            'transport_number' => "TER-A",
            'departure' => "Cannes",
            'arrival' => "Nice Riquier",
            'seat' => null,
            'voyage_id' => $voyage2->id
        ]);
        Etape::query()->create([
            'type' => "bus",
            'transport_number' => "B2",
            'departure' => "Nice Riquier",
            'arrival' => "Nice",
            'seat' => null,
            'voyage_id' => $voyage2->id
        ]);
        Etape::query()->create([
            'type' => "plane",
            'transport_number' => "P455",
            'departure' => "Nice",
            'arrival' => "Paris",
            'seat' => "3A",
            'gate' => "45B",
            'baggage_drop' => null,
            'voyage_id' => $voyage2->id
        ]);
        Etape::query()->create([
            'type' => "plane",
            'transport_number' => "P42",
            'departure' => "Paris",
            'arrival' => "Londres",
            'seat' => "96B",
            'gate' => "12",
            'baggage_drop' => "123",
            'voyage_id' => $voyage2->id
        ]);
        Etape::query()->create([
            'type' => "train",
            'transport_number' => "T9 3/4",
            'departure' => "Londres",
            'arrival' => "Hogwarts Castle",
            'seat' => "6",
            'gate' => "45B",
            'voyage_id' => $voyage2->id
        ]);
    }
}
