<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Vidalta | Log in</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="/admin/bootstrap/css/bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/admin/dist/css/AdminLTE.min.css">
    

  </head>
  <body class="hold-transition login-page">
    <div class="login-box">
      <div class="login-logo">
        <img src="/admin/img/vidalta.png" width="200">
      </div><!-- /.login-logo -->
      <div class="login-box-body">

       {!! Form::open(['method'  => 'POST','action' =>['UsuarioController@acceso']]) !!}
                  <div class="form-group has-feedback">
             {!! Form::email('email', '', ['class'=> 'form-control','placeholder'=>'email']) !!}
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            {!! Form::password('password', ['class'=> 'form-control', 'placeholder'=>'password']) !!}
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-4">
            
              {!! Form::submit('Log In',['class' => 'btn btn-primary btn-block btn-flat']) !!}
            </div><!-- /.col -->
          </div>
      {!! Form::close() !!}

@if ($errors->any())
  <ul class="alert alert-damage">
    @foreach ($errors->all() as $error)
      <li>{{$error}}</li>
    @endforeach
  </u>
@endif


      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->
    
  </body>
</html>
