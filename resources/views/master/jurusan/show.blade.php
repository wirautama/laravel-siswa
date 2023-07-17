@extends('layouts.layout')
@section('content')
@section('title', 'Detail Data Master Jurusan')
<div class="container-fluid">
    <table class="table table-striped">
        <tr>
            <th width="20%">Kode Jurusan</th>
            <td width="1%">:</td>
            <td>{{$jurusan->kd_jurusan}}</td>
        </tr>
        <tr>
            <th width="20%">Nama Jurusan</th>
            <td width="1%">:</td>
            <td>{{$jurusan->nama_jurusan}}</td>
        </tr>
        <tr>
            <th width="20%">Dibuat pada</th>
            <td width="1%">:</td>
            <td>{{date('d M Y H:i:s' , strtotime($jurusan->created_at))}}</td>
        </tr>
        
        <tr>
            <th width="20%">Diupdate pada</th>
            <td width="1%">:</td>
            <td>{{date('d M Y H:i:s' , strtotime($jurusan->updated_at))}}</td>
        </tr>
    </table>
    <a href="/admin/jurusan" class="btn btn-success">Kembali</a>
</div>
@endsection