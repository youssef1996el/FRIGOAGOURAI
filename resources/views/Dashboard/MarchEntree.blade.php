@extends('Dashboard.index')
@section('contentDashboard')
    <div class="row mt-2">
        <div class="col-md-6 float-start">
             <h4 class="m-0 text-dark text-muted">Entrée de marchandises</h4>
        </div>
        <div class="col-md-6">
            <ol class="breadcrumb float-end">
                <a href="#" class="btn btn-primary"  data-bs-toggle="modal" data-bs-target="#ModalMerchandiseEntree">Ajouter opération</a>
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
                                <table class="table table-striped" id="TableMerchandiseEntree" data-page-lenght="-1">
                                    <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Client</th>
                                            <th>C.I.N</th>
                                            <th>Livreur</th>
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
    <div class="row">
        <div class="col-sm-6 col-md-6 col-lg-6">
            {{-- <div class="card card-rounded">
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

    <div class="modal fade" id="ModalMerchandiseEntree" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdrop" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Entrée de Marchandise </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card p-3">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-12 col-md-6 col-xl-6">
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
                                    <div class="error"></div>
                                    <label for="">Livreur</label>
                                    {{-- <input type="text" class="form-control Chauffeur"> --}}
                                    <select name="" id="DropDownChauffeur" class="form-select Chauffeur">
                                        <option value="0">veuillez sélectionner un chauffeur</option>
                                        @foreach ($chauffeurs as $item)
                                            <option value="{{$item->name}}">{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-12 col-md-6 col-xl-6">
                                    <label for="">Produit</label>
                                    <select name="" id="" class="form-select Produit">
                                        @foreach ($Origine as $item)
                                            <option value="{{$item->title}}">{{$item->title}}</option>
                                        @endforeach
                                    </select>
                                    {{-- <input type="text" class="form-control Produit"> --}}
                                    <div class="error"></div>
                                    <label for="">Matricule</label>
                                    <input type="text" class="form-control Matricule" readonly>
                                    <div class="error"></div>
                                    <label for="">C.I.N livreur</label>
                                    <input type="text" class="form-control cinChauffeur" readonly>
                                    <div class="error"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mt-3 p-3">
                        <table class="table table-striped table-bordered" id="TableTmpEntree">
                            <thead>
                                <tr>
                                    <th style="text-align:center">C.I.N</th>
                                    <th style="text-align: center">Matricule</th>
                                    <th style="text-align: center">Chauffeur</th>
                                    <th style="text-align: center">Produit</th>
                                    <th style="text-align: center">Client</th>
                                    <th style="text-align: right; width: 109.781px; ">Nombre Caisse</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="6" style="text-align: right" class="totalnbBox"></td>
                                    <td></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-success" id="AddMarchandiseEntree">Ajouter détail bon</button>
                    <button class="btn btn-primary" id="ValideBonEntre">Validé</button>
                </div>
            </div>
        </div>
    </div>


    {{-- Modal Trash Client --}}
    <div class="modal fade" id="ModalTrashMEntree" aria-labelledby="settingsModalTitle" aria-hidden="true" tabindex="-1">
        <div class="modal-dialog modal-dialog-settings ">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title text-uppercase" id="exampleModalLabel">Supprimer Bon Marchandise entrée</h5>
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
                    <button class="btn btn-danger text-uppercase" id="TrashBonMarchandiseEntree">Supprimer</button>
                </div>
            </div>
        </div>
    </div>
    <style>
        .table-striped > tbody > tr:nth-of-type(odd) > * {
            text-align: center;
        }
        #TableTmpEntree_filter
        {
            margin-bottom: 8px;
        }
         #TableMerchandiseEntree_filter
        {
            margin-bottom: 8px;
        }
        .error
        {
            color:red;
        }
        #TableTmpEntree
        {
            border-radius: 5px 5px 0 0;
            overflow: hidden;
            box-shadow: 0 0 20px rgba(0,0,0,0.15);
        }
        #TableTmpEntree > tbody > tr:nth-of-type(even) > * {
            text-align: center;
        }
        #TableTmpEntree thead tr
        {
            background-color : #009879;
            color:#fff;
            text-align: center;
        }
        #TableTmpEntree tbody tr:last-of-type
        {
            border-bottom: 2px solid #009879;
        }
        #TableTmpEntree tbody td:nth-child(3)
        {
            text-align: right;
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
        /******** */
        #TableMerchandiseEntree
        {
            border-radius: 5px 5px 0 0;
            overflow: hidden;
            box-shadow: 0 0 20px rgba(0,0,0,0.15);
        }
        #TableMerchandiseEntree thead tr
        {
            background-color : #009879;
            color:#fff;
            text-align: left;
        }
        #TableMerchandiseEntree > tbody > tr:nth-of-type(odd) > * {
            text-align: left;
        }
        #TableMerchandiseEntree tbody tr:last-of-type
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


        .progressValue {
    margin-left: 48px; /* Adjust the spacing as needed */
}
    </style>
    <script>
        $(document).ready(function ()
        {

            var currentPath = window.location.pathname;
            var pathSegments = currentPath.split('/');
            var lastSegment = pathSegments[pathSegments.length - 1];
            if(lastSegment === "MarchEntree")
            {
                $('.list-unstyled li:has(span:contains("Entée de marchandises"))').css({
                    'background-color': 'rgb(159 226 212)',
                    'box-shadow' :'5px 5px 10px #888888',
                    'border-top-right-radius': '10px',
                    'border-bottom-right-radius': '10px'
                }).find('i[data-feather="users"]').addClass('text-white');
            }
            var dataTableInitialized = false;
            var dataTableTableMarchandisEntree = false;
            var selectedRow = null;
            var sumNbbox = 0;
            GetMarchEntreeDashboard();

            GetTmpMachaEntree();
            function GetTmpMachaEntree(idclient)
            {
                $.ajax({
                    type: "get",
                    url: "{{url('GetTmpMachaEntree')}}",
                    data :
                    {
                        idclient : idclient,
                    },
                    dataType: "json",
                    success: function (response)
                    {
                        if (!dataTableInitialized)
                        {
                            dataTableInitialized = true;
                            var dataTable = $('#TableTmpEntree').DataTable({
                                dom: 'Bfrtip',
                                buttons: [
                                    {
                                        extend: 'print',
                                        text: 'Imprimer'
                                    }
                                ],
                                paging: false,
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
                            var dataTable = $('#TableTmpEntree').DataTable(); // Get the existing DataTable instance
                            dataTable.clear().draw();
                        }
                        dataTable.clear();
                        $.each(response.data, function (index, value)
                        {
                            sumNbbox += parseInt(value.nbbox);
                            dataTable.row.add([
                                value.cin,
                                value.matricule,
                                value.chauffeur,
                                value.produit,
                                value.name_client,
                                value.nbbox,
                                '<a href="#" class="fa-solid fa-x text-danger mr-5 IconTrashTmpMarchEntree" value='+value.id+' title="Transfert les données"></a>'
                            ]);
                            dataTable.draw();
                        });
                        $('.totalnbBox').text(response.total);
                        $('.nbboxADD').val("");
                        $('.Produit').val("");
                    }
                });
            }
            var idclient = 0;
            $('.client').on('change',function()
            {
                idclient = $(this).val();
                GetTmpMachaEntree(idclient);
            });

            function GetMarchEntreeDashboard()
            {
                $.ajax({
                    type: "get",
                    url: "{{url('GetMarchEntreeDashboard')}}",
                    dataType: "json",
                    success: function (response)
                    {
                        if(response.status == 200)
                        {
                            if (!dataTableTableMarchandisEntree)
                            {
                                dataTableTableMarchandisEntree = true;
                                var dataTable = $('#TableMerchandiseEntree').DataTable({
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
                                var dataTable = $('#TableMerchandiseEntree').DataTable(); // Get the existing DataTable instance
                                dataTable.clear().draw();

                            }
                            dataTable.clear();
                            var icon = '';
                            $.each(response.data, function (index, value)
                            {
                                if(value.cloturer == 1 && response.Role === "user" )
                                {
                                    icon = '<a href="#" class="fa-solid fa-circle-check text-info fs-5 "  value='+value.id+' title="bon est clôturer"></a>\
                                        '
                                }
                                else
                                {
                                    /* mylink */
                                    if(value.cloturer == 1 && response.Role !="user")
                                    {
                                        icon ='<a href="#" class="fa-solid fa-trash fs-5 text-warning mr-5 IconTrashMarchandiseEntree "  value='+value.id+' title="Supprimer Bon Marchandise Entrée"></a>\
                                                <a href="#" class="fa-solid fa-file-pdf fs-5 text-danger mr-5 IconPrintMEntree" target="_blank" value='+value.id+' title="Imprimer bon marchandise entrée les données"></a>\
                                                <a href="#" class="fa-solid fa-circle-check text-info fs-5 "  value='+value.id+' title="bon est clôturer"></a>'
                                    }
                                    else
                                    {
                                        icon ='<a href="#" class="fa-solid fa-trash fs-5 text-warning mr-5 IconTrashMarchandiseEntree"  value='+value.id+' title="Supprimer Bon Marchandise Entrée"></a>\
                                                <a href="#" class="fa-solid fa-file-pdf fs-5 text-danger mr-5 IconPrintMEntree" target="_blank" value='+value.id+' title="Imprimer bon marchandise entrée les données"></a>'
                                    }

                                }



                                dataTable.row.add([
                                    value.totalentree,
                                    value.name,
                                    value.cin,
                                    value.chauffeur,
                                    value.matricule,
                                    value.user,
                                    value.created_at,
                                    icon
                                ]);
                                dataTable.draw();
                            });

                        }
                    }
                });
            }
            var idMarchEntree ='';
            $(document).on('click','.IconPrintMEntree',function()
            {
                var idBonMarchEntree = $(this).attr('value');
                window.open("{{url('ExtractBonMarchEntree')}}/"+idBonMarchEntree,"_blank");
                location.reload();
            });
            $(document).on('click','.IconTrashMarchandiseEntree',function()
            {
                Swal.fire({
                    title: "Es-tu sûr de vouloir supprimer la bonne marchandise Entrée ?",
                    showDenyButton: true,
                    showCancelButton: true,
                    confirmButtonText: "Sauvegarder",
                    denyButtonText: `Ne sauvegardez pas`
                    }).then((result) => {

                    if (result.isConfirmed)
                    {
                        $.ajax({
                            type: "post",
                            url: "{{url('trashMarchandiseEntree')}}",
                            data:
                            {
                                "_token"    : "{{ csrf_token() }}",
                                id : $(this).attr('value'),
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
                    else if (result.isDenied)
                    {
                        Swal.fire("Les modifications ne sont pas enregistrées", "", "info");
                    }
                });
            });






            $('#AddMarchandiseEntree').on('click', function() {
                var fields = ['.nbboxADD','.client','.Produit','.Matricule','.Chauffeur','.cinChauffeur'];
                var hasError = false;

                $('.error').text('');

                fields.forEach(function(field, index) {
                    var value = $(field).val().trim();
                    var errorMessage = '';

                    switch (index) {
                        case 0:
                            errorMessage = 'Nombre entrée ne peux pas être vide';
                            break;
                        case 1:
                            errorMessage = 'Client ne peux pas être vide';
                            break;
                        case 2:
                            errorMessage = 'Produit ne peux pas être vide';
                            break;
                            case 3:
                            errorMessage = 'Matricule ne peux pas être vide';
                            break;
                            case 4:
                            errorMessage = 'Chauffeur ne peux pas être vide';
                            break;
                            case 5:
                            errorMessage = 'C.I.N Chauffeur ne peux pas être vide';
                            break;
                    }

                    if (value === '') {
                        $('.error').eq(index).text(errorMessage);
                        hasError = true;
                    }
                });
                if($('.client').val() == 0)
                {
                    $('.client').next('.error').text('Client ne peux pas être vide');
                    hasError = true;
                }
                if (!hasError)
                {

                    $.ajax({
                        type: "post",
                        url: "{{url('StoreTmpMacheEntree')}}",
                        data:
                        {
                            "_token"    : "{{ csrf_token() }}",
                            client : $('.client').val(),
                            produit : $('.Produit').val(),
                            nbBox   : $('.nbboxADD').val(),
                            matricule : $('.Matricule').val(),
                            chauffeur : $('.Chauffeur').val(),
                            cin         : $('.cinChauffeur').val(),
                        },
                        dataType: "json",
                        success: function (response)
                        {
                            if(response.status == 200)
                            {
                                GetTmpMachaEntree(idclient);
                            }
                            if(response.status == 300)
                            {
                                GetTmpMachaEntree(idclient);
                                GetMarchEntreeDashboard();
                            }
                        }
                    });

                }
            });

            $(document).on('click','.IconTrashTmpMarchEntree',function()
            {
                $.ajax({
                    type: "get",
                    url: "{{url('TrashTmpMarchEntree')}}",
                    data:
                    {
                        id : $(this).attr('value'),
                    },
                    dataType: "json",
                    success: function (response)
                    {
                        if(response.status == 200)
                        {
                            GetTmpMachaEntree(idclient);
                        }
                    }
                });

            });

            $('#ValideBonEntre').on('click',function()
            {
                var extractedValues = [];
                $('#TableTmpEntree tbody tr').each(function() {
                    var rowValues = [];
                    $(this).find('td:eq(0), td:eq(1), td:eq(2), td:eq(3), td:eq(4),td:eq(5)').each(function() {
                        rowValues.push($(this).text());
                    });
                    extractedValues.push(rowValues);
                });
                var nameClient = $('#TableTmpEntree tbody tr td:eq(4)').text();

                $.ajax({
                    type: "post",
                    url: "{{url('StoreMarchEntreeAndLigne')}}",
                    data:
                    {
                        "_token"    : "{{ csrf_token() }}",
                        totalentree : $('.totalnbBox ').text(),
                        ligne       : extractedValues,
                        nameClient  : nameClient,
                    },
                    dataType: "json",
                    success: function (response)
                    {
                        if(response.status == 200)
                        {
                            GetTmpMachaEntree(idclient);
                            $('#ModalMerchandiseEntree').modal("hide");
                            GetMarchEntreeDashboard();
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





        });
    </script>
@endsection

