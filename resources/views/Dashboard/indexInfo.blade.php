@extends('Dashboard.index')
@section('contentDashboard')
<div class="row mt-2">
    <div class="col-md-6 float-start">
        <h3>Liste des Informations</h3>
    </div>
    <div class="col-md-6">
        <ol class="breadcrumb float-end">
            <button class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#ModalAddInfo">Ajouter Information</button>
        </ol>
    </div>
</div>
<div class="row">
    <div class="card mt-5 shadow">
        <table class="table table-striped table-bordered mt-2" id="tableInfo">
            <thead>
                <tr>
                    <th>Titre</th>
                    <th>Télephone</th>
                    <th>ICE</th>
                    <th>IF</th>
                    <TH>CAPITAL</TH>
                    <TH>CARTE BANCAIRE</TH>
                    <TH>SOCIETE</TH>
                    <th>ACTIONS</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($infos as $info)
                    <tr>
                        <td>{{$info->name}}</td>
                        <td>{{$info->telephone}}</td>
                        <td>{{$info->ice}}</td>
                        <td>{{$info->if}}</td>
                        <td>{{$info->capital}}</td>
                        <td>{{$info->cb}}</td>
                        <td>{{$info->societe}}</td>
                        <TD>
                            <a href="#" value="{{$info->id}}" class="fa-solid fa-pen-to-square text-success btn iconExtractInfo"   title="Modifier information"></a>
                        </TD>
                    </tr>
                @endforeach
            </tbody>
       </table>
    </div>
</div>


<div class="modal fade" id="ModalAddInfo" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h5 class="modal-title" id="exampleModalLabel">Ajouter information</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{url('StoreInfo')}}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="row card py-4 shadow m-auto">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-12 col-md-6- col-xl-6">
                                    <label for="">titre</label>
                                    <input type="text" class="form-control" name="titre">
                                    <label for="">Télephone</label>
                                    <input type="text" class="form-control" name="Telephone">
                                    <label for="">ICE</label>
                                    <input type="text" class="form-control" name="ICE">
                                    <label for="">SOCIETE</label>
                                    <input type="text" class="form-control" name="societe">
                                </div>
                                <div class="col-sm-12 col-md-6- col-xl-6">
                                    <label for="">IF</label>
                                    <input type="text" class="form-control" name="IF">
                                    <label for="">CAPITAL</label>
                                    <input type="text" class="form-control" name="CAPITAL">
                                    <label for="">CARTE BANCAIRE</label>
                                    <input type="text" class="form-control" name="cb">
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button class="btn btn-success" type="submit">Save</button>
                </div>
            </form>

        </div>
    </div>
</div>


<div class="modal fade" id="ModalEditInformation" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h5 class="modal-title" id="exampleModalLabel">Ajouter information</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{url('UpdateInfo')}}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="row card py-4 shadow m-auto">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-12 col-md-6- col-xl-6">
                                    <label for="">titre</label>
                                    <input type="text" class="form-control titre" name="titre">
                                    <label for="">Télephone</label>
                                    <input type="text" class="form-control Telephone" name="Telephone">
                                    <label for="">ICE</label>
                                    <input type="text" class="form-control ICE" name="ICE">
                                    <label for="">SOCIETE</label>
                                    <input type="text" class="form-control societe" name="societe">
                                </div>
                                <div class="col-sm-12 col-md-6- col-xl-6">
                                    <label for="">IF</label>
                                    <input type="text" class="form-control IF" name="IF">
                                    <label for="">CAPITAL</label>
                                    <input type="text" class="form-control CAPITAL" name="CAPITAL">
                                    <label for="">CARTE BANCAIRE</label>
                                    <input type="text" class="form-control cb" name="cb">
                                    <input type="text" value="" class="idinfo" name="id" hidden>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button class="btn btn-success" type="submit">Save</button>
                </div>
            </form>

        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('.iconExtractInfo').on('click',function()
        {
            $('#ModalEditInformation').modal("show");
            var titre = $(this).closest('tr').find('td:eq(0)').text();
            var phone = $(this).closest('tr').find('td:eq(1)').text();
            var ice = $(this).closest('tr').find('td:eq(2)').text();
            var iff = $(this).closest('tr').find('td:eq(3)').text();
            var capital = $(this).closest('tr').find('td:eq(4)').text();
            var cb = $(this).closest('tr').find('td:eq(5)').text();
            var societe = $(this).closest('tr').find('td:eq(6)').text();
            var id     = $(this).attr('value');
            $('.idinfo').val(id);
            $('.titre').val(titre);
            $('.Telephone').val(phone);
            $('.ICE').val(ice);
            $('.IF').val(iff);
            $('.CAPITAL').val(capital);
            $('.cb').val(cb);
            $('.societe').val(societe);


        });
    });
</script>
<script>
    $(document).ready(function () {
        var currentPath = window.location.pathname;
        var pathSegments = currentPath.split('/');
        var lastSegment = pathSegments[pathSegments.length - 1];
        if(lastSegment === "info")
        {
            $('.list-unstyled li:has(span:contains("Information"))').css({
                'background-color': 'rgb(159 226 212)',
                'box-shadow' :'5px 5px 10px #888888',
                'border-top-right-radius': '10px',
                'border-bottom-right-radius': '10px'
            }).find('i[data-feather="users"]').addClass('text-white');
        }
    });
</script>
@endsection
