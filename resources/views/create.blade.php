<!DOCTYPE html>
<html>
<head>
    <title>Agence de Voyage Santiane</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">
    <style type="text/css">
        body {
            background-color: #edf2f7;
        }
    </style>
</head>
<body>
<div class="container" style="margin-top:200px;">
    <h1> Ajout d'un voyage</h1>
    @if(Session::has('errors'))
        <span style="color: red; font-weight: bold">{{ Session::get('errors') }}</span>
    @endif
    <form action="{{ route('store') }}" method="post">
        @csrf
        <div class="row" style="margin-top:26px;">
            <div class="col-md-5">
                <table class="table table-sm table-bordered">
                    <thead>
                    <tr>
                        <th>Type</th>
                        <th>Numéro de transport</th>
                        <th>Départ</th>
                        <th>Arrivée</th>
                        <th>Siège</th>
                        <th>Porte</th>
                        <th>Numéro de bagage</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody id="addRow" class="addRow">
                    </tbody>

                </table>
                <div style="padding-top: 10px">
                    <button id="addMore" type="button" class="btn">Ajouter une étape</button>
                </div>
                <div style="padding-top: 10px">
                    <button type="submit" class="btn">Enregistrer le voyage</button>
                </div>
            </div>
        </div>
    </form>
</div>


<script src="//code.jquery.com/jquery.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.7.6/handlebars.min.js"></script>

<script id="document-template" type="text/x-handlebars-template">
    <tr class="delete_add_more_item" id="delete_add_more_item">
        <td>
            <input type="text" name="type[]" value="@{{ type }}">
        </td>
        <td>
            <input type="text" name="transport_number[]" value="@{{ transport_number }}">
        </td>
        <td>
            <input type="text" name="departure[]" value="@{{ departure }}">
        </td>
        <td>
            <input type="text" name="arrival[]" value="@{{ arrival }}">
        </td>
        <td>
            <input type="text" name="seat[]" value="@{{ seat }}">
        </td>
        <td>
            <input type="text" name="gate[]" value="@{{ gate }}">
        </td>
        <td>
            <input type="text" name="baggage_drop[]" value="@{{ baggage_drop }}">
        </td>

        <td>
            <i class="removeaddmore" style="cursor:pointer;color:red;">Supprimer</i>
        </td>
    </tr>
</script>

<script type="text/javascript">
    addRow();
    $(document).on('click', '#addMore', function () {
        addRow();
    });

    $(document).on('click', '.removeaddmore', function (event) {
        $(this).closest('.delete_add_more_item').remove();
    });

    function addRow() {
        var type = $("#type").val();
        var transport_number = $("#transport_number").val();
        var departure = $("#departure").val();
        var arrival = $("#arrival").val();
        var seat = $("#seat").val();
        var gate = $("#gate").val();
        var baggage_drop = $("#baggage_drop").val();

        var source = $("#document-template").html();
        var template = Handlebars.compile(source);

        var data = {
            type: type,
            transport_number: transport_number,
            departure: departure,
            arrival: arrival,
            seat: seat,
            gate: gate,
            baggage_drop: baggage_drop,
        }

        var html = template(data);
        $("#addRow").append(html)
    }
</script>

</body>
</html>
