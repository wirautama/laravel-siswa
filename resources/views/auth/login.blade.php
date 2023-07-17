@extends('auth.layout')
@section('content')
@section('title', 'Login')
<div class="login-box">
    <div class="login-logo">
      <a href=""><b>Laravel</b> Siswa</a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
      <p class="login-box-msg">Masuk untuk memulai sesi anda</p>
  
      <form action="{{route('login-proses')}}" method="post">
        @csrf
          {{-- <label for="nama">@error('nama')<i class="fa fa-times-circle-o"></i> @enderror Email</label> --}}
          <div class="input-group @error('email') has-error @enderror">
              <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
              <input type="email" class="form-control" autocomplete="off" name="email" value="{{old('email')}}" placeholder="Email">
            </div>
            @error('email')
            <div class="invalid-feedback text-danger text-center">
                {{ $message }}
            </div>
            @enderror
          <br>
        {{-- <div class="form-group has-feedback">
          <input type="password" class="form-control" name="password" placeholder="Kata Sandi">
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div> --}}
  
          {{-- <label for="password">@error('password')<i class="fa fa-times-circle-o"></i> @enderror Kata Sandi</label> --}}
          <div class="input-group @error('password') has-error @enderror">
              <span class="input-group-addon"><i class="fa fa-lock"></i></span>
              <input type="password" class="form-control" id="password" name="password" value="{{old('password')}}" placeholder="Kata Sandi">
              <div class="input-group-btn">
                <button id="showPassword" type="button" class="btn btn-secondary"><i class="fa fa-eye-slash" id="eyeslash"></i></button>
              </div>
            </div>  
            @error('password')
            <div class="invalid-feedback text-danger text-center">
              {{ $message }}
            </div>
            @enderror
            <br>
  
        <div class="row">
          <div class="col-xs-8">
            <div class="checkbox icheck">
              <label>
                <input type="checkbox"> Ingat saya
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-xs-4">
            <button type="submit" class="btn btn-primary btn-block btn-flat">Masuk</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
  
      
      <!-- /.social-auth-links -->
  
      <a href="{{route('forgot-password')}}">Saya lupa kata sandi saya</a><br>
      <a href="{{route('register')}}" class="text-center">Daftar akun baru</a>
  
    </div>
    <!-- /.login-box-body -->
  </div>
  <!-- /.login-box -->
  <script>
   const showPassword = document.querySelector('#showPassword');
   const  passwordField = document.querySelector('#password');
   const eyeIcon = document.querySelector('#eyeslash')

   showPassword.addEventListener("click", function() {
    eyeIcon.classList.toggle('fa-eye-slash');
    const type = passwordField.getAttribute("type") === "password" ? "text" : "password";
    eyeIcon.classList.toggle('fa-eye')
    passwordField.setAttribute("type", type)
   })
  </script>
@endsection