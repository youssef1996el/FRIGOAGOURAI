@extends("Dashboard.index")
@section('contentDashboard')
    <div class="row mt-2">
        <div class="col-md-6 float-start">
            <h4 class="m-0 text-dark text-muted">Sortie de caisses vides</h4>
        </div>
        <div class="col-md-6">
            <ol class="breadcrumb float-end">
                <a href="#" class="btn btn-primary"  data-bs-toggle="modal" data-bs-target="#ModalMerchandiseSortie">Ajouter opération</a>
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
                                <h5 class="mb-0">Liste opérations</h5>
                                <p class="text-muted"></p>
                            </div>
                            <div class="canvas-wrapper">
                                <table class="table table-striped" id="TableMerchandiseSortie" data-page-lenght="-1">
                                    <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Cin (livreur)</th>
                                            <th>Matricule</th>
                                            <th>Nom livreur</th>
                                            <th>Client</th>
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

    <div class="row">
        <div class="col-sm-6 col-md-6 col-lg-6">
           {{--  <div class="card card-rounded">
                <div class="content">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="icon-big text-center">

                                    <img src="{{'public/images/no_retour.png'}}" alt="" srcset="" width="60px">

                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="detail">
                                <p class="detail-subtitle">Nombre de bon sortie</p>
                                <span class="numberbonSortie"></span>
                            </div>
                        </div>
                    </div>

                </div>
            </div> --}}
        </div>
        <div class="col-sm-6 col-md-6 col-lg-6">
            {{-- <div class="card card-rounded">
                <div class="content">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="icon-big text-center">

                                    <img src="{{'public/images/is_retour.png'}}" alt="" srcset="" width="60px">

                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="detail">
                                <p class="detail-subtitle" style="font-size: 17px;white-space: nowrap">Nombre de bons est le retour du client</p>
                                <span class="NBSortieIsRetour"></span>
                            </div>
                        </div>
                    </div>

                </div>
            </div> --}}
        </div>
    </div>
    {{-- Modal Add Caisse Sortie --}}
    <div class="modal fade" id="ModalMerchandiseSortie" aria-labelledby="settingsModalTitle" aria-hidden="true" tabindex="-1">
        <div class="modal-dialog modal-dialog-settings modal-xl">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title " id="exampleModalLabel">Ajouter Bon de Sortie</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
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
                                            <select  class="form-select client">
                                                <option value="0">veuillez sélectionner le client</option>
                                                @foreach ($clients as $client)
                                                    <option value="{{$client->id}}">{{ $client->nom . ' ' . $client->prenom }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control nbbox"  placeholder="Nombre ">
                                        </td>
                                        <td>
                                            <select name="" id="DropDownChauffeur" class="form-select chauffeur">
                                                <option value="0">veuillez sélectionner un livreur</option>
                                                @foreach ($Chauffeur as $item)
                                                    <option value="{{$item->name}}">{{$item->name}}</option>
                                                @endforeach

                                            </select>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <input type="text" class="form-control matricule" placeholder="matricule" hidden>
                            <input type="text" class="form-control cinChauffeur" placeholder="C.I.N (livreur)" hidden>

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary text-uppercase" id="AddMarchandiseSortie">enregistrer</button>
                </div>
            </div>
        </div>
    </div>
    {{-- Modal Edit Caisse Sortie --}}
    <div class="modal fade" id="ModalEditMarchandisSortie" aria-labelledby="settingsModalTitle" aria-hidden="true" tabindex="-1">
        <div class="modal-dialog modal-dialog-settings modal-xl">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title text-uppercase" id="exampleModalLabel">Modification bon Sortie</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
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
                                            <select class="form-select EditClient" disabled>
                                                @foreach ($clients as $client)
                                                    <option value="{{$client->id}}">{{$client->nom.' '.$client->prenom}}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control EditNombreSorite" placeholder="Nombre Sorite">
                                        </td>
                                        <td>
                                            <select name="" id="DropDownChauffeurEdit" class="form-select EditChauffeur">
                                                <option value="0">veuillez sélectionner un chauffeur</option>

                                                @foreach ($Chauffeur as $item)
                                                    <option value="{{$item->name}}">{{$item->name}}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <input type="text" class="form-control EditCIN" placeholder="C.I.N" hidden>
                            <input type="text" class="form-control EditMAtriculeSortie" placeholder="Matricule" hidden>

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-success text-uppercase" id="EditBonSortie">Modification</button>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Trash Caisse Sortie --}}
    <div class="modal fade" id="ModalTrashMSortie" aria-labelledby="settingsModalTitle" aria-hidden="true" tabindex="-1">
        <div class="modal-dialog modal-dialog-settings ">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title text-uppercase" id="exampleModalLabel">Supprimer Bon Sortie</h5>
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
                    <button class="btn btn-danger text-uppercase" id="TrashBonSortie">Supprimer</button>
                </div>
            </div>
        </div>
    </div>

    <style>
        #TableMerchandiseSortie_filter
        {
            margin-bottom: 8px;
        }
        .error
        {
            color:red;
        }
        #TableMerchandiseSortie
        {
            border-radius: 5px 5px 0 0;
            overflow: hidden;
            box-shadow: 0 0 20px rgba(0,0,0,0.15);
        }
        #TableMerchandiseSortie thead tr
        {
            background-color : #009879;
            color:#fff;
            text-align: left;
        }
        #TableMerchandiseSortie tbody tr:last-of-type
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

        .mylink
        {
            color: gray;
            pointer-events: none; /* Disable mouse events on the element */
            text-decoration: none;
        }
    </style>


<script>
    $(document).ready(function ()
    {
        var currentPath = window.location.pathname;
        var pathSegments = currentPath.split('/');
        var lastSegment = pathSegments[pathSegments.length - 1];
        if(lastSegment === "MarchSortie")
        {
            $('.list-unstyled li:has(span:contains("Sortie de caisses vides"))').css({
                'background-color': 'rgb(159 226 212)',
                'box-shadow' :'5px 5px 10px #888888',
                'border-top-right-radius': '10px',
                'border-bottom-right-radius': '10px'
            }).find('i[data-feather="users"]').addClass('text-white');
        }
        var dataTableInitialized = false;
        var selectedRow = null;
        GetMarchSoriteDashboard();

        function GetMarchSoriteDashboard()
        {
            $.ajax({
                type: "get",
                url: "{{url('GetMarchSorite')}}",
                dataType: "json",
                success: function (response)
                {
                    if(response.status == 200)
                    {
                        if (!dataTableInitialized)
                        {
                            dataTableInitialized = true;
                            var dataTable = $('#TableMerchandiseSortie').DataTable({
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
                                icon = '<a href="#" class="fa-solid fa-circle-check text-info fs-5 "  value='+value.id+' title="bon est clôturer"></a>\
                                        '
                            }
                            else
                            {
                                /* mylink */
                                if(value.cloturer == 1 && response.Role !="user")
                                {
                                    icon ='<a href="#"  class="fa-solid fa-trash text-warning fs-5 IconTrashMSortie " value='+value.id+' title="Supprimer cette bon sortie" ></a>\
                                            <a href="#" class="fa-solid fa-file-pdf text-danger fs-5 IconPrintMSortie" target="_blank" value='+value.id+' title="Imprimer cette bon sortie"></a>\
                                            <a href="#" class="fa-solid fa-circle-check text-info fs-5 "  value='+value.id+' title="bon est clôturer"></a>'
                                }
                                else
                                {
                                    icon ='<a href="#" class="fa-solid fa-trash text-warning fs-5 IconTrashMSortie" value='+value.id+' title="Supprimer cette bon sortie"></a>\
                                            <a href="#" class="fa-solid fa-file-pdf text-danger fs-5 IconPrintMSortie" target="_blank" value='+value.id+' title="Imprimer cette bon sortie"></a>'
                                }

                            }

                            dataTable.row.add([
                                parseInt(value.nbbox),
                                value.cin,
                                value.matricule,
                                value.chauffeur,
                                value.client_name,
                                value.name,
                                value.created_at,
                                icon
                            ]);
                            dataTable.draw();
                        });
                        $('.numberbonSortie').text(response.NBSortie);
                        $('.NBSortieIsRetour').text(response.NBSortieIsRetour);
                    }
                }
            });
        }
        var idMarchSortie ='';
        $(document).on('click','.IconEditMSortie',function()
        {
            var NombreSorite = $(this).closest('tr').find('td:eq(0)').text();
            var Client= $(this).closest('tr').find('td:eq(4)').text();
            var cinChauffeur = $(this).closest('tr').find('td:eq(1)').text();
            idMarchSortie = $(this).attr('value');

            $.ajax({
                type: "get",
                url: "{{url('getIdClient')}}",
                data:
                {
                    name : Client,
                },
                dataType: "json",
                success: function (response)
                {
                    if(response.status == 200)
                    {
                        $('.EditNombreSorite').val(NombreSorite);
                        $('.EditClient').val(response.idclient).change();
                        $('.EditMAtriculeSortie').val(response.matricule);
                        $('.EditChauffeur').val(response.chauffeur);
                        $('.EditCIN').val(cinChauffeur);
                        $('#ModalEditMarchandisSortie').modal('show');
                    }
                }
            });

        });
        $(document).on('click','.IconPrintMSortie',function()
        {
            var idBonSortie = $(this).attr('value');
            window.open("{{url('ExtractBonSortie')}}/"+idBonSortie,"_blank");
            location.reload();
        });
        $(document).on('click','.IconTrashMSortie',function()
        {
            idMarchSortie = $(this).attr('value');
            $('#ModalTrashMSortie').modal('show');
        });
        $('#TrashBonSortie').on('click',function()
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
                    url: "{{url('TrashBonSortie')}}",
                    data:
                    {
                        "_token"    : "{{ csrf_token() }}",
                        id : idMarchSortie,
                    },
                    dataType: "json",
                    success: function (response)
                    {
                        if(response.status == 200)
                        {
                            $('#ModalTrashMSortie').modal('hide');
                            $('.textReturn').addClass('alert alert-danger').text('Supprimé avec succès').delay(4000).fadeOut('slow');
                            GetMarchSoriteDashboard();
                        }
                    }
                });
            }
        });
        $('#EditBonSortie').on('click',function()
        {
            if($('.EditNombreSorite').val() == '')
            {
                Swal.fire({
                  icon: "error",
                  title: "Oops...",
                  text: "Nombre sortie ne peux pas être vide!",
                });
                return false;
            }

            if($('.EditChauffeur').val() == 0)
            {
                 Swal.fire({
                  icon: "error",
                  title: "Oops...",
                  text: "Chauffeur ne peux pas être vide",
                });
                return false;
            }
            $.ajax({
                    type: "post",
                    url: "{{url('EditBonSortie')}}",
                    data:
                    {
                        "_token"    : "{{ csrf_token() }}",
                        nbbox         : $('.EditNombreSorite').val(),
                        Client        : $('.EditClient').val(),
                        id            : idMarchSortie,
                        matricule     : $('.EditMAtriculeSortie').val(),
                        chauffeur     : $('.EditChauffeur').val(),
                        cin : $('.EditCIN').val(),
                    },
                    dataType: "json",
                    success: function (response)
                    {
                        if(response.status == 200)
                        {

                            $('#ModalEditMarchandisSortie').modal('hide');
                            $('.textReturn').addClass('alert alert-success').text('mettre à jour avec succès').delay(4000).fadeOut('slow');

                            GetMarchSoriteDashboard();
                        }
                    }
                });
        });


        $('#AddMarchandiseSortie').on('click', function() {
            if($('.nbbox').val() == '')
            {
                Swal.fire({
                  icon: "error",
                  title: "Oops...",
                  text: "Nombre sortie ne peux pas être vide!",
                });
                return false;
            }
            if($('.chauffeur').val() == 0)
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
                    url: "{{url('StoreMarchandiseSortieCaisse')}}",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        "_token": "{{ csrf_token() }}",
                        nbbox     : $('.nbbox').val(),
                        matricule : $('.matricule').val(),
                        chauffeur : $('.chauffeur').val(),
                        client    : $('.client').val(),
                        cin       : $('.cinChauffeur').val(),
                    },
                    dataType: "json",
                    success: function(response)
                    {
                        if(response.status == 200)
                        {
                            $('#ModalMerchandiseSortie').modal('hide');
                            $('.textReturn').addClass('alert alert-success').text('ajouter avec succès').delay(4000).fadeOut('slow');
                            $('.nbbox').val('');
                            $('.chauffeur').val(0);
                            $('.client').val(0);
                            GetMarchSoriteDashboard();
                        }
                    }
                });

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
                            $('.matricule').val("");
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
                            $('.matricule').val(response.data.matricule);
                        }
                    }
                });
            }
        });

        /* $('.EditClient').on('change',function()
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
                        $('.EditCIN').val("");
                            $('.EditMAtriculeSortie').val("");
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
                            $('.EditCIN').val(response.data.cin);
                            $('.EditMAtriculeSortie').val(response.data.matricule);
                        }
                    }
                });
            }
        });



    });
</script>
@endsection
