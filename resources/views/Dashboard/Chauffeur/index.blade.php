@extends('Dashboard.index')
@section('contentDashboard')
<div class="container">
    <div class="row">
        <h3 class=" border rounded-1 p-2 bg-light">Les livreurs</h3>
        <div class="card mt-2 p-2">
            <button class="btn btn-primary w-25 mb-2"  data-bs-toggle="modal" data-bs-target="#ModalAddChauffeur">Ajouter livreur</button>
            <table class="table table-striped" id="TableChauffeur" data-page-lenght="-1">
                <thead>
                    <tr>
                        <th>Nom Complet</th>
                        <th>C.I.N</th>
                        <th>Matricule</th>
                        <th>Téléphone</th>
                        <th>Créer par </th>
                        <th>Créer le</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
</div>
<div class="modal fade" id="ModalAddChauffeur" aria-labelledby="settingsModalTitle" aria-hidden="true" tabindex="-1">
    <div class="modal-dialog modal-dialog-settings modal-xl">
        <div class="modal-content ">
            <div class="modal-header text-center">
                <h5 class="modal-title text-uppercase" id="exampleModalLabel">Ajouter Chauffeur</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
               <div class="row">
                    <div class="col-sm-12 col-md-6 col-xl-6">
                        <label for="">Nom Complet</label>
                        <input type="text" class="form-control" id="NomComplet" placeholder="Nom Complet">
                        <div class="errors" id="NomCompletError"></div>

                        <label for="">Cin</label>
                        <input type="text" class="form-control" id="Cin" placeholder="Cin">
                        <div class="errors" id="CinError"></div>


                    </div>

                    <div class="col-sm-12 col-md-6 col-xl-6">
                        <label for="">Matricule</label>
                        <input type="text" class="form-control" id="Matricule" placeholder="Matricule">
                        <div class="errors" id="MatriculeError"></div>
                        <label for="" hidden>Clients</label>
                        <select name="" id="Clients" class="form-select" hidden>
                            @foreach ($clients as $item)
                                <option value="{{$item->id}}">{{$item->nom.' '.$item->prenom}}</option>
                            @endforeach
                        </select>
                        <label for="">Téléphone</label>
                        <input type="text" class="form-control" id="phone">


                    </div>
               </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-success text-uppercase" id="BtnAdd">enregistrer</button>
            </div>
        </div>
    </div>
</div>
{{-- Modal Edit --}}
<div class="modal fade" id="ModalEditChauffeur" aria-labelledby="settingsModalTitle" aria-hidden="true" tabindex="-1">
    <div class="modal-dialog modal-dialog-settings modal-xl">
        <div class="modal-content ">
            <div class="modal-header text-center">
                <h5 class="modal-title text-uppercase" id="exampleModalLabel">Modifier Chauffeur</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
               <div class="row">
                    <div class="col-sm-12 col-md-6 col-xl-6">
                        <label for="">Nom Complet</label>
                        <input type="text" class="form-control" id="NomCompletEdit" placeholder="Nom Complet">
                        <div class="errors" id="NomCompletError"></div>

                        <label for="">Cin</label>
                        <input type="text" class="form-control" id="CinEdit" placeholder="Cin">
                        <div class="errors" id="CinError"></div>


                    </div>
                    <div class="col-sm-12 col-md-6 col-xl-6">
                        <label for="">Matricule</label>
                        <input type="text" class="form-control" id="MatriculeEdit" placeholder="Matricule">
                        <div class="errors" id="MatriculeError"></div>
                        <label for="" hidden>Clients</label>
                        <select name="" id="ClientsEdit" class="form-select" hidden>
                            @foreach ($clients as $item)
                                <option value="{{$item->id}}">{{$item->nom.' '.$item->prenom}}</option>
                            @endforeach
                        </select>

                        <label for="">Télephone</label>
                        <input type="text" class="form-control phoneEdit">

                    </div>
               </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-success text-uppercase" id="BtnUpdate">enregistrer</button>
            </div>
        </div>
    </div>
