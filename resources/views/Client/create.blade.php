@extends('layouts.app')


@section('content')

    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

                <h2>Add New client</h2>

            </div>

            <div class="pull-right">

                <a class="btn btn-primary" href="{{ route('clients.index') }}"> Back</a>

            </div>

        </div>

    </div>


    @if ($errors->any())

        <div class="alert alert-danger">

            <strong>Whoops!</strong> There were some problems with your input.<br><br>

            <ul>

                @foreach ($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif


    <form action="{{ route('clients.store') }}" method="POST">

    	@csrf


         <div class="row">

		    <div class="col-xs-12 col-sm-12 col-md-12">

		        <div class="form-group">

		            <strong>nom:</strong>

		            <input type="text" name="nom" class="form-control" placeholder="nom">

		        </div>

		    </div>
            <div class="col-xs-12 col-sm-12 col-md-12">

		        <div class="form-group">

		            <strong>prenom:</strong>

		            <input type="text" name="prenom" class="form-control" placeholder="prenom">

		        </div>

		    </div>

            <div class="col-xs-12 col-sm-12 col-md-12">

		        <div class="form-group">

		            <strong>adresse:</strong>

		            <input type="text" name="address" class="form-control" placeholder="address">

		        </div>

		    </div>
            <div class="col-xs-12 col-sm-12 col-md-12">

		        <div class="form-group">

		            <strong>telephone:</strong>

		            <input type="text" name="phone" class="form-control" placeholder="telephone">

		        </div>

		    </div>



		    <div class="col-xs-12 col-sm-12 col-md-12 text-center">

		            <button type="submit" class="btn btn-primary">Submit</button>

		    </div>

		</div>


    </form>


<p class="text-center text-primary"><small>Tutorial by ItSolutionStuff.com</small></p>

@endsection
