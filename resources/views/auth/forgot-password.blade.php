@extends('auth.layout')
@section('content')
@section('title', 'Lupa Password')

<div class="login-box">
    <div class="login-logo">
      <a href=""><b>Laravel</b> Siswa</a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
      <p class="login-box-msg">Masukkan email akun anda untuk mengirim kode verifikasi</p>
  
      <form action="{{route('password.email')}}" method="post">
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


@endsection