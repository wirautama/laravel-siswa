@extends('layouts.layout')
@section('content')
@section('title', 'Tambah Data Master Jurusan')

<div class="container-fluid">
    <br>
    <form action="/admin/jurusan/store" method="POST">
        <div class="row">
            <div class="col-md-4">
                    @csrf
                    <label for="kd_jurusan">Kode Jurusan</label>
                    <div class="input-group @error('kd_jurusan') has-error @enderror">
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        <input type="text" class="form-control" autocomplete="off" name="kd_jurusan" value="{{$nomor}}">
                        @error('kd_jurusan')
                        <div class="invalid-feedback text-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                
                <div class="col-md-4">
                    @csrf
                    <label for="nama_jurusan">Nama Jurusan</label>
                    <div class="input-group @error('nama_jurusan') has-error @enderror">
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        <input type="text" class="form-control" autocomplete="off" name="nama_jurusan" value="{{old('nama_jurusan')}}" placeholder="Nama Lengkap">
                        @error('nama_jurusan')
                        <div class="invalid-feedback text-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
            </div> 
            <br>
            <button type="submit" class="btn btn-success">Simpan</button> 
            <a href="/admin/jurusan" class="btn btn-primary">Kembali</a>      
    </form>
</div>

@endsection