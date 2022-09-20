
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="{{ asset('img/logo_usb_small.png')}}" type="image/x-icon">
  <title>SIVEPE | Inicio de Sesion</title>
  <link rel="stylesheet" href="{{ asset('css/app.css')}}">  
</head>
<body class="hold-transition login-page">
<div class="login-box" style="background: white; padding: 10px; border-radius: 15px" id="app">
  <div class="login-logo">
    <a href="#"></a>
    {{--<img src='{{ asset("img/logo_small.png") }}' style="background: white; width: 70px" class="img-fluid">--}}
    <i class="fas fa-file"></i>   
  </div>
  <div class="row">
    <div class="col-md-12 text-center">
    <h5><strong>INICIO DE SESIÓN AL SISTEMA DE VENTAS Y PEDIDOS</strong></h5>
    </div>
  </div>
  <!-- /.login-logo -->
  <div class="">
    <div class="card-body login-card-body">
      

      <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="form-group row">
            <label for="email" class="col-md-2 col-form-label text-md-right">{{ __('') }} <i class="fas fa-user"></i></label>
            <div class="col-md-10">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="current-email" placeholder="email" autofocus>
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="password" class="col-md-2 col-form-label text-md-right">{{ __('') }} <i class="fas fa-key"></i></label>
            <div class="col-md-10">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required placeholder="Contraseña" autocomplete="current-password">
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        

        <div class="row">
          <!-- /.col -->
          <div class="col-lg-12">
            <button type="submit" class="btn btn-primary btn-block"><strong>INGRESAR</strong> <i class="fas fa-unlock-alt"></i></button>
           
          </div>
          <!-- /.col -->
        </div>
      </form>
      
    </div>
    <!-- /.login-card-body -->
  </div>
</div>

<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>