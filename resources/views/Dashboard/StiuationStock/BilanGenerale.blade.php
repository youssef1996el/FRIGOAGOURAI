@extends('Dashboard.index')
@section('contentDashboard')

    <section>
        <h3 class="border p-2 bg-light rounded-2">Le bilan général</h3>
        <div class="noPrint">
            <form action="{{url('BilanByCompagnie')}}" method="get">
                <div class="row  mb-3">

                        <div class="col-sm-12 col-md-6 col-xl-6 ">
                            <label for="">Compagnie</label>
                            <select name="compagnie" id="" class="form-select">
                                @foreach ($Compagnie as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-12 col-md-6 col-xl-6 ">
                            <button class="btn btn-secondary mr-3 float-end mt-4" type="submit">Recherche</button>
                        </div>
                </div>
             </form>
        </div>

        <table class="table table-bordered" id="tableBilan" data-page-lenght="-1">
            <thead>
                <tr>
                    <th>Date</th>
                    <th style="background-color: rgb(248, 154, 154)">Sortie de caisses vides</th>
                    <th style="background-color: rgb(174, 245, 174)">Entré de marchandises</th>
                    <th style="background-color: rgb(114, 235, 205)">Sortie de marchandises</th>
                    <th style="background-color: rgb(247, 211, 211)">Retour de caisses vides</th>
                </tr>
            </thead>
            <tbody>
                @foreach($mergedData as $row)
                    <tr>
                        <td style="white-space: nowrap">{{ $row['date'] }}</td>
                        <td style="background-color: rgb(248, 154, 154)" >{{ intval($row['caisseVide'] )}}</td>
                        <td style="background-color: rgb(174, 245, 174)">{{ intval($row['totalEntree']) }}</td>
                        <td style="background-color: rgb(114, 235, 205)">{{ $row['totalSortie'] }}</td>
                        <td style="background-color: rgb(247, 211, 211)">{{ $row['caisseRetour'] }}</td>
                    </tr>
                @endforeach
                <tr>
                    <td>Totaux</td>
                    <td style="background-color: rgb(248, 154, 154)">{{ $totals['caisseVide'] }}</td>
                    <td style="background-color: rgb(174, 245, 174)">{{ $totals['totalEntree'] }}</td>
                    <td style="background-color: rgb(114, 235, 205)">{{ $totals['totalSortie'] }}</td>
                    <td style="background-color: rgb(247, 211, 211)">{{ $totals['caisseRetour'] }}</td>
                </tr>
            </tbody>
        </table>
        <p class="bg-light p-2 border mt-3">Caisse vide chez clients = <span class="fs-3">{{ $totals['caisseVide'] - $totals['caisseRetour'] }}</span> </p>
        <p class="bg-light p-2 border mt-2">Marchandises dans le frigo = <span class="fs-3">{{ $totals['totalEntree'] - $totals['totalSortie'] }}</span> </p>

    </section>
   <style>
    @media print {
            .noPrint  {
                display: none;
            }

            .dt-buttons
            {
                display: none;
            }
            .dataTables_filter
            {
                display: none;
            }
            .dataTables_info
            {
                display: none;
            }
            .pagination
            {
                display: none;
            }
        }
     .listStockage .five-menu-item {
            color: rgb(0, 202, 91);
            font-size: 19px;
            font-weight: bold;
        }
   </style>
    <script>
        $(document).ready(function ()
        {
            var currentPath = window.location.pathname;
            var pathSegments = currentPath.split('/');
            var lastSegment = pathSegments[pathSegments.length - 1];
            if(lastSegment === "bilanGeneral")
            {

                    $('.list-unstyled .listStockage > ul').css('display', 'block');

                    $('.list-unstyled li:has(span:contains("Situation de stockage"))').css({
                        'background-color': 'rgb(159 226 212)',
                        'box-shadow' :'5px 5px 10px #888888',
                        'border-top-right-radius': '10px',
                        'border-bottom-right-radius': '10px'
                    }).find('i[data-feather="users"]').addClass('text-white');


            }
            $('#tableBilan').DataTable({
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
