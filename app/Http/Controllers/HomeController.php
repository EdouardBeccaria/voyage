<?php

namespace App\Http\Controllers;

use App\Models\Etape;
use App\Models\Voyage;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class HomeController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Retourne la vue de tous les voyages
     * @return View
     */
    public function index(): View
    {
        $voyages = Voyage::query()
            ->with('etapes')
            ->get();

        return view('welcome', compact('voyages'));
    }

    /**
     * Retourne la page de création d'un voyage
     * @return View
     */
    public function create(): View
    {
        return view('create');
    }

    /**
     * Enregistre le voyage dans la database
     * @param Request $request
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $validator = Validator::make($request->all(), [
            'type' => 'required|array',
            'type.*' => 'required|string',
            'transport_number' => 'required|array',
            'transport_number.*' => 'required|string',
            'departure' => 'required|array',
            'departure.*' => 'required|string|distinct',
            'arrival' => 'required|array',
            'arrival.*' => 'required|string|distinct',
            'seat' => 'required|array',
            'seat.*' => 'nullable|string',
            'gate' => 'required|array',
            'gate.*' => 'nullable|string',
            'baggage_drop' => 'required|array',
            'baggage_drop.*' => 'nullable|string',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->with('errors', 'Les paramètres renseignés sont incorrects !');
        }
        $validator = collect($validator->validate());

        /** On récupère le nombre d'étapes renseignées */
        $size = count($validator->get('type'));

        /** @var Voyage $voyage */
        $voyage = Voyage::query()->create();

        /** On créé toutes les étpaes */
        for ($i = 0; $i < $size; $i++) {
            Etape::query()->create([
                'type' => $validator->get('type')[$i],
                'transport_number' => $validator->get('transport_number')[$i],
                'departure' => $validator->get('departure')[$i],
                'arrival' => $validator->get('arrival')[$i],
                'seat' => $validator->get('seat')[$i],
                'gate' => $validator->get('gate')[$i],
                'baggage_drop' => $validator->get('baggage_drop')[$i],
                'voyage_id' => $voyage->id
            ]);
        }
        return redirect()->route('welcome');
    }
}
