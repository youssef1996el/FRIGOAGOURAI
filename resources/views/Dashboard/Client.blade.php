@extends('Dashboard.index')
@section('contentDashboard')
    <div class="row mt-2">
		<div class="col-md-6 float-start">
			<h4 class="m-0 text-dark text-muted">Clients</h4>
		</div>
		<div class="col-md-6">
			<ol class="breadcrumb float-end">
				<a href="#" class="btn btn-primary"  data-bs-toggle="modal" data-bs-target="#ModalClient">Ajoute Client</a>
				{{-- <a href="#" class="btn btn-primary"  data-bs-toggle="modal" data-bs-target="#ModalInformationClient">test</a> --}}
			</ol>
		</div>
        <div class="col-12" style="margin-bottom: 8px;display:flex">
            <span class="textReturn text-uppercase w-100"></span>
        </div>
	</div>








    <div class="row ">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="content">
							<div class="head">
								<h5 class="mb-0">Liste clients</h5>
								<p class="text-muted"></p>
							</div>
							<div class="canvas-wrapper">
								<table class="table table-striped" id="TableClientDashboardAdmin" data-page-lenght="-1">
                                    <thead>
                                        <tr>
                                            <th>Nom</th>
                                            <th>Prénom</th>
                                            <th>CIN</th>
                                            <th>Adresse</th>
                                            <th>Téléphone</th>
                                            {{-- <th>Caisse Sortie</th>
                                            <th>Caisse Entrée</th>

                                            <th>Le reste</th> --}}
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
							</div>
							<div class="ui hidden divider"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>



