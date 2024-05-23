@extends('Dashboard.index')
@section('contentDashboard')

    <h3 class="rounded-2 p-2 bg-light">Fiche Client {{$clients->client}}</h3>
    <form action="{{url('getByCompanie')}}" method="get">
    <label for=""> Companige</label>

    <select name="idCompa" id="" class="form-control d-inline">
        @foreach ($AllCompangie as $item)
            <option value="{{$item->id}}">{{$item->name}}</option>
        @endforeach
    </select>
    <input type="text" name="id"  value="{{$idclient}}" hidden>
    <button type="submit" class="btn btn-secondary d-inline mt-5">search</button>
</form>

        {{-- <div class="row"> --}}
            <form action="{{url('getByCompanie')}}" method="get">
                <div class="col-sm-12 col-md-6 col-xl-6">

                </div>
                <div class="col-sm-12 col-md-6 col-xl-6">

                </div>


        </div>


    {{-- <table class="table table-bordered" id="tableFiche" data-page-lenght="-1" hidden>
        <thead>
            <tr>
                <th>Date</th>
                <th>Sortie de caisses vides</th>
                <th>Entré de marchandises</th>
                <th>Sortie de marchandises</th>
                <th>Retour de caisses vides</th>
            </tr>
        </thead>
        <tbody>
            @foreach($mergedData as $row)
                <tr>
                    <td>{{$row['date'] }}</td>
                    <td >{{intval($row['caisseVide'])  }}</td>
                    <td>{{intval($row['totalEntree'])  }}</td>
                    <td>{{intval($row['totalSortie'])  }}</td>
                    <td>{{intval($row['caisseRetour'])  }}</td>
                </tr>
            @endforeach
            <tr>
                <td>Total</td>
                <td>{{ $totals['caisseVide'] }}</td>
                <td>{{ $totals['totalEntree'] }}</td>
                <td>{{ $totals['totalSortie'] }}</td>
                <td>{{ $totals['caisseRetour'] }}</td>
            </tr>
        </tbody>
    </table> --}}



    <table class="table table-striped table-bordered w-100" id="tableFiche" data-page-lenght="-1">
        <thead>
            <tr>
                <th rowspan="2">Date</th>
                <th rowspan="2" style="background-color: rgb(248, 154, 154)">Sortie de caisses vides</th>
                <th colspan="{{$NumberColSpanEntre}}" style="background-color: rgb(174, 245, 174)">Entré de marchandises</th>
                <th colspan="{{$NumberColSpanSortie}}" style="background-color: rgb(114, 235, 205)">Sortie de marchandises</th>
                <th rowspan="2" style="background-color: rgb(247, 211, 211)">Retour de caisses vides</th>
            </tr>
            <tr>
                @if (!empty($uniqueProductsEntree))
                    @foreach ($uniqueProductsEntree as $item)
                        <th style="background-color: rgb(174, 245, 174)">{{$item}}</th>
                    @endforeach
                @else
                    <th style="background-color: rgb(174, 245, 174)"></th>
                @endif

                @if (!empty($uniqueProductsSortie))
                    @foreach ($uniqueProductsSortie as $item)
                        <th style="background-color: rgb(114, 235, 205)">{{$item}}</th>
                    @endforeach
                @else
                    <th style="background-color: rgb(114, 235, 205)"></th>
                @endif



            </tr>
        </thead>
        <tbody>
            @foreach ($groupedData as $date => $data)
                <tr>
                    <td>{{ \Carbon\Carbon::parse($date)->format('d-m-Y') }}</td>
                    <td style="background-color: rgb(248, 154, 154)">{{ intval($data['caisseVide'] ?? 0) }}</td>

                    <!-- Check if uniqueProductsEntree is not empty -->
                    @if (!empty($uniqueProductsEntree))
                        <!-- Iterate over uniqueProductsEntree -->
                        @foreach ($uniqueProductsEntree as $product)
                            <td style="background-color: rgb(174, 245, 174)">{{ intval($data['marchandiseEntree'][$product] ?? 0) }}</td>
                        @endforeach
                    @else
                        <td colspan="{{ count($uniqueProductsEntree) }}" style="background-color: rgb(174, 245, 174)">0</td>
                    @endif

                    <!-- Iterate over uniqueProductsSortie -->
                    @if (!empty($uniqueProductsSortie))
                        @foreach ($uniqueProductsSortie as $product)
                            <td style="background-color: rgb(114, 235, 205)">{{ intval($data['marchandiseSortie'][$product] ?? 0) }}</td>
                        @endforeach
                    @else
                        <!-- If uniqueProductsSortie is empty, display 0 in each column -->
                        <td colspan="{{ count($uniqueProductsSortie) }}" style="background-color: rgb(114, 235, 205)">0</td>
                    @endif

                    <td style="background-color: rgb(247, 211, 211)">{{ intval($data['caisseRetour'] ?? 0) }}</td>
                </tr>
            @endforeach


        </tbody>
        <tfoot>
            <tr>
                <td>Total</td>
                <td style="background-color: rgb(248, 154, 154)"></td>
                @if (!empty($uniqueProductsEntree))
                    @foreach ($uniqueProductsEntree as $product)
                        <td style="background-color: rgb(174, 245, 174)">{{ $totalss['entree'][$product] ?? 0 }}</td>
                    @endforeach
                @else
                    <td style="background-color: rgb(174, 245, 174)"></td>
                @endif

                @if (!empty($uniqueProductsSortie))
                    @foreach ($uniqueProductsSortie as $product)
                        <td style="background-color: rgb(114, 235, 205)">{{ $totalss['sortie'][$product] ?? 0 }}</td>
                    @endforeach
                @else
                    <td style="background-color: rgb(114, 235, 205)"></td>
                @endif


                <td style="background-color: rgb(247, 211, 211)"></td>
            </tr>
            <tr>
                <th>Total </th>
                <th style="background-color: rgb(248, 154, 154)">{{ $totalss['caisseVide'] }}</th>

                @php
                    $totalEntree = array_sum($totalss['entree']);
                    $totalSortie = array_sum($totalss['sortie']);
                @endphp

                <th colspan="{{ $NumberColSpanEntre }}" style="text-align: center;background-color: rgb(174, 245, 174)">{{ $totalEntree }}</th>
                <th colspan="{{ $NumberColSpanSortie }}" style="text-align: center ;background-color: rgb(114, 235, 205)">{{ $totalSortie }}</th>
                <th style="background-color: rgb(247, 211, 211)">{{ $totalss['caisseRetour'] }}</th>
            </tr>
        </tfoot>

    </table>


    <div class="p-2 bg-light border mt-3">
        <p class=" fs-3">  Caisses vides chez client    = <span>{{$totalss['caisseVide'] - $totalss['caisseRetour']}}</span></p>
        <p class="fs-3"> Marachandise en stock= <span>{{$totalEntree - $totalSortie}}</span></p>
    </div>



    <script>
        $(document).ready(function ()
        {

            $('#tableFiche').DataTable({
                "ordering": false,
                dom: 'Bfrtip',
                buttons: [
                    'excel'
                ],
                paging: false,
                "pageLength": -1,

                "select": {
                    "style": "single"
                },
                "language":
                {
                    "sInfo": "Affichage de l'élément _START_ à _END_ sur _TOTAL_ éléments",
                    "sInfoEmpty": "Affichage de l'élément 0 à 0 sur 0 élément",
                    "sInfoFiltered": "(filtré à partir de _MAX_ éléments au total)",
                    "sInfoPostFix": "",
                    "sInfoThousands": ",",
                    "sLengthMenu": "Afficher _MENU_ éléments",
                    "sLoadingRecords": "Chargement...",
                    "sProcessing": "Traitement...",
                    "sSearch": "Rechercher :",
                    "sZeroRecords": "Aucun élément correspondant trouvé",
                    "oPaginate": {
                        "sFirst": "Premier",
                        "sLast": "Dernier",
                        "sNext": "Suivant",
                        "sPrevious": "Précédent"
                    },
                    "oAria": {
                        "sSortAscending": ": activer pour trier la colonne par ordre croissant",
                        "sSortDescending": ": activer pour trier la colonne par ordre décroissant"
                    },
                    "select": {
                        "rows": {
                        "_": "%d lignes sélectionnées",
                        "0": "Aucune ligne sélectionnée",
                        "1": "1 ligne sélectionnée"
                        }
                    }
                },
            });
        });
    </script>
@endsection
