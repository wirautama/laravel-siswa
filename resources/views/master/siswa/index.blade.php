@extends('layouts.layout')
@section('content')
@section('title', 'Data Master Siswa')
<div class="container-fluid">

    <table id="example2" class="table table-bordered table-striped">
       
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>Tempat, Tanggal Lahir</th>
                <th>Agama</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        
        <tbody>
        <?php $no = 1; ?>
        @foreach($siswa as $data)
        <tr>
            <td>{{$no++}}</td>
            <td>{{$data->nama}}</td>
            <td>{{$data->jenis_kelamin}}</td>
            <td>{{$data->tempat_lahir}}, {{date('d M Y', strtotime($data->tanggal_lahir))}}</td>
            <td>{{$data->agama}}</td>
            <td>{{$data->alamat}}</td>
            <td>
                <div class="btn-group">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                        <span class="fa fa-caret-down"></span></button>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="/admin/siswa/show/{{$data->id}}"><i class="fa fa-info"></i> Detail</a>
                        </li>
                        <li>
                            <a href="/admin/siswa/edit/{{$data->id}}"><i class="fa fa-edit"></i> Edit</a>
                        </li>
                        {{-- <li class="divider"></li> --}}
                        <li>
                            <a href="/admin/siswa/delete/{{$data->id}}" data-confirm-delete="true"><i class="fa fa-trash"></i> Delete</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="/admin/siswa/mapel-siswa/{{$data->id}}"><i class="fa fa-info"></i> Data Mapel</a>
                        </li>
                        
                    </ul>
                </div>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    <a href="/admin/siswa/create" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Data</a>
</div>
@endsection