{{-- Modal Information Client --}}
    {{-- <div class="modal fade" id="ModalInformationClient" aria-labelledby="settingsModalTitle" aria-hidden="true" tabindex="-1">
        <div class="modal-dialog modal-dialog-settings modal-xl">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title text-uppercase" id="exampleModalLabel">Ajoute Client</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">



                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Date</th>
                                @foreach($clientNamesX as $clientName)
                                    <th colspan="2" style="text-align: center">{{ ucfirst($clientName) }}</th>
                                @endforeach
                                <th>total</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($datesX as $date)
                            <tr>
                                <td>{{ $date }}</td>
                                @foreach($clientNamesX as $clientName)
                                    @php
                                        $index = array_search($date, $groupData[$clientName]['dates']);
                                        $entree = ($index !== false && isset($groupData[$clientName]['entree'][$index])) ? $groupData[$clientName]['entree'][$index] : '0.00';
                                        $sortie = ($index !== false && isset($groupData[$clientName]['sortie'][$index])) ? $groupData[$clientName]['sortie'][$index] : '0.00';
                                    @endphp
                                    <td>
                                        <span>Entree <br></span>
                                        {{ $entree }}
                                    </td>
                                    <td>
                                        <span>Sortie <br></span>
                                        {{ $sortie }}</td>
                                @endforeach
                                @php
                                    $totalForRow = 0;
                                    foreach ($clientNamesX as $clientName) {
                                        $index = array_search($date, $groupData[$clientName]['dates']);
                                        $totalForRow += ($index !== false && isset($groupData[$clientName]['total'][$index])) ? floatval($groupData[$clientName]['total'][$index]) : 0;
                                    }
                                @endphp
                               @php
                                    $totalForRow = 0;
                                    foreach ($clientNamesX as $clientName) {
                                        $index = array_search($date, $groupData[$clientName]['dates']);
                                        $totalForRow += ($index !== false && isset($groupData[$clientName]['total'][$index]))
                                            ? floatval(str_replace(',', '', $groupData[$clientName]['total'][$index]))
                                            : 0;
                                    }
                                @endphp
                                <td>{{number_format($totalForRow,2,',',' ')}}</td>
                            </tr>
                        @endforeach
                        </tbody>

                        </tbody>
                    </table>



                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary text-uppercase" >enregistrer</button>
                </div>
            </div>
        </div>
    </div> --}}
    {{-- Modal Add Client --}}
    <div class="modal fade" id="ModalClient" aria-labelledby="settingsModalTitle" aria-hidden="true" tabindex="-1">
        <div class="modal-dialog modal-dialog-settings modal-xl">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title text-uppercase" id="exampleModalLabel">Ajoute Client</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-6">
                                <label for="">Nom :</label>
                                <input type="text" class="form-control" id="nomClient" placeholder="Nom">
                                <div class="error"></div>
                                <label for="">Adresse :</label>
                                <input type="text" class="form-control" id="addressClient" placeholder="Adresse">
                                <div class="error"></div>
                                <label for="">Cin :</label>
                                <input type="text" class="form-control" id="cinClient" placeholder="C.I.N">
                                <div class="error"></div>
                            </div>
                            <div class="col-6">
                                <label for="">Prénom :</label>
                                <input type="text" class="form-control" id="prenomClient" placeholder="Prénom">
                                <div class="error"></div>
                                <label for="">Téléphone :</label>
                                <input type="text" class="form-control" id="phoneClient" placeholder="Téléphone">
                                <div class="error"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary text-uppercase" id="AddClientDashBoard">enregistrer</button>
                </div>
            </div>
        </div>
    </div>
    {{-- Modal Edit Client --}}
    <div class="modal fade" id="ModalEditClient" aria-labelledby="settingsModalTitle" aria-hidden="true" tabindex="-1">
        <div class="modal-dialog modal-dialog-settings modal-xl">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title text-uppercase" id="exampleModalLabel">Modification Client</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-6">
                                <label for="">Nom :</label>
                                <input type="text" class="form-control nomClient" id="nomClient" placeholder="Nom">
                                <div class="error"></div>
                                <label for="">Adresse :</label>
                                <input type="text" class="form-control addressClient" id="addressClient" placeholder="Adresse">
                                <div class="error"></div>
                                <label for="">C.I.N</label>
                                <input type="text" class="form-control cinClient" id="cinClient" placeholder="C.I.N">
                                <div class="error"></div>
                            </div>
                            <div class="col-6">
                                <label for="">Prénom :</label>
                                <input type="text" class="form-control prenomClient" id="prenomClient" placeholder="Prénom">
                                <div class="error"></div>
                                <label for="">Téléphone :</label>
                                <input type="text" class="form-control phoneClient" id="phoneClient" placeholder="Téléphone">
                                <div class="error"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-success text-uppercase" id="EditClientDashBoard">Modification</button>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Trash Client --}}
    <div class="modal fade" id="ModalTrashClient" aria-labelledby="settingsModalTitle" aria-hidden="true" tabindex="-1">
        <div class="modal-dialog modal-dialog-settings ">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title text-uppercase" id="exampleModalLabel">Supprimer Client</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">

                        <input type="checkbox" name="" id="approveDelete">
                        <label for="">Êtes-vous sûr de vouloir supprimer ce client</label>

                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger text-uppercase" id="TrashClientDashBoard">Supprimer</button>
                </div>
            </div>
        </div>
    </div>

    <style>
        #TableClientDashboardAdmin_filter
        {

            margin-bottom: 8px;
        }
        .error
        {
            color:red;
        }
        #TableClientDashboardAdmin
        {
            border-radius: 5px 5px 0 0;
            overflow: hidden;
            box-shadow: 0 0 20px rgba(0,0,0,0.15);
        }
        #TableClientDashboardAdmin thead tr
        {
            background-color : #009879;
            color:#fff;
            text-align: left;
        }
        #TableClientDashboardAdmin tbody tr:last-of-type
        {
            border-bottom: 2px solid #009879;
        }

        .table-striped > tbody > tr:nth-of-type(odd) > *
        {
            font-weight: bold;
            color: #009879 !important;
        }
        .page-item.active .page-link {
            background-color: #009879;
            border-color: #009879;
            border-radius: 20px;
        }
        /**************** */
        .div.dt-buttons
        {
            float: right;
        }


    </style>
    {{-- <script>
        $(document).ready(function () {
            $('#TableInformationClient').DataTable({

                "columns":
                [

                    null,
                    @for($i = 0; $i < count(reset($groupedData)); $i++)
                        { "width": "10%" }, { "width": "10%" },
                    @endfor
                    { "width": "10%" }, { "width": "10%" }
                ],
                dom: 'Bfrtip',
                "buttons": [
                    'copy', 'excel', 'pdf', 'print'
                ],
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
    </script> --}}
    <script>
        $(document).ready(function ()
        {





            $('#TableCaisseVide ,#TableCaisseRetour, #TableMarchandiseEntree ,#TableMarchandiseSortie').DataTable({


                "ordering": false,

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
            $('#loading').css('display', 'none');
            var currentPath = window.location.pathname;
            var pathSegments = currentPath.split('/');
            var lastSegment = pathSegments[pathSegments.length - 1];
            if(lastSegment === "ClientSidebar")
            {
                $('.list-unstyled li:has(span:contains("Client"))').css({
                    'background-color': 'rgb(159 226 212)',
                    'box-shadow' :'5px 5px 10px #888888',
                    'border-top-right-radius': '10px',
                    'border-bottom-right-radius': '10px'
                }).find('i[data-feather="users"]').addClass('text-white');
            }
            var dataTableInitialized = false;
            var selectedRow = null;
            GetClientDashboard();

            function GetClientDashboard()
            {
                $.ajax({
                    type: "get",
                    url: "{{url('GetClientDashboard')}}",
                    dataType: "json",
                    success: function (response)
                    {
                        if(response.status == 200)
                        {
                            if (!dataTableInitialized)
                            {
                                dataTableInitialized = true;
                                var dataTable = $('#TableClientDashboardAdmin').DataTable({

                                    "order": [[0, 'asc']],
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
                            }
                            else
                            {
                                var dataTable = $('#TableClientDashboardAdmin').DataTable(); // Get the existing DataTable instance
                                dataTable.clear().draw();
                            }
                            dataTable.clear();

                            $.each(response.clients, function (index, value)
                            {

                                dataTable.row.add([
                                    value.nom,
                                    value.prenom,
                                    value.cin,
                                    value.address,
                                    value.phone,
                                   /*  value.totalSortie,
                                    value.totalEntree,

                                    value.reste, */
                                    '<a href="#" class="fa-solid fa-pen-to-square text-success mr-5 IconEditClient" value='+value.id+' title="Modifier cette client"></a>\
                                     <a href="#" class="fa-solid fa-trash text-danger IconTrashClient" value='+value.id+' title="Supprimer cette client"></a>\
                                     <a href="#" class="fa-regular fa-file text-info IconFicheClient" target="_blank" value='+value.id+' title="fiche client "></a>\
                                     <!--<div class="dropdown dropdownAction" style="display: inline-block;position:static">\
                                        <a class="btn btn-secondary " type="button" data-bs-toggle="dropdown" aria-expanded="false" style="background-color:none !imporante;border-color:none !imporante">\
                                            +\
                                        </a>\
                                        <ul class="dropdown-menu">\
                                            <li><a class="dropdown-item LinkExportCaisseVide" href="#" value='+value.id+'>Exporter Caisse Vide</a></li>\
                                            <li><a class="dropdown-item LinkExportMarchandiseEntree" href="#" value='+value.id+'>Exporter Marchandise Entrée</a></li>\
                                            <li><a class="dropdown-item LinkExportMarchandiseSortie" href="#" value='+value.id+'>Exporter Marchandise Sortie</a></li>\
                                            <li><a class="dropdown-item LinkExportCaisseRetour" href="#" value='+value.id+'>Exporter Caisse Retour</a></li>\
                                        </ul>\
                                    </div>-->'
                                ]);
                                dataTable.draw();
                            });
                           /*  $('.number').text(response.NumberClient);
                            $('.numberCaisseSortie').text(response.Sorite);
                            $('.numberCaisseEntree').text(response.Entree); */

                        }
                    }
                });
            }
            $(document).on('click', '.LinkExportCaisseVide', function() {
                window.location.href = "{{ url('exportDataCaisseVide') }}" + '/' + $(this).attr('value');
            });

            $(document).on('click', '.LinkExportMarchandiseEntree', function() {
                window.location.href = "{{ url('exportDataMarchandiseEntree') }}" + '/' + $(this).attr('value');
            });

            $(document).on('click', '.LinkExportMarchandiseSortie', function() {
                window.location.href = "{{ url('exportDataMarchandiseSortie') }}" + '/' + $(this).attr('value');
            });

            $(document).on('click','.IconFicheClient',function()
            {
                window.location.href = "{{ url('FicheClient') }}" + '/' + $(this).attr('value');
            });

            $(document).on('click', '.LinkExportCaisseRetour', function() {
                window.location.href = "{{ url('exportDataCaisseRetour') }}" + '/' + $(this).attr('value');
            });

            var idclient ='';
            $(document).on('click','.IconEditClient',function()
            {
                var nom = $(this).closest('tr').find('td:eq(0)').text();
                var prenom= $(this).closest('tr').find('td:eq(1)').text();
                var cin= $(this).closest('tr').find('td:eq(2)').text();
                var address = $(this).closest('tr').find('td:eq(3)').text();
                var phone   = $(this).closest('tr').find('td:eq(4)').text();
                $('.nomClient').val(nom);
                $('.prenomClient').val(prenom);
                $('.addressClient').val(address);
                $('.phoneClient').val(phone);
                $('.cinClient').val(cin);
                idclient = $(this).attr('value');
                $('#ModalEditClient').modal('show');
            });
            $(document).on('click','.IconTrashClient',function()
            {
                idclient = $(this).attr('value');
                $('#ModalTrashClient').modal('show');
            });
            $('#TrashClientDashBoard').on('click',function()
            {
                if(!$('#approveDelete').is(':checked'))
                {
                    Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: "veuillez approuver cette opération!",
                    });
                    return 0;
                }
                else
                {
                    $.ajax({
                        type: "post",
                        url: "{{url('TrashClientDashboard')}}",
                        data:
                        {
                            "_token"    : "{{ csrf_token() }}",
                            id : idclient,
                        },
                        dataType: "json",
                        success: function (response)
                        {
                            if(response.status == 200)
                            {
                                $('#ModalTrashClient').modal('hide');
                                $('.textReturn').addClass('alert alert-danger').text('Supprimé avec succès').delay(4000).fadeOut('slow');
                                GetClientDashboard();
                            }
                        }
                    });
                }
            });
            $('#EditClientDashBoard').on('click',function()
            {
                var fields = ['.nomClient', '.prenomClient', '.addressClient', '.phoneClient','.cinClient'];

                var hasError = false;
                $('.error').text('');
                fields.forEach(function(field, index) {
                    var value = $(field).val().trim();
                    var errorMessage = '';

                    switch (index) {
                        case 0:
                            errorMessage = 'Nom ne peux pas être vide';
                            break;
                        case 1:
                            errorMessage = 'Prénom ne peux pas être vide';
                            break;
                        case 2:
                            errorMessage = 'Adresse ne peux pas être vide';
                            break;
                        case 3:
                            errorMessage = 'Téléphone ne peux pas être vide';
                            break;
                            case 4:
                            errorMessage = 'C.I.N ne peux pas être vide';
                            break;
                    }

                    if (value === '')
                    {
                        $('#ModalEditClient').find('.error').eq(index).text(errorMessage);
                        hasError = true;
                    }
                });

                if(!hasError)
                {
                    $.ajax({
                        type: "post",
                        url: "{{url('EditClientDashboard')}}",
                        data:
                        {
                            "_token"    : "{{ csrf_token() }}",
                            nom         : $('.nomClient').val(),
                            prenom      : $('.prenomClient').val(),
                            address     : $('.addressClient').val(),
                            phone       : $('.phoneClient').val(),
                            id          : idclient,
                            cin         : $('.cinClient').val(),
                        },
                        dataType: "json",
                        success: function (response)
                        {
                            if(response.status == 200)
                            {
                                $('#ModalEditClient').modal('hide');
                                $('.textReturn').addClass('alert alert-success').text('mettre à jour avec succès').delay(4000).fadeOut('slow');
                                GetClientDashboard();
                            }
                        }
                    });
                }
            });


            $('#AddClientDashBoard').on('click', function() {
                var fields = ['#nomClient', '#prenomClient', '#addressClient', '#phoneClient','#cinClient'];
                var hasError = false;

                $('.error').text('');

                fields.forEach(function(field, index) {
                    var value = $(field).val().trim();
                    var errorMessage = '';

                    switch (index) {
                        case 0:
                            errorMessage = 'Le nom ne peut pas être vide';
                            break;
                        case 1:
                            errorMessage = 'Prénom ne peut pas être vide';
                            break;
                        case 2:
                            errorMessage = 'Adresse ne peut pas être vide';
                            break;
                        case 3:
                            errorMessage = 'Téléphone ne peut pas être vide';
                            break;
                            case 4:
                            errorMessage = 'C.I.N ne peut pas être vide';
                            break;
                    }

                    if (value === '') {
                        $('.error').eq(index).text(errorMessage);
                        hasError = true;
                    }
                });

                if (!hasError)
                {
                    $.ajax({
                        type: "post",
                        url: "{{url('StoreClientDashboard')}}",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: {
                            "_token": "{{ csrf_token() }}",
                            nom: $('#nomClient').val(),
                            prenom: $('#prenomClient').val(),
                            address: $('#addressClient').val(),
                            phone: $('#phoneClient').val(),
                            cin   : $('#cinClient').val(),
                        },
                        dataType: "json",
                        success: function(response)
                        {
                            if(response.status == 200)
                            {
                                $('#ModalClient').modal('hide');
                                $('.textReturn').addClass('alert alert-success').text('ajouter avec succès').delay(4000).fadeOut('slow');

                                GetClientDashboard();
                            }
                        }
                    });
                }
            });



        });
    </script>

@endsection

