<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">
    <title>Agence de Voyage Santiane</title>
    <style>
        body {
            background-color: #edf2f7;
        }
    </style>
</head>
<body>
<div>
    @foreach($voyages as $voyage)
        <div class="card">
            <h2 class="text-center">Voyage n°{{$voyage->id}}</h2>
            @foreach($voyage->etapes as $etape)
                <div class="card-steps row">
                    <div class="col-6">
                        Moyen de transport : <b>{{$etape->type}}</b><br>
                        De : <b>{{$etape->departure}}</b><br>
                        Vers : <b>{{$etape->arrival}}</b><br>
                    </div>
                    <div class="col-5">
                        {{$etape->seat ? "Siège : " . $etape->seat : ""}}<br>
                        {{$etape->gate ? "Porte : " . $etape->gate : ""}}<br>
                        {{$etape->baggage_drop ? "Dépose-bagage : " . $etape->baggage_drop : ""}}<br>
                    </div>
                </div>
            @endforeach
        </div>
</div>
@endforeach
<div class="card center">
    <a class="btn text-decoration-none" href="{{route('create')}}">Ajouter un voyage</a>
</div>
</body>
</html>
