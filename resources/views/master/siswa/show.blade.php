@extends('layouts.layout')
@section('content')
@section('title', 'Detail Data Master Siswa')
<div class="container-fluid">
    <table class="table table-striped">
        <tr>
            
            <td><img src="{{asset('storage/avatar/'.$siswa->avatar)}}" width="250" alt=""></td>
        </tr>
        <tr>
            <th width="20%">Nama Lengkap</th>
            <td width="1%">:</td>
            <td>{{$siswa->nama}}</td>
        </tr>
        <tr>
            <th width="20%">Jenis Kelamin</th>
            <td width="1%">:</td>
            <td>{{$siswa->jenis_kelamin}}</td>
        </tr>
        <tr>
            <th width="20%">Agama</th>
            <td width="1%">:</td>
            <td>{{$siswa->agama}}</td>
        </tr>
        <tr>
            <th width="20%">Tempat, Tanggal Lahir</th>
            <td width="1%">:</td>
            <td>{{$siswa->tempat_lahir}}, {{date('d M Y', strtotime($siswa->tanggal_lahir))}}</td>
        </tr>
        <tr>
            <th width="20%">Alamat</th>
            <td width="1%">:</td>
            <td>{{$siswa->alamat}}</td>
        </tr>
        <tr>
            <th width="20%">Dibuat pada</th>
            <td width="1%">:</td>
            <td>{{date('d M Y H:i:s' , strtotime($siswa->created_at))}}</td>
        </tr>
        
        <tr>
            <th width="20%">Diupdate pada</th>
            <td width="1%">:</td>
            <td>{{date('d M Y H:i:s' , strtotime($siswa->updated_at))}}</td>
        </tr>
    </table>
    <a href="/admin/siswa" class="btn btn-success">Kembali</a>
</div>
@endsection