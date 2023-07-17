@extends('auth.layout')
@section('content')
@section('title', 'Verifikasi Email')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <p></p>
            <br>
            <p>
        </div>
    </div>
</div>

<div class="login-box">
    <div class="login-logo">
      <a href=""><b>Laravel</b> Siswa</a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
      <p class="login-box-msg">Email Verifikasi sudah dikirim di email anda. <a href="https://mailtrap.io/inboxes/2124319/messages/3592587227">Klik link ini untuk verifikasi cepat</a></p>
  
      
         
  
        <p class="login-box-msg">Belum Mendapatkan email verifikasi?</p> 
        <div class="row">
          <div class="col-xs-12">
              <div class="checkbox icheck">
              
                <form action="{{route('verification.send')}}" method="POST">
                    @csrf
                    
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Kirim Verifikasi Ulang</button>
            </div>
        </div>
          <!-- /.col -->
          
        </form>
          <!-- /.col -->
        </div>
  
  
      
      <!-- /.social-auth-links -->
  
  
    </div>
    <!-- /.login-box-body -->
  </div>

@endsection