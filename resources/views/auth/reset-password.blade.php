@extends('auth.layout')
@section('content')
@section('title', 'Reset Password')

<div class="login-box">
    <div class="login-logo">
      <a href=""><b>Laravel</b> Siswa</a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
      <p class="login-box-msg">Masukkan password baru anda untuk mengganti password lama yang lupa</p>
  
      <form action="{{route('password.update')}}" method="post">
        @csrf
        <input type="hidden" name="token" value="{{request()->token}}">
        <input type="hidden" name="email" value="{{request()->email}}">
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

        <div class="input-group @error('password_confirmation') has-error @enderror">
            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" value="{{old('password_confirmation')}}" placeholder="Konfirmasi Kata Sandi">
            <div class="input-group-btn">
              <button id="showPassword2" type="button" class="btn btn-secondary"><i class="fa fa-eye-slash" id="eyeslash2"></i></button>
            </div>
          </div>
          @error('password_confirmation')
          <div class="invalid-feedback text-danger text-center">
              {{ $message }}
          </div>
          @enderror
        <br>
        <button type="submit" class="btn btn-primary btn-block btn-flat">Submit</button>
          
  
        <div class="row">
          <div class="col-xs-8">
            <div class="checkbox icheck">
             
            </div>
          </div>
          <!-- /.col -->
          <div class="col-xs-10">
          </div>
          <!-- /.col -->
        </div>
      </form>
  
      
      <!-- /.social-auth-links -->
  
{{--       
      <a href="{{route('register')}}" class="text-center">Daftar Akun Baru</a> --}}
      {{-- <br> --}}
      <a href="{{route('login')}}" class="text-center">Masuk</a>
  
    </div>
    <!-- /.login-box-body -->
  </div>

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

    const showPassword2 = document.querySelector('#showPassword2');
   const  passwordField2 = document.querySelector('#password_confirmation');
   const eyeIcon2 = document.querySelector('#eyeslash2')

   showPassword2.addEventListener("click", function() {
    eyeIcon2.classList.toggle('fa-eye-slash');
    const type = passwordField2.getAttribute("type") === "password" ? "text" : "password";
    eyeIcon2.classList.toggle('fa-eye')
    passwordField2.setAttribute("type", type)
   })
   </script>


@endsection