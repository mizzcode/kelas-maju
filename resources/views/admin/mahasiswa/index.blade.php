@extends('layouts.main')

@section('title', "Mahasiswa | KelasMaju")

@section('content-header')
<h1>Mahasiswa</h1>
<div class="section-header-breadcrumb">
    <div class="breadcrumb-item active"><a href="/admin">Dashboard</a></div>
    <div class="breadcrumb-item">Mahasiswa</div>
</div>
@endsection

@section('content-body')
    <div class="col-md-6 col-lg-12">
        <div class="card">
        <div class="card-header">
            <h4>Seluruh Data Mahasiswa</h4>
        </div>
        <div class="card-body p-0">
            <p class="px-4">Berikut adalah daftar seluruh mahasiswa</p>
            <div class="table-responsive">
                <table class="table table-striped table-md">
                <tr>
                <th>#</th>
                <th>Name</th>
                <th>Nim</th>
                <th>Jurusan</th>
                <th>Status</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Action</th>
                </tr>
                @foreach ($mahasiswas as $mahasiswa)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$mahasiswa->name}}</td>
                    <td>{{$mahasiswa->nim}}</td>
                    <td>{{$mahasiswa->jurusan}}</td>
                    @if ($mahasiswa->status == "active")
                    <td><div class="badge badge-success">Active</div></td>
                    @else
                    <td><div class="badge badge-danger">Not Active</div></td>
                    @endif
                    <td>{{$mahasiswa->created_at}}</td>
                    <td>{{$mahasiswa->updated_at}}</td>
                    <td><a href="#" class="btn btn-secondary">Detail</a></td>
                    </tr>
                @endforeach
            </table>
            </div>
        </div>
        <div class="card-footer text-right">
            <nav class="d-inline-block">
            <ul class="pagination mb-0">
                <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1"><i class="fas fa-chevron-left"></i></a>
                </li>
                <li class="page-item active"><a class="page-link" href="#">1 <span class="sr-only">(current)</span></a></li>
                <li class="page-item">
                <a class="page-link" href="#">2</a>
                </li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                <a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a>
                </li>
            </ul>
            </nav>
        </div>
        </div>
    </div>
@endsection