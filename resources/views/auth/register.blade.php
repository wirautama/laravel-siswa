@extends('auth.layout')
@section('content')
@section('title', 'Register')
<div class="register-box">
    <div class="register-logo">
      <a href=""><b>Laravel</b>Siswa</a>
    </div>
  
    <div class="register-box-body">
      <p class="login-box-msg">Daftar akun baru</p>
  
      <form action="{{route('register-proses')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="input-group @error('name') has-error @enderror">
            <span class="input-group-addon"><i class="fa fa-user"></i></span>
            <input type="text" class="form-control" autocomplete="off" name="name" value="{{old('name')}}" placeholder="Nama Lengkap">
          </div>
          @error('name')
          <div class="invalid-feedback text-danger text-center">
              {{ $message }}
          </div>
          @enderror

          <br>

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

          <div class="input-group @error('level') has-error @enderror">
            <span class="input-group-addon"><i class="fa fa-shield"></i></span>
            <select class="form-control" value="{{old('level')}}" name="level" style="width: 100%;">
              <option selected disabled>- Pilih Level -</option>
              <option value="Admin">Admin</option>
              <option value="User">User</option>
            </select>
        </div>
        @error('level')
        <div class="invalid-feedback text-danger text-center">
            {{ $message }}
        </div>
        @enderror
          <br>

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

        <div class="input-group @error('avatar') has-error @enderror">
          <span class="input-group-addon"><i class="fa fa-file-photo-o"></i></span>
          <input type="file" class="form-control" autocomplete="off" name="avatar" value="{{old('avatar')}}" placeholder="Photo Profile">
        </div>
        @error('avatar')
        <div class="invalid-feedback text-danger text-center">
            {{ $message }}
        </div>
        @enderror
        <br>

        <div class="row">
          <div class="col-xs-8">
            <div class="checkbox icheck">
              <label>
                <input type="checkbox"> Saya menyetujui <a href="">ketentuan</a> 
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-xs-4">
            <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
  
    
  
      <a href="{{route('login')}}" class="text-center">Saya sudah mempunyai akun</a>
    </div>
    <!-- /.form-box -->
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