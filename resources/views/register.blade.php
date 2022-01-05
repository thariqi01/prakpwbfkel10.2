<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>DisRep | Register</title>

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
            <a href="/register" class="h1"><b>Register </b></a>
        </div>        
        <div class="card-body">
            <p class="login-box-msg">Register akun anda untuk memulai</p>

            <form method="POST" action="{{ route('register') }}">
            @csrf

                @error('name')
                    <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror 
                <div class="input-group mb-3">
                    <input id="name" name="name" class="form-control" placeholder="Nama" value="{{ old('name') }}">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>                                          
                        </div> 
                    </div>                
                </div>

                @error('email')
                    <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <div class="input-group mb-3">
                    <input id="email" type="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>                                            
                        </div>
                    </div>
                </div>

                @error('tgl_lahir')
                    <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror  
                <div class="input-group mb-3">
                    <input id="tgl_lahir" type="text" onfocus="(this.type='date')" name="tgl_lahir" class="form-control" placeholder="Tanggal Lahir" value="{{ old('tgl_lahir') }}">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-calendar"></span>                                          
                        </div>
                    </div>
                </div>

                @error('password')
                    <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <div class="input-group mb-3">
                    <input id="pw" type="password" name="password" class="form-control" placeholder="Password">  
                    <div class="input-group-append"> 
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>                                                   
                        </div>
                    </div>                    
                    <i class="fa fa-eye" id="show" onclick="password()"></i> 
                </div>
                
                <div class="input-group mb-3">
                    <input id="pw1" type="password" name="password_confirmation" class="form-control" placeholder="Konfirmasi Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>                    
                        </div>
                    </div>
                    <i class="fa fa-eye" id="show1" onclick="passwordConfirm()"></i>
                </div>

                <div class="row justify-content-center">            
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">Register</button>
                    </div>
                    <a href="{{ url('/') }}" class="btn btn-outline-primary">
                        Kembali
                    </a>
                </div>

            </form>     
        
            <p class="mt-3 mb-0 ">
                <p class="text-center">Sudah memiliki akun? <a href="{{ route('login') }}" >Login!</a></p>
            </p>
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
<script src="js/main.js"></script>
<!-- Password Vision -->
<script type="text/javascript">
    function password() {
        var x = document.getElementById("pw");
        if (x.type === "password") {
            x.type = "text";
            document.getElementById('hide').style.display = "inline-block";
            document.getElementById('show').style.display = "none";
        }else {
            x.type = "password";
            document.getElementById('hide').style.display = "inline-block";
            document.getElementById('show').style.display = "none";
        }
    }    
</script>
<script type="text/javascript">
    function passwordConfirm() {
        var x = document.getElementById("pw1");
        if (x.type === "password") {
            x.type = "text";
            document.getElementById('hide').style.display = "inline-block";
            document.getElementById('show1').style.display = "none";
        }else {
            x.type = "password";
            document.getElementById('hide').style.display = "inline-block";
            document.getElementById('show1').style.display = "none";
        }
    }    
</script>

</body>
</html>
