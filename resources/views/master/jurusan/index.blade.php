@extends('layouts.layout')
@section('content')
@section('title', 'Data Master Jurusan')
<div class="container-fluid">
    <table id="example2" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No.</th>
                <th>Kode Jurusan</th>
                <th>Nama Jurusan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php $no = 1; ?>
        @foreach($jurusan as $data)
        <tr>
            <td>{{$no++}}</td>
            <td>{{$data->kd_jurusan}}</td>
            <td>{{$data->nama_jurusan}}</td>
            <td>
                <div class="btn-group">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                        <span class="fa fa-caret-down"></span></button>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="/admin/jurusan/show/{{$data->id}}"><i class="fa fa-info"></i> Detail</a>
                        </li>
                        <li>
                            <a href="/admin/jurusan/edit/{{$data->id}}"><i class="fa fa-edit"></i> Edit</a>
                        </li>
                        {{-- <li class="divider"></li> --}}
                        <li>
                            <a href="/admin/jurusan/delete/{{$data->id}}" data-confirm-delete="true"><i class="fa fa-trash"></i> Delete</a>
                        </li>
                        
                    </ul>
                </div>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    <a href="/admin/jurusan/create" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Data</a>
@endsection