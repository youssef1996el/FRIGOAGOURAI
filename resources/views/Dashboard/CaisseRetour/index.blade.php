@extends('Dashboard.index')
@section('contentDashboard')
    <div class="row mt-2">
        <div class="col-md-6 float-start">
            <h4 class="m-0 text-dark text-muted">Retour de caisses vides</h4>
        </div>
        <div class="col-md-6">
            <ol class="breadcrumb float-end">
                <a href="#" class="btn btn-primary"  data-bs-toggle="modal" data-bs-target="#ModalCaisseEntree">Ajouter opération</a>
            </ol>
        </div>
        <div class="col-12" style="margin-bottom: 8px;display:flex">
            <span class="textReturn text-uppercase w-100"></span>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="Msg"></div>
        </div>
    </div>
    <div class="row ">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="content">
							<div class="head">
								<h5 class="mb-0">Liste opérations</h5>
								<p class="text-muted"></p>
							</div>
							<div class="canvas-wrapper">
								<table class="table table-striped" id="TableCaisseRetour" data-page-lenght="-1">
                                    <thead>
                                        <tr>
                                            <th>Nombre </th>
                                            <th>Client</th>
                                            <th>C.I.N (Livreur)</th>
                                            <th>Nom Livreur</th>
                                            <th>Matricule</th>
                                            <th>Créer par</th>
                                            <th>Créer le</th>
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
    <div class="modal fade" id="ModalCaisseEntree" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdrop" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Retour de Caisses vides </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card p-3">
                        <div class="form-group">
                            <div class="row">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th style="background:#d0d0ec">Client</th>
                                            <th style="background: #aaf5ae;">Nombre</th>
                                            <th style="background: #ffbe6a;">Livreur</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <select name="" id="" class="form-select client">
                                                    <option value="0">Veuillez sélectionner le client</option>
                                                    @foreach ($clients as $client)
                                                        <option value="{{$client->id}}">{{$client->nom.' '.$client->prenom}}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <input type="number" class="form-control nbboxADD">
                                            </td>
                                            <td>
                                                <select name="" id="DropDownChauffeur" class="form-select Livreur" >
                                                    <option value="0">veuillez sélectionner un Livreur</option>
                                                    @foreach ($chauffeurs as $item)
                                                        <option value="{{$item->name}}">{{$item->name}}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <input type="text" class="form-control cinChauffeur" hidden>
                                <input type="text" class="form-control Matricule" hidden>

                                {{--<div class="col-sm-12 col-md-6 col-xl-6">
                                    <label for="">Nombre </label>
                                    <input type="number" class="form-control nbboxADD">
                                    <div class="error"></div>

                                    <label for="">Client</label>
                                    <select name="" id="" class="form-select client">
                                        <option value="0">Veuillez sélectionner le client</option>
                                        @foreach ($clients as $client)
                                            <option value="{{$client->id}}">{{$client->nom.' '.$client->prenom}}</option>
                                        @endforeach
                                    </select>
                                    <div class="errorClient"></div>

                                    <label for="">C.I.N Livreur</label>
                                    <input type="text" class="form-control cinChauffeur" readonly>
                                    <div class="error"></div>
                                </div>
                                <div class="col-sm-12 col-md-6 col-xl-6">

                                    <label for="">Matricule</label>
                                    <input type="text" class="form-control Matricule" readonly>
                                    <div class="error"></div>
                                    <label for="">Livreur</label>
                                    <select name="" id="DropDownChauffeur" class="form-select Livreur" >
                                        <option value="0">veuillez sélectionner un Livreur</option>
                                        @foreach ($chauffeurs as $item)
                                            <option value="{{$item->name}}">{{$item->name}}</option>
                                        @endforeach
                                    </select>

                                    <div class="error"></div>
                                </div>--}}
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">

                    <button class="btn btn-primary" id="ValideBonEntreCaisse">Validé</button>
                </div>
            </div>
        </div>
    </div>
    {{-- Moal edit Caisse Entrée --}}
    <div class="modal fade" id="ModalCaisseEntreeEdit" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdrop" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel"> Retour de caisses vides</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card p-3">
                        <div class="form-group">
                            <div class="row">
                                <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="background:#d0d0ec">Client</th>
                                        <th style="background: #aaf5ae;">Nombre</th>
                                        <th style="background: #ffbe6a;">Livreur</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <select name="" id="" class="form-select clientEdit">
                                                <option value="0">Veuillez sélectionner le client</option>
                                                @foreach ($clients as $client)
                                                    <option value="{{$client->id}}">{{$client->nom.' '.$client->prenom}}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                           <input type="number" class="form-control nbboxADDEDit" id="nbboxEdit">
                                        </td>
                                        <td>
                                            <select name="" id="DropDownChauffeurEdit" class="form-select ChauffeurEdit">
                                                <option value="0">veuillez sélectionner un livreur</option>
                                                @foreach ($chauffeurs as $item)
                                                    <option value="{{$item->name}}">{{$item->name}}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                             <input type="text" class="form-control cinChauffeurEdit"  hidden>
                             <input type="text" class="form-control MatriculeEdit"  hidden>

                                {{--<div class="col-sm-12 col-md-6 col-xl-6">
                                    <label for="">Nombre </label>
                                    <input type="number" class="form-control nbboxADDEDit" id="nbboxEdit">
                                    <div class="error"></div>


                                    <label for="">Client</label>
                                    <select name="" id="" class="form-select clientEdit">
                                        <option value="0">Veuillez sélectionner le client</option>
                                        @foreach ($clients as $client)
                                            <option value="{{$client->id}}">{{$client->nom.' '.$client->prenom}}</option>
                                        @endforeach
                                    </select>
                                    <div class="errorClient"></div>
                                    <label for="">C.I.N</label>
                                    <input type="text" class="form-control cinChauffeurEdit"  readonly>
                                    <div class="error"></div>
                                </div>
                                <div class="col-sm-12 col-md-6 col-xl-6">

                                    <label for="">Matricule</label>
                                    <input type="text" class="form-control MatriculeEdit"  readonly>
                                    <div class="error"></div>
                                    <label for="">Livreur</label>
                                    <select name="" id="DropDownChauffeurEdit" class="form-select ChauffeurEdit">
                                        <option value="0">veuillez sélectionner un chauffeur</option>
                                        @foreach ($chauffeurs as $item)
                                            <option value="{{$item->name}}">{{$item->name}}</option>
                                        @endforeach
                                    </select>

                                    <div class="error"></div>

                                </div>--}}
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">

                    <button class="btn btn-primary" id="ValideBonEntreCaisseEdit">Modification</button>
                </div>
            </div>
        </div>
    </div>
     {{-- Modal Trash Caisse retour --}}
     <div class="modal fade" id="ModalTrashCaisseRetour" aria-labelledby="settingsModalTitle" aria-hidden="true" tabindex="-1">
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
                    <button class="btn btn-danger text-uppercase" id="TrashCaisseRetour">Supprimer</button>
                </div>
            </div>
        </div>
    </div>
    <style>
         .table-striped > tbody > tr:nth-of-type(odd) > * {
            text-align: center;
        }
        #TableCaisseRetour_filter
        {
            margin-bottom: 8px;
        }
         #TableCaisseRetour_filter
        {
            margin-bottom: 8px;
        }
        .error
        {
            color:red;
        }
        #TableCaisseRetour
        {
            border-radius: 5px 5px 0 0;
            overflow: hidden;
            box-shadow: 0 0 20px rgba(0,0,0,0.15);
        }
        #TableCaisseRetour > tbody > tr:nth-of-type(even) > * {
            text-align: center;
        }
        #TableCaisseRetour thead tr
        {
            background-color : #009879;
            color:#fff;
            text-align: center;
        }
        #TableCaisseRetour tbody tr:last-of-type
        {
            border-bottom: 2px solid #009879;
        }
        #TableCaisseRetour tbody td:nth-child(3)
        {
            text-align: left;
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
    </style>
    <script>
        $(document).ready(function () {


            var currentPath = window.location.pathname;
            var pathSegments = currentPath.split('/');
            var lastSegment = pathSegments[pathSegments.length - 1];
            if(lastSegment === "CaisseRetour")
            {
                $('.list-unstyled li:has(span:contains("Retour de caisses vides"))').css({
                    'background-color': 'rgb(159 226 212)',
                    'box-shadow' :'5px 5px 10px #888888',
                    'border-top-right-radius': '10px',
                    'border-bottom-right-radius': '10px'
                }).find('i[data-feather="users"]').addClass('text-white');
            }
            var dataTableInitialized = false;
            var selectedRow = null;
            GetCaisseRetour();

        function GetCaisseRetour()
        {
            $.ajax({
                type: "get",
                url: "{{url('getCaisseRetour')}}",
                dataType: "json",
                success: function (response)
                {
                    if(response.status == 200)
                    {
                        if (!dataTableInitialized)
                        {
                            dataTableInitialized = true;
                            var dataTable = $('#TableCaisseRetour').DataTable({
                                dom: 'Bfrtip',
                                buttons: [
                                        {
                                            extend: 'print',
                                            text: 'Imprimer'
                                        }
                                    ],
                                    paging: false,
                                "pageLength": -1,
                                "ordering": false,
                                "lengthMenu": false,
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
                            var dataTable = $('#TableMerchandiseSortie').DataTable(); // Get the existing DataTable instance
                            dataTable.clear().draw();
                        }
                        dataTable.clear();
                        var icon = '';
                        $.each(response.data, function (index, value)
                        {

                            if(value.cloturer == 1 && response.Role == "user" )
                            {
                                console.log(response.data);
                                icon = '<a href="#" class="fa-solid fa-circle-check text-info fs-5 "  value='+value.id+' title="bon est clôturer"></a>\
                                        '
                            }
                            else
                            {
                                if(value.cloturer == 1 && response.Role !="user")
                                {
                                    icon ='<a href="#" class="fa-solid fa-trash text-warning fs-5 IconTrashCaisseEntree" value='+value.id+' title="Supprimer cette bon sortie"></a>\
                                            <a href="#" class="fa-solid fa-file-pdf text-danger fs-5 IconPrintCaisseRetour target="_blank" value='+value.id+' title="Imprimer cette bon sortie"></a>\
                                            <a href="#" class="fa-solid fa-circle-check text-info fs-5 " value='+value.id+' title="bon est clôturer"></a>'
                                }
                                else
                                {
                                    icon ='<a href="#" class="fa-solid fa-trash text-warning fs-5 IconTrashCaisseEntree" value='+value.id+' title="Supprimer cette bon sortie"></a>\
                                            <a href="#" class="fa-solid fa-file-pdf text-danger fs-5 IconPrintCaisseRetour target="_blank" value='+value.id+' title="Imprimer cette bon sortie"></a>'
                                }

                            }
                            dataTable.row.add([
                                parseInt(value.nbbox),
                                value.client,
                                value.cin,
                                value.chauffeur,
                                value.matricule,
                                value.name,
                                value.created_at,
                                icon
                                /* '<a href="#" class="fa-solid fa-pen-to-square text-success fs-5 mr-5 IconEditCaisseEntree" value='+value.id+' title="Modifier cette bon sortie"></a>\
                                 <a href="#" class="fa-solid fa-trash text-warning fs-5 IconTrashCaisseEntree" value='+value.id+' title="Supprimer cette bon sortie"></a>\
                                 <a href="#" class="fa-solid fa-file-pdf text-danger fs-5 IconPrintCaisseRetour target="_blank" value='+value.id+' title="Imprimer cette bon sortie"></a>' */
                            ]);
                            dataTable.draw();
                        });

                    }
                }
            });
        }
        $(document).on('click','.IconPrintCaisseRetour',function()
        {
            var idbonCaisseRetour = $(this).attr('value');
            window.open("{{url('ExtractBonCaisseRetour')}}/"+idbonCaisseRetour,"_blank");
            location.reload();
        });
        $('#ValideBonEntreCaisse').on('click',function()
        {
            if($('.nbboxADD').val() == '')
            {
                Swal.fire({
                  icon: "error",
                  title: "Oops...",
                  text: "Nombre retour ne peux pas être vide!",
                });
                return false;
            }
            if($('.Livreur').val() == 0)
            {
                Swal.fire({
                  icon: "error",
                  title: "Oops...",
                  text: "Livreur ne peux pas être vide",
                });
                return false;
            }
            if($('.client').val() == 0)
            {
               Swal.fire({
                  icon: "error",
                  title: "Oops...",
                  text: "Client ne peux pas être vide",
                });
                return false;
            }

            $.ajax({
                type: "post",
                url: "{{url('StoreCaisseRetour')}}",
                data:
                {
                    "_token"    : "{{ csrf_token() }}",
                    nbbox       : $('.nbboxADD').val(),
                    matricule   : $('.Matricule').val(),
                    client      : $('.client').val(),
                    chauffeur   : $('.Livreur').val(),
                    cin         : $('.cinChauffeur').val(),
                },
                dataType: "json",
                success: function (response) {
                    if(response.status == 200)
                    {
                        $('#ModalCaisseEntree').modal("hide");
                        GetCaisseRetour();
                        $('.nbboxADD').val("");
                        $('.Matricule').val("");

                        $('.Chauffeur').val("");
                        $('.Msg').addClass('alert alert-success').text('ajouter avec succès').delay(6000).fadeOut("slow");
                        setTimeout(function() {
                            // Reload the page
                            location.reload();
                        }, 1000);
                    }
                }
            });

                /*var fields = ['.nbboxADD','.Matricule','.Chauffeur','.cinChauffeur'];

                var hasError = false;
                $('.error').text('');
                fields.forEach(function(field, index) {
                    var value = $(field).val();
                    var errorMessage = '';

                    switch (index) {
                        case 0:
                            errorMessage = 'nombre bon retour ne peux pas être vide';
                            break;
                        case 1:
                            errorMessage = 'Matricule ne peux pas être vide';
                            break;
                        case 2:
                            errorMessage = 'Chauffeur ne peux pas être vide';
                            break;
                            case 3:
                            errorMessage = 'C.I.N Chauffeur ne peux pas être vide';
                            break;

                    }

                    if (value === '')
                    {
                        $('#ModalCaisseEntree').find('.error').eq(index).text(errorMessage);
                        hasError = true;
                    }
                });
                if($('.client').val() == 0)
                {
                    $('.errorClient').text('veuillez sélectionner le client').css('color','red');
                    return 0;
                }
                if(!hasError)
                {
                    $.ajax({
                        type: "post",
                        url: "{{url('StoreCaisseRetour')}}",
                        data:
                        {
                            "_token"    : "{{ csrf_token() }}",
                            nbbox : $('.nbboxADD').val(),
                            matricule : $('.Matricule').val(),
                            client : $('.client').val(),
                            chauffeur : $('.Chauffeur').val(),
                            cin   : $('.cinChauffeur').val(),
                        },
                        dataType: "json",
                        success: function (response) {
                            if(response.status == 200)
                            {
                                $('#ModalCaisseEntree').modal("hide");
                                GetCaisseRetour();
                                $('.nbboxADD').val("");
                                $('.Matricule').val("");

                                $('.Chauffeur').val("");
                                $('.Msg').addClass('alert alert-success').text('ajouter avec succès').delay(6000).fadeOut("slow");
                                setTimeout(function() {
                                    // Reload the page
                                    location.reload();
                                }, 1000);
                            }
                        }
                    });
                }*/
            });
            var idCaisseRetour = 0;
            $(document).on('click','.IconEditCaisseEntree',function()
            {
                idCaisseRetour = $(this).attr('value');

                $.ajax({
                    type: "get",
                    url: "{{url('getDataById')}}",
                    data:
                    {
                        id: $(this).attr('value'),
                    },
                    dataType: "json",
                    success: function (response)
                    {
                        if(response.status == 200)
                        {
                            $('#ModalCaisseEntreeEdit').modal("show");
                                $('.nbboxADDEDit').val(response.data.nbbox);
                                $('.MatriculeEdit').val(response.data.matricule);
                                $('.clientEdit').val(response.data.idclient).change();
                                $('.ChauffeurEdit').val(response.data.chauffeur);
                                $('.cinChauffeurEdit').val(response.data.cin);

                        }
                    }
                });
            });
            $('#ValideBonEntreCaisseEdit').on('click',function()
            {

                if($('.nbboxADDEdit').val() == '')
                {
                    Swal.fire({
                      icon: "error",
                      title: "Oops...",
                      text: "Nombre retour ne peux pas être vide!",
                    });
                    return false;
                }
                if($('.ChauffeurEdit').val() == 0)
                {
                    Swal.fire({
                      icon: "error",
                      title: "Oops...",
                      text: "livreur ne peux pas être vide",
                    });
                    return false;
                }
                if($('.ChauffeurEdit').val() == null)
                {
                    Swal.fire({
                      icon: "error",
                      title: "Oops...",
                      text: "livreur ne peux pas être vide",
                    });
                    return false;
                }
                if($('.clientEdit').val() == 0)
                {
                   Swal.fire({
                      icon: "error",
                      title: "Oops...",
                      text: "Client ne peux pas être vide",
                    });
                    return false;
                }
                $.ajax({
                    type: "post",
                    url: "{{url('EditCaisseRetour')}}",
                    data:
                    {
                        "_token"    : "{{ csrf_token() }}",
                        nbboxEdit : $('#nbboxEdit').val(),
                        matricule : $('.MatriculeEdit').val(),
                        client : $('.clientEdit').val(),
                        chauffeur : $('.ChauffeurEdit').val(),
                        id :idCaisseRetour,
                        cin     : $('.cinChauffeurEdit').val(),
                    },
                    dataType: "json",
                    success: function (response) {
                        if(response.status == 200)
                        {
                            location.reload();
                        }
                    }
                });


            });
            $(document).on('click','.IconTrashCaisseEntree',function()
            {
                idCaisseRetour = $(this).attr('value');
                $('#ModalTrashCaisseRetour').modal('show');
            });

            $('#TrashCaisseRetour').on('click',function()
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
                        url: "{{url('TrashCaisseRetour')}}",
                        data:
                        {
                            "_token"    : "{{ csrf_token() }}",
                            id : idCaisseRetour,
                        },
                        dataType: "json",
                        success: function (response)
                        {
                            if(response.status == 200)
                            {
                                location.reload();
                            }
                        }
                    });
                }
            });
            /* $('.client').on('change',function()
            {
                $.ajax({
                    type: "get",
                    url: "{{url('getChauffeurByClient')}}",
                    data:
                    {
                        id : $(this).val(),
                    },
                    dataType: "json",
                    success: function (response) {
                        if(response.status == 200)
                        {
                            $("#DropDownChauffeur").empty();
                            $('.cinChauffeur').val("");
                                $('.Matricule').val("");
                                $.each(response.data, function (index, value) {
                                    $("#DropDownChauffeur").append('<option value="0">veuillez sélectionner un chauffeur</option>' +
                                                                    '<option value="' + value.name + '">' + value.name + '</option>');
                                });


                        }
                    }
                });
            }); */

            $('#DropDownChauffeur').on('change',function()
            {
                if($(this).val()  != 0)
                {
                    $.ajax({
                        type: "get",
                        url: "{{url('getAttrChauffeur')}}",
                        data:
                        {
                            name : $(this).val(),
                        },
                        dataType: "json",
                        success: function (response)
                        {
                            if(response.status == 200)
                            {
                                $('.cinChauffeur').val(response.data.cin);
                                $('.Matricule').val(response.data.matricule);
                            }
                        }
                    });
                }
            });

            /* $('.clientEdit').on('change',function()
            {
                $.ajax({
                    type: "get",
                    url: "{{url('getChauffeurByClient')}}",
                    data:
                    {
                        id : $(this).val(),
                    },
                    dataType: "json",
                    success: function (response) {
                        if(response.status == 200)
                        {
                            $("#DropDownChauffeurEdit").empty();
                            $('.cinChauffeurEdit').val("");
                                $('.MatriculeEdit').val("");
                                $.each(response.data, function (index, value) {
                                    $("#DropDownChauffeurEdit").append('<option value="0">veuillez sélectionner un chauffeur</option>' +
                                                                    '<option value="' + value.name + '">' + value.name + '</option>');
                                });


                        }
                    }
                });
            }); */

            $('#DropDownChauffeurEdit').on('change',function()
            {
                if($(this).val()  != 0)
                {
                    $.ajax({
                        type: "get",
                        url: "{{url('getAttrChauffeur')}}",
                        data:
                        {
                            name : $(this).val(),
                        },
                        dataType: "json",
                        success: function (response)
                        {
                            if(response.status == 200)
                            {
                                $('.cinChauffeurEdit').val(response.data.cin);
                                $('.MatriculeEdit').val(response.data.matricule);
                            }
                        }
                    });
                }
            });

        });
    </script>
@endsection
