{{-- @extends('layouts.app') --}}
{{-- @section('content') --}}
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>{{ config('app.name', 'Laravel') }}</title>
<!-- icon -->
<link rel="icon" href="../../img/toray_icon.ico">
  <!-- Custom fonts for this template-->
  <link href="{{asset('build/css/sb-admin-2.min.css')}}" rel="stylesheet">
  <link href="{{asset('build/css/login-page.css')}}" rel="stylesheet" type="text/css">
</head>
<body>
<div class="admin_login_bg"></div>
<div class="container container-fluid">
        <div class="row justify-content-center">
            
        <div class="col-md-6">
        <div class="login   animated   text-center" style="color:#fff;"> 
        <div class="text-center"><h2 class="active h2_login">INVENTORY MANAGEMENT SYSTEM </h2></div>
        <label class="text-left small">ระบบจัดการและบริหารทรัพย์สิน</label>
        <form method="POST" action="{{ route('login') }}" class="form_login">
         @csrf
         <label for="email" class="col-form-label text-md-right">{{ __('USERNAME') }}</label>
        <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required  autofocus placeholder="ระบุชื่อผู้ใช้งาน">
        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
          <br>
          <label for="password" class=" col-form-label text-md-right">{{ __('PASSWORD') }}</label>
          <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required  placeholder="ระบุรหัสผ่าน">
          @error('password')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
          <button type="submit" class="btn btn-primary signin">
                {{ __('Login') }}
            </button>

          </form>
          <hr>
          <div class="text-left small">Version: {{config('app_version.version', '1.0')}}  Copyright &copy; {{now()->year}}  ITBC Business Consultant Group Company Limited | 433</div>
        
      
      </div>
      </div>
      
        </div>
      
      </div>
          
      {{-- <script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script> --}}
      {{-- <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script> --}}
    </body>
{{-- @endsection --}}
