@extends('Dashboard.index')


@section('contentDashboard')

<div class="row">

    <div class="col-lg-12 margin-tb">

        <div class="pull-left">

            <h2>Gestion des pourvoirs</h2>

        </div>

        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('roles.create') }}">Ajouter pourvoir</a>
       {{--  @can('role-create')

            <a class="btn btn-success" href="{{ route('roles.create') }}">Créer un nouveau rôle</a>

            @endcan

        </div> --}}

    </div>

</div>


@if ($message = Session::get('success'))

    <div class="alert alert-success">

        <p>{{ $message }}</p>

    </div>

@endif


<table class="table table-bordered mt-3">

  <tr>

     <th>Numéro</th>

     <th>nom complet</th>

     <th width="280px">Action</th>

  </tr>

    @foreach ($roles as $key => $role)

    <tr>

        <td>{{ ++$i }}</td>

        <td>{{ $role->name }}</td>

        <td>

            <a class="btn btn-info" href="{{ route('roles.show',$role->id) }}">Voir</a>

           {{--  @can('role-edit') --}}

                <a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}">Modifier</a>

          {{--   @endcan --}}

          {{--   @can('role-delete') --}}

                {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}

                    {!! Form::submit('Suprimer', ['class' => 'btn btn-danger']) !!}

                {!! Form::close() !!}

          {{--   @endcan --}}

        </td>

    </tr>

    @endforeach

</table>


{!! $roles->render() !!}

<script>
    $(document).ready(function () {
        var currentPath = window.location.pathname;
        var pathSegments = currentPath.split('/');
        var lastSegment = pathSegments[pathSegments.length - 1];
        if(lastSegment === "roles")
        {
            $('.list-unstyled li:has(span:contains("Pouvoirs utilisateurs"))').css({
                'background-color': 'rgb(159 226 212)',
                'box-shadow' :'5px 5px 10px #888888',
                'border-top-right-radius': '10px',
                'border-bottom-right-radius': '10px'
            }).find('i[data-feather="users"]').addClass('text-white');
        }
    });
</script>


@endsection
