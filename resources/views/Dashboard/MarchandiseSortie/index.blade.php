@extends('Dashboard.index')
@section('contentDashboard')
    <div class="row mt-2">
        <div class="col-md-6 float-start">
            <h4 class="m-0 text-dark text-muted">Sortie de marchandises</h4>
        </div>
        <div class="col-md-6">
            <ol class="breadcrumb float-end">
                <a href="#" class="btn btn-primary"  data-bs-toggle="modal" data-bs-target="#ModalMArchandiseSortie">Ajouter opération</a>
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
								<table class="table table-striped" id="TableMarchandiseSortie" data-page-lenght="-1">
                                    <thead>
                                        <tr>
                                            <th>Nombre </th>
                                            <th>Client</th>
                                            <th>Nom Livreur</th>
                                            <th>Matricule</th>
                                            <th>C.I.N (Livreur)</th>
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
    <div class="modal fade" id="ModalMArchandiseSortie" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdrop" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Sortie de Marchandise </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card shadow p-3">
                        <div class="form-gorup">
                            <div class="row">
                                <div class="col-sm-12 col-md-6 col-xl-6">
                                    <label for="">Nombre </label>
                                    <input type="number" class="form-control caissesortie" placeholder="Nombre">
                                    <div class="error"></div>
                                    <label for="">Produit :</label>
                                    <select name="" id="" class="form-select produit">
                                        @foreach ($ListOrigin as $item)
                                            <option value="{{$item->title}}">{{$item->title}}</option>
                                        @endforeach
                                    </select>
                                    {{-- <input type="text" class="form-control produit" placeholder="Produit"> --}}
                                    <div class="error"></div>
                                    <label for="">Livreur</label>
                                    <select name="" id="DropDownChauffeur" class="form-select chauffeur">
                                        <option value="0">veuillez sélectionner un chauffeur</option>
                                        @foreach ($cheuffeurs as $item)
                                            <option value="{{$item->name}}">{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                    {{-- <input type="text" class="form-control chauffeur"> --}}
                                    <div class="error"></div>
                                </div>
                                <div class="col-sm-12 col-md-6 col-xl-6">
                                    <label for="">Client</label>
                                    <select name="" id="" class="form-select clientselect">
                                        <option value="0">veuillez sélectionner le client</option>
                                        @foreach ($clients as $client)
                                            <option value="{{$client->id}}">{{$client->nom.' '.$client->prenom}}</option>
                                        @endforeach
                                    </select>
                                    <div class="error"></div>
                                    <label for="">Matricule</label>
                                    <input type="text" class="form-control matricule" readonly>
                                    <div class="error"></div>
                                    <label for="">C.I.N</label>
                                    <input type="text" class="form-control CINChauffeur" readonly>
                                    <div class="error"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mt-3 shadow p-3">
                        <table class="table table-striped" id="TableTmpMarchandiseSortie">
                            <thead>
                                <tr>
                                    <th>NOMBRE CAISSE</th>
                                    <TH>PRODUIT</TH>
                                    <TH>CLIENT</TH>
                                    <th>CHAUFFEUR</th>
                                    <th>MATRICULE</th>
                                    <th>CIN</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="4" class="text-danger text-left totalCaisseSortie"></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-success BtnAddTmpMarchSortie">Ajoute détail bon</button>
                    <button class="btn btn-primary BtnValideTmpToMarchandiseSortie">Validé</button>
                </div>
            </div>
        </div>
    </div>
    <style>
          #TableMarchandiseSortie_filter
        {
            margin-bottom: 8px;
        }
          #TableMarchandiseSortie thead tr
        {
            background-color : #009879;
            color:#fff;
            text-align: center;
        }
         #TableTmpMarchandiseSortie_filter
        {
            margin-bottom: 8px;
        }
        #TableTmpMarchandiseSortie
        {
            border-radius: 5px 5px 0 0;
            overflow: hidden;
            box-shadow: 0 0 20px rgba(0,0,0,0.15);
        }
        #TableTmpMarchandiseSortie thead tr
        {
            background-color : #009879;
            color:#fff;
            text-align: left;
        }
        #TableTmpMarchandiseSortie > tbody > tr:nth-of-type(odd) > * {
            text-align: left;
        }
        #TableTmpMarchandiseSortie tbody tr:last-of-type
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
        /* .mylink
        {
            color: gray;
            pointer-events: none;
            text-decoration: none;
        } */
    </style>
    <script>
        $(document).ready(function () {
            var currentPath = window.location.pathname;
            var pathSegments = currentPath.split('/');
            var lastSegment = pathSegments[pathSegments.length - 1];
            if(lastSegment === "MarchandiseSortie")
            {
                $('.list-unstyled li:has(span:contains("Sortie de marchandises"))').css({
                    'background-color': 'rgb(159 226 212)',
                    'box-shadow' :'5px 5px 10px #888888',
                    'border-top-right-radius': '10px',
                    'border-bottom-right-radius': '10px'
                }).find('i[data-feather="users"]').addClass('text-white');
            }
            var datatableTmp = false;
            var datatableSortie = false;
            var idclient = 0;
            $('.clientselect').on('change',function()
            {
                if($(this).val() == 0)
                {
                    $(this).next('.error').text('veuillez sélectionner le client').css('color','red');
                    return 0;
                }
                else
                {
                    idclient = $(this).val();
                    getTmpMarchandisSortie(idclient);
                    /* $.ajax({
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
                                $('.CINChauffeur').val("");
                                    $('.matricule').val("");
                                    $.each(response.data, function (index, value) {
                                        $("#DropDownChauffeur").append('<option value="0">veuillez sélectionner un chauffeur</option>' +
                                                                        '<option value="' + value.name + '">' + value.name + '</option>');
                                    });


                            }
                        }
                    }); */

                }
            });
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
                                $('.CINChauffeur').val(response.data.cin);
                                $('.matricule').val(response.data.matricule);
                            }
                        }
                    });
                }
            });
            getMarchandiseSortie();
            function getMarchandiseSortie()
            {
                $.ajax({
                    type: "get",
                    url: "{{url('GetMarchandiseSortie')}}",
                    dataType: "json",
                    success: function (response)
                    {
                        if(response.status == 200)
                        {
                            if(!datatableSortie)
                            {
                                datatableSortie = true;
                                var datatable = $('#TableMarchandiseSortie').DataTable({
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
                                        "oPaginate":
                                        {
                                            "sFirst": "Premier",
                                            "sLast": "Dernier",
                                            "sNext": "Suivant",
                                            "sPrevious": "Précédent"
                                        },
                                        "oAria":
                                        {
                                            "sSortAscending": ": activer pour trier la colonne par ordre croissant",
                                            "sSortDescending": ": activer pour trier la colonne par ordre décroissant"
                                        },
                                        "select":
                                        {
                                            "rows":
                                            {
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
                                var datatable = $('#TableMarchandiseSortie').DataTable();
                                datatable.clear().draw();
                            }
                            datatable.clear();
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
                                    if(value.cloturer == 1 && response.Role !="user")
                                    {
                                        icon ='<a href="#" class="fa-solid fa-trash fs-5 mr-3 text-warning IconTrashMarchandiseSortie mylink" value='+value.id+' title="Supprimer Bon Marchandise sortie"></a>\
                                        <a href="#" class="fa-solid fa-file-pdf fs-5 text-danger mr-5 IconPrintBonMarchandiseSortie" target="_blank" value='+value.id+' title="Imprimer bon marchandise sortie les données"></a>\
                                                <a href="#" class="fa-solid fa-circle-check text-info fs-5 "  value='+value.id+' title="bon est clôturer"></a>'
                                    }
                                    else
                                    {
                                        icon ='<a href="#" class="fa-solid fa-trash fs-5 mr-3 text-warning IconTrashMarchandiseSortie" value='+value.id+' title="Supprimer Bon Marchandise sortie"></a>\
                                        <a href="#" class="fa-solid fa-file-pdf fs-5 text-danger mr-5 IconPrintBonMarchandiseSortie" target="_blank" value='+value.id+' title="Imprimer bon marchandise sortie les données"></a>'
                                    }

                                }
                                datatable.row.add([
                                    value.totalsortie,
                                    value.client,
                                    value.chauffeur,
                                    value.matricule,
                                    value.cin,
                                    value.name,
                                    value.created_at,
                                    icon
                                ]);
                            });
                            datatable.draw();
                        }
                    }

                });
            }
            $(document).on('click','.IconPrintBonMarchandiseSortie',function()
            {
                var idBonMarchandiseSortie = $(this).attr('value');
                window.open("{{url('ExtractBonMarchandiseSortie')}}/"+idBonMarchandiseSortie,"_blank");
                location.reload();
            });
            $(document).on('click','.IconTrashMarchandiseSortie',function()
            {
                Swal.fire({
                    title: "Es-tu sûr de vouloir supprimer la bonne marchandise sortie?",
                    showDenyButton: true,
                    showCancelButton: true,
                    confirmButtonText: "Sauvegarder",
                    denyButtonText: `Ne sauvegardez pas`
                    }).then((result) => {

                    if (result.isConfirmed)
                    {
                        $.ajax({
                            type: "post",
                            url: "{{url('trashMarchandiseSortie')}}",
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
                                    Swal.fire("Enregistrée!", "", "success");
                                    setInterval(function()
                                    {
                                            // Reload the page

                                    }, 1500);

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

            function getTmpMarchandisSortie(idclient)
            {
                $.ajax({
                    type: "get",
                    url: "{{url('GetTmpMarchandisSortie')}}",
                    data:
                    {
                        idclient : idclient,
                    },
                    dataType: "json",
                    success: function (response)
                    {
                        if(response.status == 200)
                        {
                            if(!datatableTmp)
                            {
                                datatableTmp = true;
                                var datatable = $('#TableTmpMarchandiseSortie').DataTable({
                                    dom: 'Bfrtip',
                                    buttons: [
                                        'print'
                                    ],
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
                                        "oPaginate":
                                        {
                                            "sFirst": "Premier",
                                            "sLast": "Dernier",
                                            "sNext": "Suivant",
                                            "sPrevious": "Précédent"
                                        },
                                        "oAria":
                                        {
                                            "sSortAscending": ": activer pour trier la colonne par ordre croissant",
                                            "sSortDescending": ": activer pour trier la colonne par ordre décroissant"
                                        },
                                        "select":
                                        {
                                            "rows":
                                            {
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
                                var datatable = $('#TableTmpMarchandiseSortie').DataTable();
                                datatable.clear().draw();
                            }
                            datatable.clear();

                            $.each(response.data, function (index, value)
                            {

                                datatable.row.add([
                                    value.nbbox,
                                    value.produit,
                                    value.client,
                                    value.chauffeur,
                                    value.matricule,
                                    value.cin,
                                    '<a href="#" class="fa-solid fa-trash IconTrashTmpMarchandiseSortie" value='+value.id+' title="Supprimir Cette ligne"></a>',
                                ]);
                                datatable.draw();
                            });
                            $('.totalCaisseSortie').text(response.totalSortie);
                        }
                    }
                });
            }
            $('.BtnAddTmpMarchSortie').on('click',function()
            {
                var fields = ['.caissesortie','.produit','.chauffeur','.matricule','.CINChauffeur'];
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
                            errorMessage = 'Chauffeur ne peux pas être vide';
                            break;
                        case 4:
                            errorMessage = 'Matricule ne peux pas être vide';
                            break;
                            case 5:
                            errorMessage = 'C.I.N Chauffeur ne peux pas être vide';
                            break;
                    }

                    if (value === '') {
                        $('.error').eq(index).text(errorMessage).css('color','red');
                        hasError = true;
                    }
                });
                if($('.clientselect').val() == 0)
                {
                    $('.clientselect').next('.error').text('Client ne peux pas être vide');
                    hasError = true;
                }
                if (!hasError)
                {

                    $.ajax({
                        type: "post",
                        url: "{{url('StoreTmpMarchandiseSortie')}}",
                        data:
                        {
                            "_token"    : "{{ csrf_token() }}",
                            idclient    : $('.clientselect').val(),
                            produit     : $('.produit').val(),
                            nbbox       : $('.caissesortie').val(),
                            chauffeur   : $('.chauffeur').val(),
                            matricule   : $('.matricule').val(),
                            cin         : $('.CINChauffeur').val(),
                        },
                        dataType: "json",
                        success: function (response)
                        {
                            if(response.status == 200)
                            {
                                getTmpMarchandisSortie(idclient);
                                $('.caissesortie').val("");
                                $('.produit').val("");
                            }
                            if(response.status == 300)
                            {
                                getTmpMarchandisSortie(idclient);
                                $('.caissesortie').val("");
                                $('.produit').val("");
                            }
                        }
                    });

                }

            });

            $(document).on('click','.IconTrashTmpMarchandiseSortie',function()
            {
                $.ajax({
                    type: "post",
                    url: "{{url('TrashTmpMarchandiseSortie')}}",
                    data:
                    {
                        "_token"    : "{{ csrf_token() }}",
                        id          : $(this).attr('value'),
                    },
                    dataType: "json",
                    success: function (response)
                    {
                        if(response.status == 200)
                        {
                            getTmpMarchandisSortie(idclient);
                        }
                    }
                });
            });

            $('.BtnValideTmpToMarchandiseSortie').on('click',function()
            {
                if(idclient == 0)
                {
                    Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: "veuillez sélectionner le client",

                    });
                }
                else
                {
                    $.ajax({
                        type: "get",
                        url: "{{url('checkTmpIsNotNull')}}",
                        data:
                        {
                            idclient :idclient,
                        },
                        dataType: "json",
                        success: function (response)
                        {
                            if(response.status == 200)
                            {
                                $.post("{{url('StoreMarchandiseSortie')}}",{"_token"    : "{{ csrf_token() }}",idclient : idclient},
                                    function (data, textStatus, jqXHR)
                                    {
                                        if(data.status == 200)
                                        {
                                            $('#ModalMArchandiseSortie').modal("hide");
                                            getMarchandiseSortie();
                                            $('.Msg').addClass('alert alert-success').text('ajouter avec succès').delay(6000).fadeOut("slow");
                                        }
                                    },
                                    "json"
                                );
                            }
                            if(response.status == 404)
                            {
                                Swal.fire({
                                    icon: "error",
                                    title: "Oops...",
                                    text: "Le tableau est nul",

                                });
                            }
                        }
                    });
                }
            });

        });
    </script>
@endsection
