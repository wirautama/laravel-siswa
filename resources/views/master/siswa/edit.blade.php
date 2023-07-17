@extends('layouts.layout')
@section('content')
@section('title', 'Edit Data Master Siswa')

<div class="container-fluid">
    <br>
    <form action="/admin/siswa/update/{{$siswa->id}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-3">
                <label for="nama">@error('nama')<i class="fa fa-times-circle-o"></i> @enderror Nama</label>
                <div class="input-group @error('nama') has-error @enderror">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                    <input type="text" class="form-control" name="nama" value="{{$siswa->nama}}" placeholder="Nama Lengkap">
                    @error('nama')
                    <div class="invalid-feedback text-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group @error('jenis_kelamin') has-error @enderror">
                    <label for="jenis_kelamin">@error('jenis_kelamin')<i class="fa fa-times-circle-o"></i> @enderror Jenis Kelamin</label><br>
                    <div class="radio">
                        <label>
                          <input type="radio" name="jenis_kelamin" id="jenis_kelamin" value="L" {{$siswa->jenis_kelamin ? 'checked' : ''}} checked>
                          L
                        </label>
                        <label>
                            <input type="radio" name="jenis_kelamin" id="jenis_kelamin" value="P" {{$siswa->jenis_kelamin ? 'checked' : ''}}>
                            P
                        </label>
                    </div>
                    @error('jenis_kelamin')
                    <div class="invalid-feedback text-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            
            <div class="col-md-3">
                <label for="agama">@error('agama')<i class="fa fa-times-circle-o"></i> @enderror Agama</label>
                <div class="input-group @error('agama') has-error @enderror">
                    <span class="input-group-addon"><i class="fa fa-institution"></i></span>
                    <select class="form-control select2"  name="agama" style="width: 100%;">
                      <option value="{{$siswa->agama}}" selected disabled>{{$siswa->agama}}</option>
                      <option value="Islam">Islam</option>
                      <option value="Kristen">Kristen</option>
                      <option value="Hindhu">Hindhu</option>
                      <option value="Budha">Budha</option>
                      <option value="Konghucu">Konghucu</option>
                    </select>
                    @error('agama')
                    <div class="invalid-feedback text-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>    
        </div>
        <br>
        <div class="row">
            <div class="col-md-3">
                <label for="tempat_lahir">@error('tempat_lahir')<i class="fa fa-times-circle-o"></i> @enderror Tempat lahir</label>
                <div class="input-group @error('tempat_lahir') has-error @enderror">
                    <span class="input-group-addon"><i class="fa fa-location-arrow"></i></span>
                    <input type="text" class="form-control" name="tempat_lahir" value="{{$siswa->tempat_lahir}}" placeholder="Tempat Lahir">
                    @error('tempat_lahir')
                    <div class="invalid-feedback text-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>

            <div class="col-md-3">
                <label for="tanggal_lahir">@error('tanggal_lahir')<i class="fa fa-times-circle-o"></i> @enderror Tanggal lahir</label>
                <div class="input-group @error('tanggal_lahir') has-error @enderror">
                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                    <input type="text" data-date-format="yyyy-mm-dd" name="tanggal_lahir" class="form-control" value="{{$siswa->tanggal_lahir}}" placeholder="Tanggal Lahir" id="datepicker">
                    @error('tanggal_lahir')
                    <div class="invalid-feedback text-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>

            <div class="col-md-3">
                <label for="alamat">@error('alamat')<i class="fa fa-times-circle-o"></i> @enderror Alamat Lengkap</label>
                <div class="input-group @error('alamat') has-error @enderror">
                    <span class="input-group-addon"><i class="fa fa-home"></i></span>
                    <input type="text" class="form-control" name="alamat" value="{{$siswa->alamat}}" placeholder="Alamat Lengkap">
                    @error('alamat')
                    <div class="invalid-feedback text-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-3">
                <label for="avatar">@error('avatar')<i class="fa fa-times-circle-o"></i> @enderror Foto Profile {{$siswa->avatar}}</label>
                <div class="input-group @error('avatar') has-error @enderror">
                    <span class="input-group-addon"><i class="fa fa-image"></i></span>
                    <img src="{{asset('storage/avatar/'.$siswa->avatar)}}" class="img-preview img-fluid mb-3 col-md-6">
                    <input type="file" class="form-control" id="avatar" name="avatar" value="{{old('avatar')}}" placeholder="Foto Profile" onchange="previewImage()">
                    @error('avatar')
                    <div class="invalid-feedback text-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
        </div>
        <br>
        <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>   
        <a href="/admin/siswa" class="btn btn-primary">Kembali</a>
    </form>
</div>

@endsection