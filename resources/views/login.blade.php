<!DOCTYPE html>
<html lang="en">
    
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>DisRep | Login</title>

  <link rel="shortcut icon" href="img/coba2.png" type="image/png">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('template')}}/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{asset('template')}}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('template')}}/dist/css/adminlte.css">
</head>

<body class="hold-transition login-page bg-img">
<div class="login-box">
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <a href="/login" class="h1"><b>Login </b></a>
        </div>
        <div class="card-body">
            <p class="login-box-msg">Login untuk memulai</p>
            @if(Session::has('error'))
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert">x</button>
                    <strong>{!! Session('error') !!}</strong>
                </div>
            @endif
            <form method="POST" action="{{ route('login') }}">
            @csrf
                            
                <div class="row mb-3">
                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>
                    <div class="col-md-6">
                        <input id="email" type="email" name="email" class="form-control" value="{{ old('email') }}">                    
                    </div>
                </div>

                @error('password')
                    <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <div class="row mb-4">
                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                    <div class="col-md-6">
                        <input id="password" type="password" name="password" class="form-control">                                                    
                    </div>
                    <i class="fa fa-eye" id="showLogin" onclick="passwordLogin()"></i>
                </div>     

                <div class="login row mb-3">
                    <div class="col-md-7 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Login') }}
                        </button> 
                        <a href="{{ url('/') }}" class="btn btn-outline-primary">
                            Kembali
                        </a>                  
                    </div>
                </div>
                
                <p class="mt-4 mb-0">
                    <p class="text-center"> Belum memiliki akun?<a href="{{ route('register') }}"> Buat akun!</a></p>                
                </p>           

            </form>                
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- Preloader -->
<div id="preloader">
    <div class="loader" id="loader-1"></div>
</div>
<!-- End Preloader -->

<!-- jQuery -->
<script src="{{asset('template')}}/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('template')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="{{asset('template')}}/dist/js/adminlte.min.js"></script>
<!-- Scripts -->
<script src="{{ asset('js/app.js') }}" defer></script>
<script src="js/main.js"></script>
<!-- Password Vision -->
<script type="text/javascript">
    function passwordLogin() {
        var x = document.getElementById("password");
        if (x.type === "password") {
            x.type = "text";
            document.getElementById('hide').style.display = "inline-block";
            document.getElementById('showLogin').style.display = "none";
        }else {
            x.type = "password";
            document.getElementById('hide').style.display = "inline-block";
            document.getElementById('showlogin').style.display = "none";
        }
    }    
</script>

</body>
</html>
