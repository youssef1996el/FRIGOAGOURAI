@extends('Dashboard.index')
@section('contentDashboard')
<div class="row mt-2">
    <div class="col-md-6 float-start">
        <h4 class="m-0 text-dark text-muted">Stock</h4>
    </div>
    <div class="col-md-6">
        <ol class="breadcrumb float-end">
            <a href="#" class="btn btn-primary"  data-bs-toggle="modal" data-bs-target="#ModalAddStock">Ajoute Stock</a>
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
                            <h5 class="mb-0">Table Stock</h5>
                            <p class="text-muted"></p>
                        </div>
                        <div class="canvas-wrapper">
                            <table class="table table-striped" id="TableStock">
                                <thead>
                                    <tr>
                                        <th>Capacité de stock</th>
                                        <th>Quantité sortie</th>
                                        <th>Quantité entrée</th>
                                        <th>Quantité actuelle</th>
                                        <th>Créer par</th>
                                        <th>Créer le</th>
                                        <th>Actions</th>
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
{{-- modal Add stock --}}
<div class="modal fade" id="ModalAddStock" aria-labelledby="settingsModalTitle" aria-hidden="true" tabindex="-1">
    <div class="modal-dialog modal-dialog-settings ">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h5 class="modal-title" id="exampleModalLabel">Ajoute Stock</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <div class="row">
                        <div class="col-12">
                            <label for="">Capacité de stock :</label>
                            <input type="text" class="form-control Capacitstock"  placeholder="Capacité de stock">
                            <div class="error"></div>

                        </div>

                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary text-uppercase" id="AddStock">enregistrer</button>
            </div>
        </div>
    </div>
</div>
{{-- modal Edit Stock --}}
<div class="modal fade" id="ModalEditStock" aria-labelledby="settingsModalTitle" aria-hidden="true" tabindex="-1">
    <div class="modal-dialog modal-dialog-settings ">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h5 class="modal-title" id="exampleModalLabel">Ajoute Stock</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <div class="row">
                        <div class="col-12">
                            <label for="">Capacité de stock :</label>
                            <input type="text" class="form-control CapacitstockEdit"  placeholder="Capacité de stock">
                            <div class="error"></div>

                        </div>

                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary text-uppercase" id="EditStock">modification</button>
            </div>
        </div>
    </div>
</div>
{{-- Modal Trash Stock --}}
<div class="modal fade" id="ModalTrashStock" aria-labelledby="settingsModalTitle" aria-hidden="true" tabindex="-1">
    <div class="modal-dialog modal-dialog-settings ">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h5 class="modal-title text-uppercase" id="exampleModalLabel">Supprimer Stock</h5>
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
                <button class="btn btn-danger text-uppercase" id="TrashStock">Supprimer</button>
            </div>
        </div>
    </div>
