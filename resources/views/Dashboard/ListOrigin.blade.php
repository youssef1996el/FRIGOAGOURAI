@extends('Dashboard.index')
@section('contentDashboard')
<div class="row mt-2">
    <div class="col-md-6 float-start">
        <h4 class="m-0 text-dark text-muted">Produits agricoles</h4>
    </div>
    <div class="col-md-6">
        <ol class="breadcrumb float-end">
            <a href="#" class="btn btn-primary"  data-bs-toggle="modal" data-bs-target="#ModalListOrigin">Ajouter un produit</a>
        </ol>
    </div>
    <div class="col-12" style="margin-bottom: 8px;display:flex">
        <span class="textReturn text-uppercase w-100"></span>
    </div>
</div>
<div class="row ">
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="msgSuccess"></div>
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="content">
                        <div class="head">
                            <h5 class="mb-0">Liste de produits</h5>
                            <p class="text-muted"></p>
                        </div>
                        <div class="canvas-wrapper">
                            <table class="table table-striped" id="TableOrigine" data-page-lenght="-1">
                                <thead>
                                    <tr>
                                        <th>Titre</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($ListOrigin as $item)
                                        <tr>
                                            <td>{{$item->title}}</td>
                                            <td>
                                                <a href="#" value="{{$item->id}}" class="fa-solid fa-pen-to-square text-success fs-3 IconEdit" ></a>
                                                <a href="#" class="fa fa-trash text-danger fs-3 IconTrash" value="{{$item->id}}" ></a>
                                            </td>
                                        </tr>
                                    @endforeach
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


{{-- Modal Add list origin --}}
<div class="modal fade" id="ModalListOrigin" aria-labelledby="settingsModalTitle" aria-hidden="true" tabindex="-1">
    <div class="modal-dialog modal-dialog-settings ">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h5 class="modal-title text-uppercase" id="exampleModalLabel">Ajoute origine</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <form action="{{url('StoreOrigine')}}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-12">
                                <label for="">origine :</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror " name="title"  placeholder="origine">
                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary text-uppercase" type="submit">enregistrer</button>
                </div>
            </form>

        </div>
    </div>
</div>

{{-- Modal edit list origin --}}
<div class="modal fade" id="ModaleditListOrigin" aria-labelledby="settingsModalTitle" aria-hidden="true" tabindex="-1">
    <div class="modal-dialog modal-dialog-settings ">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h5 class="modal-title text-uppercase" id="exampleModalLabel">Modifier origine</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>

                <div class="modal-body">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-12">
                                <label for="">origine :</label>
                                <input type="text" class="form-control" id="titleedit"  placeholder="origine">
                                <div class="msgtitle"></div>


                            </div>

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary text-uppercase" id="btnUpdate">enregistrer</button>
                </div>


        </div>
    </div>
</div>

{{-- Modal trash list origin --}}
<div class="modal fade" id="ModaltrashListOrigin" aria-labelledby="settingsModalTitle" aria-hidden="true" tabindex="-1">
    <div class="modal-dialog modal-dialog-settings ">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h5 class="modal-title text-uppercase" id="exampleModalLabel">Supprimer origine</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>

                <div class="modal-body">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-12">
                                <label for="" class="textDelete"></label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary text-uppercase" id="btnDelete">enregistrer</button>
                </div>


        </div>
    </div>
</div>
<script>
    $(document).ready(function ()
    {
        var currentPath = window.location.pathname;
            var pathSegments = currentPath.split('/');
            var lastSegment = pathSegments[pathSegments.length - 1];
            if(lastSegment === "ListOrigin")
            {
                $('.list-unstyled li:has(span:contains("Liste de produits"))').css({
                    'background-color': 'rgb(159 226 212)',
                    'box-shadow' :'5px 5px 10px #888888',
                    'border-top-right-radius': '10px',
                    'border-bottom-right-radius': '10px'
                }).find('i[data-feather="users"]').addClass('text-white');
            }
        var idorigine = 0;
        $('.IconEdit').on('click',function()
        {
            idorigine = $(this).attr('value');
            $('#ModaleditListOrigin').modal("show");
        });
        $('.IconTrash').on('click',function()
        {
            idorigine = $(this).attr('value');
            $('#ModaltrashListOrigin').modal("show");
            $('.textDelete').text('es-tu sûr de vouloir supprimer').css('font-size','18px');
        });
        $('#TableOrigine').DataTable({
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
        if ($('input[name="title"]').hasClass('is-invalid'))
        {
            $('#ModalListOrigin').modal("show");
        }

        $('#btnUpdate').on('click',function()
        {
            var titleEdit = $('#titleedit').val();
            $.ajax({
                type: "post",
                url: "{{url('EditOrigine')}}",
                data:
                {
                    "_token"    : "{{ csrf_token() }}",
                    id : idorigine,
                    title : titleEdit,
                },
                dataType: "json",
                success: function (response) {
                    if(response.status == 200)
                    {

                       location.reload();

                    }
                    if(response.status == 400)
                    {
                        $('.msgtitle').text('Le champ titre est obligatoire').css('color','red');

                    }

                }
            });
        });

        $('#btnDelete').on('click',function()
        {

            $.ajax({
                type: "post",
                url: "{{url('TrashOrigine')}}",
                data:
                {
                    "_token"    : "{{ csrf_token() }}",
                    id :idorigine,
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
        });
    });
</script>
@endsection
