@extends('Dashboard.index')
@section('contentDashboard')
    <h3 class="border rounded-2 p-2  bg-light"> Compagnies</h3>
    <div class="row">
        <div class="col-12">
            <div class="card p-2">
                <button class="btn btn-success float-end w-25" data-bs-toggle="modal" data-bs-target="#ModalCompagine">Ajouter compagnie</button>
                <table class="table table-striped table-bordered  mt-2" id="tableCompagnie" data-page-lenght="-1">
                    <thead>
                        <tr>
                            <th>Nom Complet</th>
                            <th>Situation</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($Companie as $item)
                            <tr>
                                <td>{{$item->name}}</td>
                                <td>{{$item->active}}</td>
                                <td>
                                    <a href="#" value="{{$item->id}}" class="fa-solid fa-pen-to-square text-success iconEdit"></a>
                                    <a href="#" value="{{$item->id}}" class="fa-solid fa-trash text-danger iconTrash"></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </div>
    <div class="modal fade" id="ModalCompagine" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdrop" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-uppercase" id="staticBackdropLabel">Ajoute COMPAGNIE  </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
                </div>
                <form action="{{url('StoreCompagine')}}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-12 col-md-6 col-xl-6">
                                <label for="">Nom Complète</label>
                                <input type="text" class="form-control" name="name" id="name">
                            </div>
                            <div class="col-sm-12 col-md-6 col-xl-6">
                                <label for="">Situation</label>
                                <select name="Situation" id="Situation" class="form-select">
                                    <option value="Active">Active</option>
                                    {{-- <option value="Deactivate">Deactivate</option> --}}
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary" type="submit">enregistrer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- Modal Edit --}}
    <div class="modal fade" id="ModalCompagineEdit" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdrop" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-uppercase" id="staticBackdropLabel">Ajoute COMPAGNIE  </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
                </div>
                <form action="{{url('UpdateCompagine')}}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-12 col-md-6 col-xl-6">
                                <label for="">Nom Complète</label>
                                <input type="text" class="form-control" name="name" id="nameEdit">
                            </div>
                            <div class="col-sm-12 col-md-6 col-xl-6">
                                <label for="">Situation</label>
                                <select name="Situation" id="SituationEdit" class="form-select">
                                    <option value="Active">Active</option>
                                    <option value="Deactivate">Deactivate</option>
                                </select>
                                <input type="text" id="IdEdit" name="id" hidden>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary" type="submit">Modification</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {

            var currentPath = window.location.pathname;
            var pathSegments = currentPath.split('/');
            var lastSegment = pathSegments[pathSegments.length - 1];
            if(lastSegment === "Companie")
            {
                $('.list-unstyled li:has(span:contains("Compagnies"))').css({
                    'background-color': 'rgb(159 226 212)',
                    'box-shadow' :'5px 5px 10px #888888',
                    'border-top-right-radius': '10px',
                    'border-bottom-right-radius': '10px'
                }).find('i[data-feather="users"]').addClass('text-white');
            }
            $('#tableCompagnie').DataTable({
                "ordering": false,
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

            $('.iconEdit').on('click',function()
            {
                $('#ModalCompagineEdit').modal('show');
                var name= $(this).closest('tr').find('td:eq(0)').text();

                var situation = $(this).closest('tr').find('td:eq(1)').text();
                $('#IdEdit').val($(this).attr('value'));
                $('#nameEdit').val(name);
                $('#SituationEdit').val(situation).change();
            });
            var id = 0;
            $('.iconTrash').on('click', function()
            {
                id = $(this).attr('value');
                Swal.fire({
                    title: "Es-tu sûr?",
                    text: "Vous ne pourrez pas revenir en arrière !",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Oui, supprimez-le !"
                    }).then((result) => {
                        if (result.isConfirmed)
                        {
                            $.ajax({
                                type: "post",
                                url: "{{url('DeleteCompagnies')}}",
                                data:
                                {
                                    "_token"    : "{{ csrf_token() }}",
                                    id : $(this).attr('value'),
                                },
                                dataType: "json",
                                success: function (response) {
                                    if(response.status == 200)
                                    {
                                        Swal.fire({
                                        title: "Deleted!",
                                        text: "Your file has been deleted.",
                                        icon: "success"
                                        });
                                        location.reload();
                                    }
                                    else if(response.status == 400)
                                    {
                                        Swal.fire({
                                            title: "Quelque chose ne va pas?",
                                            text: response.message,
                                            icon: "question"
                                        });
                                    }
                                }
                            });

                        }
                    });
            });
        });
    </script>
@endsection