</div>
<style>
    #TableStock_filter
    {
        margin-bottom: 8px;
    }
    #TableStock
    {
        border-radius: 5px 5px 0 0;
        overflow: hidden;
        box-shadow: 0 0 20px rgba(0,0,0,0.15);
    }
    #TableStock thead tr
    {
        background-color : #009879;
        color:#fff;
        text-align: left;
    }
    #TableStock tbody tr:last-of-type
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
</style>
<script>
    $(document).ready(function ()
    {
        var currentPath = window.location.pathname;
        var pathSegments = currentPath.split('/');
        var lastSegment = pathSegments[pathSegments.length - 1];
        if(lastSegment === "Stock")
        {
            $('.list-unstyled li:has(span:contains("Stock"))').css({
                'background-color': 'rgb(159 226 212)',
                'box-shadow' :'5px 5px 10px #888888',
                'border-top-right-radius': '10px',
                'border-bottom-right-radius': '10px'
            }).find('i[data-feather="users"]').addClass('text-white');
        }
        var dataTableInitialized = false;
        var selectedRow = null;
        GetStockDashboard();

        function GetStockDashboard()
        {
            $.ajax({
                type: "get",
                url: "{{url('GetStock')}}",
                dataType: "json",
                success: function (response)
                {
                    if(response.status == 200)
                    {
                        if (!dataTableInitialized)
                        {
                            dataTableInitialized = true;
                            var dataTable = $('#TableStock').DataTable({
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
                            var dataTable = $('#TableStock').DataTable(); // Get the existing DataTable instance
                            dataTable.clear().draw();
                        }
                        dataTable.clear();
                        $.each(response.Stock, function (index, value)
                        {
                            dataTable.row.add([
                                value.Capacitstock,
                                value.Quantitesortie == null ? 0 : value.Quantitesortie,
                                value.QuantitieEntree == null ? 0 : value.QuantitieEntree,
                                value.Quantiteactuelle == null ? 0 : value.Quantiteactuelle,
                                value.name,
                                value.created_at,
                                '<a href="#" class="fa-solid fa-pen-to-square text-success mr-5 IconEditStock" value='+value.id+' title="Modifier cette stock"></a>\
                                 <a href="#" class="fa-solid fa-trash text-danger IconTrashStock" value='+value.id+' title="Supprimer cette stock"></a>'
                            ]);
                            dataTable.draw();
                        });


                    }
                }
            });
        }
        $('#AddStock').on('click',function()
        {
            var fields = ['.Capacitstock'];
            var hasError = false;

            $('.error').text('');

            fields.forEach(function(field, index) {
                var value = $(field).val().trim();
                var errorMessage = '';

                switch (index) {
                    case 0:
                        errorMessage = 'Capacité stock ne peux pas être vide';
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
                    url: "{{url('StoreStock')}}",
                    data:
                    {
                        "_token": "{{ csrf_token() }}",
                        Capacitstock : $('.Capacitstock').val(),
                    },
                    dataType: "json",
                    success: function (response)
                    {
                        if(response.status == 200)
                        {
                            $('#ModalAddStock').modal('hide');
                            $('.textReturn').addClass('alert alert-success').text('ajouter avec succès').delay(4000).fadeOut('slow');
                            GetStockDashboard();
                        }
                    }
                });
            }
        });
        var idStock ='';
        $(document).on('click','.IconEditStock',function()
        {
            idStock = $(this).attr('value');
            var capaciteStock = $(this).closest('tr').find('td:eq(0)').text();
            $('#ModalEditStock').modal('show');
            $('.CapacitstockEdit').val(capaciteStock);
        });
        $(document).on('click','.IconTrashStock',function()
        {
            idStock = $(this).attr('value');
            $('#ModalTrashStock').modal('show');
        });

        $('#EditStock').on('click',function()
        {
            var fields = ['.CapacitstockEdit'];
            var hasError = false;

            $('.error').text('');

            fields.forEach(function(field, index) {
                var value = $(field).val().trim();
                var errorMessage = '';

                switch (index) {
                    case 0:
                        errorMessage = 'Capacité stock ne peux pas être vide';
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
                    url: "{{url('EditStock')}}",
                    data:
                    {
                        "_token": "{{ csrf_token() }}",
                        Capacitstock : $('.CapacitstockEdit').val(),
                        id           : idStock
                    },
                    dataType: "json",
                    success: function (response)
                    {
                        if(response.status == 200)
                        {
                            $('#ModalEditStock').modal('hide');
                            $('.textReturn').addClass('alert alert-success').text('mettre à jour avec succès').delay(4000).fadeOut('slow');
                            GetStockDashboard();
                        }
                    }
                });
            }
        });

        $('#TrashStock').on('click',function()
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
                    url: "{{url('TrashStock')}}",
                    data:
                    {
                        "_token": "{{ csrf_token() }}",
                        id : idStock,
                    },
                    dataType: "json",
                    success: function (response)
                    {
                        $('#ModalTrashStock').modal('hide');
                        $('.textReturn').addClass('alert alert-danger').text('Supprimé avec succès').delay(4000).fadeOut('slow');
                        GetStockDashboard();
                    }
                });
            }
        });




    });
</script>

@endsection
