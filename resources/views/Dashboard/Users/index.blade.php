@extends('Dashboard.index')
@section('contentDashboard')
    <div class="container">
        <div class="row">
            <h3 class=" border rounded-1 p-2 bg-light">Les utilisateurs</h3>
            <div class="card p-2">
                <button class="btn btn-primary  w-25"  data-bs-toggle="modal" data-bs-target="#ModalAddUser">Ajouter  utilisateur</button>
                <table class="table table-striped mt-2 table-bordered" id="TableUsers" data-page-lenght="-1">
                    <thead>
                        <tr>
                            <th>Nom Complet</th>
                            <th>Email</th>
                            <th>Qualité</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $item)
                            <tr>
                                <td>{{$item->name}}</td>
                                <td>{{$item->email}}</td>
                                <td>{{$item->role_name}}</td>
                                <td>
                                    <i class="fa fa-pencil text-success fs-5 IconEdit" aria-hidden="true" value={{$item->id}}></i>
                                    <i class="fa fa-trash text-danger fs-5 ms-3 IconTrash" aria-hidden="true" value={{$item->id}}></i>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="modal fade" id="ModalAddUser" aria-labelledby="settingsModalTitle" aria-hidden="true" tabindex="-1">
        <div class="modal-dialog modal-dialog-settings modal-xl">
            <div class="modal-content ">
                <div class="modal-header text-center">
                    <h5 class="modal-title text-uppercase" id="exampleModalLabel">Ajouter utilisateur</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                   <div class="row">
                        <div class="col-sm-12 col-md-6 col-xl-6">
                            <label for="">Nom Complet</label>
                            <input type="text" class="form-control" id="NomComplet" placeholder="Nom Complet">
                            <div class="errors" id="NomCompletError"></div>

                            <label for="">Email</label>
                            <input type="email" class="form-control" id="Email" placeholder="Email">
                            <div class="errors" id="EmailError"></div>

                            <label for="">Qualité</label>
                            <select name="" id="Role" class="form-select">
                               {{--  {!! Form::select('roles[]', $roles,[], array('class' => 'form-control','multiple')) !!} --}}
                                @foreach ($roles as $item)
                                    <option value="{{$item->name}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-12 col-md-6 col-xl-6">
                            <label for="">Mot De Passe</label>
                            <input type="password" class="form-control" id="Password" placeholder="Mot de Passe">
                            <div class="errors" id="PasswordError"></div>

                            <label for="">Confirme Mot De Passe</label>
                            <input type="password" class="form-control" id="ConfirmPassword" placeholder="Confirme Mot de passe">
                            <div class="errors" id="ConfirmPasswordError"></div>
                        </div>
                   </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-success text-uppercase" id="BtnAdd">enregistrer</button>
                </div>
            </div>
        </div>
    </div>
    {{-- ModalEdit --}}
    <div class="modal fade" id="ModalEditUser" aria-labelledby="settingsModalTitle" aria-hidden="true" tabindex="-1">
        <div class="modal-dialog modal-dialog-settings modal-xl">
            <div class="modal-content ">
                <div class="modal-header text-center">
                    <h5 class="modal-title text-uppercase" id="exampleModalLabel">Ajouter utilisateur</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                   <div class="row">
                        <div class="col-sm-12 col-md-6 col-xl-6">
                            <label for="">Nom Complet</label>
                            <input type="text" class="form-control" id="NomCompletEdit" placeholder="Nom Complet">
                            <div class="errors" id="NomCompletError"></div>

                            <label for="">Email</label>
                            <input type="email" class="form-control" id="EmailEdit" placeholder="Email">
                            <div class="errors" id="EmailError"></div>

                            <label for="">Rôle</label>
                            <select name="" id="RoleEDit" class="form-select">
                                @foreach ($roles as $item)
                                    <option value="{{$item->name}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-12 col-md-6 col-xl-6">
                            <label for="">Mot De Passe</label>
                            <input type="password" class="form-control" id="PasswordEdit" placeholder="Mot de Passe">
                            <div class="errors" id="PasswordError"></div>

                            <label for="">Confirme Mot De Passe</label>
                            <input type="password" class="form-control" id="ConfirmPasswordEdit" placeholder="Confirme Mot de passe">
                            <div class="errors" id="ConfirmPasswordError"></div>
                        </div>
                   </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-success text-uppercase" id="BtnEdit">enregistrer</button>
                </div>
            </div>
        </div>
    </div>
    {{-- ModalTrash --}}
    <div class="modal fade" id="ModalTrashUser" aria-labelledby="settingsModalTitle" aria-hidden="true" tabindex="-1">
        <div class="modal-dialog modal-dialog-settings ">
            <div class="modal-content ">
                <div class="modal-header text-center">
                    <h5 class="modal-title text-uppercase" id="exampleModalLabel">Su^primier utilisateur</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                   <div class="row ">
                        <div class="form-group">
                            <input type="checkbox" id="checkUser">
                            <label for="">es-tu sûr de vouloir supprimer cet utilisateur</label>

                        </div>
                   </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger text-uppercase" id="BtnTrash">enregistrer</button>
                </div>
            </div>
        </div>
    </div>
    <style>
        i
        {
            cursor: pointer;
        }
        #TableUsers_filter
        {
            float: right;
        }
        .errors
        {
            color: red;
        }
    </style>



