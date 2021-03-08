<?php

namespace Tests\Feature;

use App\Models\Voyage;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class HomeControllerTest extends TestCase
{
    use WithoutMiddleware;

    /**
     * Teste l'affichage de l'indes des voyages
     */
    public function testIndex()
    {
        $this->get(route('welcome'))
            ->assertStatus(200)
            ->assertViewIs('welcome');
    }

    /**
     * Teste l'affichage du formulaire de création d'un voyage
     */
    public function testCreate()
    {
        $this->get(route('create'))
            ->assertStatus(200)
            ->assertViewIs('create');
    }

    /**
     * Teste la création d'un voyage
     */
    public function testStoreSuccess()
    {
        $countVoyages = Voyage::query()->count();

        $this->post(route('store', [
            "type" => [
                'Bus'
            ],
            "transport_number" => [
                '5'
            ],
            "departure" => [
                'Tokyo'
            ],
            "arrival" => [
                'Kyoto'
            ],
            "seat" => [
                ''
            ],
            "gate" => [
                ''
            ],
            "baggage_drop" => [
                ''
            ]
        ]))
            ->assertStatus(302);

        $this->assertEquals($countVoyages + 1, Voyage::query()->count());
    }

    /**
     * Teste la création d'un voyage si le numéro de transport n'est pas renseigné
     */
    public function testStoreErrorIfNoTransportNumber()
    {

        $countVoyages = Voyage::query()->count();

        $this->post(route('store', [
            "type" => [
                'Plane'
            ],
            "transport_number" => [
                ''
            ],
            "departure" => [
                'Nice'
            ],
            "arrival" => [
                'Tokyo'
            ],
            "seat" => [
                ''
            ],
            "gate" => [
                ''
            ],
            "baggage_drop" => [
                ''
            ]
        ]))
            ->assertStatus(302);

        $this->assertEquals($countVoyages, Voyage::query()->count());
    }
}