</div>

 {{-- ModalTrash --}}
 <div class="modal fade" id="ModalTrashchauffeur" aria-labelledby="settingsModalTitle" aria-hidden="true" tabindex="-1">
    <div class="modal-dialog modal-dialog-settings ">
        <div class="modal-content ">
            <div class="modal-header text-center">
                <h5 class="modal-title text-uppercase" id="exampleModalLabel">Supprimier Chauffeur</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
               <div class="row ">
                    <div class="form-group">
                        <input type="checkbox" id="checkUser">
                        <label for="">es-tu sûr de vouloir supprimer cet chauffeur</label>

                    </div>
               </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-danger text-uppercase" id="BtnTrash">enregistrer</button>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        var currentPath = window.location.pathname;
        var pathSegments = currentPath.split('/');
        var lastSegment = pathSegments[pathSegments.length - 1];
        var dataTableTableChauffeur = false;
        if(lastSegment === "Chauffeur")
        {
            $('.list-unstyled li:has(span:contains("Livreurs"))').css({
                'background-color': 'rgb(159 226 212)',
                'box-shadow' :'5px 5px 10px #888888',
                'border-top-right-radius': '10px',
                'border-bottom-right-radius': '10px'
            }).find('i[data-feather="users"]').addClass('text-white');
        }
        // function get Chauffeur
        function getChauffeurs()
        {
            $.ajax({
                    type: "get",
                    url: "{{url('GetChauffeur')}}",
                    dataType: "json",
                    success: function (response)
                    {
                        if(response.status == 200)
                        {
                            if (!dataTableTableChauffeur)
                            {
                                dataTableTableChauffeur = true;
                                var dataTable = $('#TableChauffeur').DataTable({

                                    "ordering": false,
                                    "lengthMenu": false,
                                    "select": {
                                        "style": "single"
                                    },
                                    paging: false,
                                    "pageLength": -1,
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
                                var dataTable = $('#TableChauffeur').DataTable(); // Get the existing DataTable instance
                                dataTable.clear().draw();

                            }
                            dataTable.clear();
                            $.each(response.data, function (index, value)
                            {
                                dataTable.row.add([
                                    value.name,
                                    value.cin,
                                    value.matricule,
                                    value.phone,
                                    value.nameuser,
                                    value.created_at,
                                    '<a href="#" class="fa-solid fa-pen-to-square fs-5 text-success mr-5 IconEditChauffeur"  value='+value.id+' title="Modifier Chauffeur"></a>\
                                    <a href="#" class="fa-solid fa-trash fs-5 text-warning mr-5 IconTrashChauffeur"  value='+value.id+' title="Supprimer Chauffeur"></a>'

                                ]);
                                dataTable.draw();

                            });

                        }
                    }
                });
        }

        getChauffeurs();
        $('#BtnAdd').on('click',function()
        {
            $('.errors').text('');
            const formFields = ['NomComplet', 'Cin',  'Matricule'];

            formFields.forEach(function (field) {
                const value = $('#' + field).val().trim();

                if (value === '') {
                    $('#' + field + 'Error').text(field + ' est requis');
                }
            });
            if ($('.errors').text() === '')
            {
                $.ajax({
                    type: "post",
                    url: "{{url('StoreChauffeur')}}",
                    data:
                    {
                        "_token"    : "{{ csrf_token() }}",
                        nom : $('#NomComplet').val(),
                        cin : $('#Cin').val(),
                        matricule : $('#Matricule').val(),
                        client : $('#Clients').val(),
                        phone : $('#phone').val(),
                    },
                    dataType: "json",
                    success: function (response)
                    {
                        if(response.status == 200)
                        {
                            Swal.fire({
                                icon: "success",
                                title: "Votre travail a été enregistré",
                                showConfirmButton: false,
                                timer: 1500
                            });
                            $('#ModalAddChauffeur').modal("hide");
                            getChauffeurs();
                        }
                    }
                });
            }
        });

        // iconEdit
        var id=0;
        $(document).on('click','.IconEditChauffeur',function()
        {
            id = $(this).attr('value');
            $.ajax({
                type: "get",
                url: "{{url('EditChauffeur')}}",
                data:
                {
                    id : id,
                },
                dataType: "json",
                success: function (response) {
                    if(response.status == 200)
                        {
                            $('#NomCompletEdit').val(response.data.name);
                            $('#CinEdit').val(response.data.cin);
                             $('#MatriculeEdit').val(response.data.matricule);
                             $('.phoneEdit').val(response.data.phone);
                            $('#ClientsEdit').val(response.data.idclient).change();
                            $('#ModalEditChauffeur').modal("show");
                        }
                }
            });

        });

        // btn update

        $('#BtnUpdate').on('click', function()
        {
            $('.errors').text('');
            const formFields = ['NomCompletEdit', 'CinEdit',  'MatriculeEdit'];
            formFields.forEach(function (field) {
                const value = $('#' + field).val().trim();

                if (value === '') {
                    $('#' + field + 'Error').text(field + ' est requis');
                }
            });
            if ($('.errors').text() === '')
            {
                $.ajax({
                    type: "post",
                    url: "{{url('UpdateChauffeur')}}",
                    data:
                    {
                        "_token"    : "{{ csrf_token() }}",
                        nom : $('#NomCompletEdit').val(),
                        cin : $('#CinEdit').val(),
                        matricule : $('#MatriculeEdit').val(),
                        client : $('#ClientsEdit').val(),
                        id : id,
                        telephone : $('.phoneEdit').val(),
                    },
                    dataType: "json",
                    success: function (response)
                    {
                        if(response.status == 200)
                        {
                            Swal.fire({
                                icon: "success",
                                title: "Votre travail a été enregistré",
                                showConfirmButton: false,
                                timer: 1500
                            });
                            $('#ModalEditChauffeur').modal("hide");
                            getChauffeurs();
                        }
                    }
                });
            }
        });

        // btn icon
        $(document).on('click','.IconTrashChauffeur',function()
        {

            id = $(this).attr('value');

            $('#ModalTrashchauffeur').modal("show");

        });

        $('#BtnTrash').on('click',function()
        {
            if($('#checkUser').is(':checked'))
            {
                $.ajax({
                    type: "post",
                    url: "{{url('TrashChauffeur')}}",
                    data:
                    {
                        "_token"    : "{{ csrf_token() }}",
                        id : id,
                    },
                    dataType: "json",
                    success: function (response)
                    {
                        if(response.status == 200)
                        {
                            Swal.fire({
                                icon: "success",
                                title: "Votre travail a été enregistré",
                                showConfirmButton: false,
                                timer: 1500
                            });
                            $('#ModalTrashchauffeur').modal("hide");
                            getChauffeurs();
                        }
                    }
                });
            }
            else
            {
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "veuillez vérifier cette opération!",

                });
            }
        });
    });
</script>
@endsection