<script>
    $(document).ready(function () {
          //
          var id = 0;
        $(document).on('click','.IconEdit',function()
        {

            id = $(this).attr('value');
            var NomComplet = $(this).closest('tr').find('td:eq(0)').text();
            var Email = $(this).closest('tr').find('td:eq(1)').text();
            var Role = $(this).closest('tr').find('td:eq(2)').text();
            $('#NomCompletEdit').val(NomComplet);
            $('#EmailEdit').val(Email);
            $('#RoleEDit').val(Role).change();
            $('#ModalEditUser').modal('show');
        });

        $(document).on('click','.IconTrash',function()
        {

            id = $(this).attr('value');

            $('#ModalTrashUser').modal('show');
        });
        //btn Trash
        $('#BtnTrash').on('click',function()
        {
            if($('#checkUser').is(':checked'))
            {
                $.ajax({
                    type: "post",
                    url: "{{url('TrashUser')}}",
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
                            $('#ModalTrashUser').modal("hide");
                            $('#TableUsers').load(window.location.href + " #TableUsers");
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
        })
        // btn edit
        $('#BtnEdit').on('click',function()
        {
            $('.errors').text('');


            const formFields = ['NomCompletEdit', 'EmailEdit', 'PasswordEdit', 'ConfirmPasswordEdit'];


            formFields.forEach(function (field) {
                const value = $('#' + field).val().trim();

                if (value === '') {
                    $('#' + field + 'Error').text(field + ' est requis');
                }


                if (field === 'Email' && !isValidEmail(value)) {
                    $('#' + field + 'Error').text('Format d\'email invalide');
                }

                if (field === 'ConfirmPassword' && value !== $('#Password').val()) {
                    $('#' + field + 'Error').text('Les mots de passe ne correspondent pas');
                }
            });
            if ($('.errors').text() === '')
            {
                $.ajax({
                    type: "post",
                    url: "{{url('UpdateUsers')}}",
                    data:
                    {
                        "_token"    : "{{ csrf_token() }}",
                        id : id,
                        name : $('#NomCompletEdit').val(),
                        email : $('#EmailEdit').val(),
                        password : $('#PasswordEdit').val(),
                        confirmePassword :$('#ConfirmPasswordEdit').val(),
                        Role         : $('#RoleEDit').val(),
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
                            $('#ModalEditUser').modal("hide");
                            $('#TableUsers').load(window.location.href + " #TableUsers");
                        }
                    }
                });

            }
        });
        $('#TableUsers').DataTable({
            dom: 'lrtip',
            lengthChange: false,
            info : false,
            paging: false,
            "pageLength": -1,
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
        var currentPath = window.location.pathname;
        var pathSegments = currentPath.split('/');
        var lastSegment = pathSegments[pathSegments.length - 1];
        if(lastSegment === "Userss")
        {
            $('.list-unstyled li:has(span:contains("Utilisateurs"))').css({
                'background-color': 'rgb(159 226 212)',
                'box-shadow' :'5px 5px 10px #888888',
                'border-top-right-radius': '10px',
                'border-bottom-right-radius': '10px'
            }).find('i[data-feather="users"]').addClass('text-white');
        }
        ///
        $('#BtnAdd').on('click', function () {

            $('.errors').text('');


            const formFields = ['NomComplet', 'Email', 'Password', 'ConfirmPassword'];


            formFields.forEach(function (field) {
                const value = $('#' + field).val().trim();

                if (value === '') {
                    $('#' + field + 'Error').text(field + ' est requis');
                }


                if (field === 'Email' && !isValidEmail(value)) {
                    $('#' + field + 'Error').text('Format d\'email invalide');
                }

                if (field === 'ConfirmPassword' && value !== $('#Password').val()) {
                    $('#' + field + 'Error').text('Les mots de passe ne correspondent pas');
                }
            });


            if ($('.errors').text() === '')
            {
                $.ajax({
                    type: "post",
                    url: "{{url('StoreUsers')}}",
                    data:
                    {
                        "_token"    : "{{ csrf_token() }}",
                        name : $('#NomComplet').val(),
                        email : $('#Email').val(),
                        password : $('#Password').val(),
                        confirmePassword :$('#ConfirmPassword').val(),
                        Role         : $('#Role').val(),
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
                            $('#ModalAddUser').modal("hide");
                            $('#TableUsers').load(window.location.href + " #TableUsers");
                        }
                    }
                });

            }
        });


        function isValidEmail(email) {
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return emailRegex.test(email);
        }


    });
</script>
@endsection
