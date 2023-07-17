@extends('layouts.layout')
@section('content')
@section('title', 'Data Master Guru')
<div class="container-fluid">
    <table id="example2" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>Agama</th>
                <th>Tempat, tanggal lahir</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php $no = 1; ?>
        @foreach($guru as $data)
        <tr>
            <td>{{$no++}}</td>
            <td>{{$data->nama}}</td>
            <td>{{$data->jenis_kelamin}}</td>
            <td>{{$data->agama}}</td>
            <td>{{$data->tempat_lahir}}, {{date('d M Y', strtotime($data->tanggal_lahir))}}</td>
            <td>{{$data->alamat}}</td>
            <td>
                <div class="btn-group">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                        <span class="fa fa-caret-down"></span></button>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="/admin/guru/show/{{$data->id}}"><i class="fa fa-info"></i> Detail</a>
                        </li>
                        <li>
                            <a href="/admin/guru/edit/{{$data->id}}"><i class="fa fa-edit"></i> Edit</a>
                        </li>
                        {{-- <li class="divider"></li> --}}
                        <li>
                            <a href="/admin/guru/delete/{{$data->id}}" data-confirm-delete="true"><i class="fa fa-trash"></i> Delete</a>
                        </li>
                        
                    </ul>
                </div>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    <a href="/admin/guru/create" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Data</a>
@endsection