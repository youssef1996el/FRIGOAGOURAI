
<!doctype html>
<html lang="en">
  <head>
  	<title>Login 04</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="{{asset('public/css/StyleLoginRegister.css')}}">


	</head>
	<body>

        <div class="container">
            <section class="ftco-section">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-12 col-lg-10">
                            <div class="wrap d-md-flex">
                                <div class="img" style="background-image: url('public/images/login.jpg');"></div>

                                <div class="login-wrap p-4 p-md-5">
                                    <div class="d-flex">
                                        <div class="w-100">
                                            <h3 class="mb-4">Se connecter</h3>
                                        </div>
                                        <div class="w-100">
                                            <p class="social-media d-flex justify-content-end"></p>
                                        </div>
                                    </div>
                                    <form method="POST" action="{{ route('login') }}" class="signin-form">
                                        @csrf
                                        <div class="form-group mb-3">
                                            <label class="label" for="name">E-MAIL</label>
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="" required autocomplete="off" autofocus>
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group mb-3">
                                            <label class="label" for="password">Mot de passe</label>
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="form-control btn btn-primary rounded submit px-3">Se connecter</button>
                                        </div>
                                        <div class="form-group d-md-flex">
                                            <div class="w-50 text-left">
                                                <label class="checkbox-wrap checkbox-primary mb-0">Souviens-toi de moi
                                                    <input type="checkbox" checked>
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                            <div class="w-50 text-md-right">
                                                <a href="#">Mot de passe oublié</a>
                                            </div>
                                        </div>
                                    </form>
                                    <p class="text-center">Pas un membre?
                                        <a class=""  href="{{ route('register') }}">S'inscrire</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <script src="{{asset('public/script/jquery.min.js')}}"></script>
        <script src="{{asset('public/script/popper.js')}}"></script>
        <script src="{{asset('public/script/bootstrap.min.js')}}"></script>
        <script src="{{asset('public/script/main.js')}}"></script>

    </body>
</html>


