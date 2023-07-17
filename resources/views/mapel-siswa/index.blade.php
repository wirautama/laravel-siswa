@extends('layouts.layout')
@section('content')
@section('title', 'Data Mapel Siswa')

<div class="container-fluid">
    <table id="example2" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No.</th>
                <th>Mata Pelajaran</th>
                <th>Semester</th>
                <th>Jurusan</th>
                <th>Nama Guru</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php $no = 1; ?>
        @foreach($mapelSiswa as $data)
        <tr>
            <td>{{$no++}}</td>      
            <td>{{$data->mapel->nama_mapel}}</td>
            <td>{{$data->mapel->semester}}</td>
            <td>{{$data->jurusan->nama_jurusan}}</td>
            <td>{{$data->guru->nama}}</td>
            <td>
                <div class="btn-group">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                        <span class="fa fa-caret-down"></span></button>
                    <ul class="dropdown-menu">
                        <li>
                            <a href=""><i class="fa fa-info"></i> Detail</a>
                        </li>
                        <li>
                            <a href=""><i class="fa fa-edit"></i> Edit</a>
                        </li>
                        
                        <li>
                            <a href="" data-confirm-delete="true"><i class="fa fa-trash"></i> Delete</a>
                        </li>
                        
                    </ul>
                </div>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    <a href="/admin/siswa" class="btn btn-success">Kembali</a>
</div>



@endsection